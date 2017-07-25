<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{

    protected $data = 'AZAZA';

    public function get_tokened_user()
    {
//        dd(Session::all());
        $_token = Session::get('_token');
        $tokened_user = DB::select('SELECT * FROM users WHERE remember_token=?', [$_token]);
        return $tokened_user;
    }

    public function user_arr_creator($tokened_user)
    {
        $user_data = [
            'userid' => $tokened_user['0']->id,
            'login' => $tokened_user['0']->login,
            'name' => $tokened_user['0']->name,
            'surname' => $tokened_user['0']->surname,
            'gender' => $tokened_user['0']->gender,
            'email' => $tokened_user['0']->email,
            'phone' => $tokened_user['0']->phone,
        ];
        return $user_data;
    }

    public function signin_tokened($tokened_user)
    {
        if ($tokened_user && property_exists($tokened_user['0'], 'is_active') && $tokened_user['0']->is_active == 1) {
            $user_data = $this->user_arr_creator($tokened_user);
            return view('index', $user_data);
//            return redirect('/')->with($user_data);
        } elseif ($tokened_user && property_exists($tokened_user['0'], 'is_active') && $tokened_user['0']->is_active == 0) {
            $err_msg = 'Учетная запись заблокирована.Обратитесь к администратору системы.';
            return $this->auth_login($err_msg);
        }
    }

    public function index()
    {
        $tokened_user = $this->get_tokened_user();
        $this->signin_tokened($tokened_user);
        return $this->auth_login();
    }

    public function auth_login($err_msg = null)
    {
        $tokened_user = $this->get_tokened_user();
        if ($tokened_user && $err_msg === null) {
            $user_data = $this->user_arr_creator($tokened_user);
            Session::put('login', $user_data['login']);
            return view('index', $user_data);
//            return redirect('');
        } elseif ($err_msg != null) {
            $data = ['err' => $err_msg];
//            return view('auth.login', $data);
            return redirect()->back()->with($data);
        } else {
            return view('auth.login');
        }
    }

    public function login_handler()
    {
        $tokened_user = $this->get_tokened_user();
        if ($tokened_user) {
            return $this->signin_tokened($tokened_user);
        } elseif (isset($_POST['login']) && isset($_POST['password'])) {
            if (isset($_POST['rememberme'])) {
                $_remember_token = $_POST['rememberme'];
            }
            $_login = $_POST['login'];
            $_password = $_POST['password'];
            $_user = DB::select('SELECT * FROM users WHERE login = ?', [$_login]);
            if ($_user && $_user['0']->password == $_password && $_user['0']->is_active != 0) {
                if (isset($_remember_token)) {
                    $_token = Session::get('_token');
                    DB::update('UPDATE users SET remember_token = ? WHERE login = ?', [$_token, $_login]);
                }
                $user_data = $this->user_arr_creator($_user);
                Session::put('login', $_login);
                return view('index', $user_data);
            } elseif ($_user && $_user['0']->password == $_password && $_user['0']->is_active == 0) {
                return $this->auth_login('Учетная запись заблокирована. Обратитесь к администратору системы.');
            } elseif ($_user) {
                return $this->auth_login('Введенный пароль не верен!');
            } else {
                return $this->auth_login('Пользователя с таким логином не существует!');
            }
        } else {
            return abort(404);
        }
    }

    public function registration()
    {
        $tokened_user = $this->get_tokened_user();
        if ($tokened_user) {
            return $this->signin_tokened($tokened_user);
        } elseif ($_POST['humancheck'] == 'robot') {
            $err_msg = 'Роботам вход воспрещен!';
            return redirect()->back()->with('err', $err_msg);
        } elseif (isset($_POST['login_reg']) && isset($_POST['password_reg']) && isset($_POST['reenterpassword_reg']) && $_POST['password_reg'] === $_POST['reenterpassword_reg']) {
            $_login_chk = DB::select('SELECT * FROM users WHERE login = ?', [$_POST['login_reg']]);
            $_email_chk = DB::select('SELECT * FROM users WHERE email = ?', [$_POST['email_reg']]);
            if (isset($_login_chk['0'])) {
                $err_msg = 'Пользователь с таким Логином уже существует, придумайте что-нибудь пооригинальнее!';
                return redirect()->back()->with('err', $err_msg);
            } elseif (isset($_email_chk['0'])) {
                $err_msg = 'Такая почта уже закреплена за другим аккаунтом. Вы что, хотите нас обмануть?';
                return redirect()->back()->with('err', $err_msg);
            } else {
                if ($_POST['gender'] == 'М') {
                    $gender = 2;
                } elseif ($_POST['gender'] == 'Ж') {
                    $gender = 1;
                } else {
                    $gender = 0;
                }
                DB::update('INSERT INTO users(login, name, surname, gender, email, phone, password, is_superuser, 
is_active, remember_token) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$_POST['login_reg'], $_POST['name_reg'],
                    $_POST['surname_reg'], $gender, $_POST['email_reg'], $_POST['phone_reg'], $_POST['password_reg'],
                    0, 1, Session::get('_token')]);
                $err_msg = 'Регистрация завершена. Выполните вход!';
                return redirect('/');
            }
        } elseif (isset($_POST['login_reg']) && isset($_POST['password_reg']) && isset($_POST['reenterpassword_reg']) && $_POST['password_reg'] != $_POST['reenterpassword_reg']) {
            $err_msg = 'Пароли не совпадают';
            return redirect()->back()->with('err', $err_msg);
        }
    }

    public function exit_func()
    {
        DB::update('UPDATE users SET remember_token = ? WHERE login = ?', [null, Session::get('login')]);
        return redirect('');
    }

    public function get_user_info(){
        $tokened_user = $this->get_tokened_user();
        $data = $this->user_arr_creator($tokened_user);
        $info = DB::select('SELECT avatar_path, info FROM userinfo WHERE user_id=?',[$data['userid']]);
        $info = ['avatar' => $info['0']->avatar_path, 'info' => $info['0']->info];
        $info_data = array_merge($data, $info);
        return view('info', $info_data);
    }

    public function add_user_info(){
        dd($_POST);
    }
}
