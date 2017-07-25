<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);

Route::get('auth/login', ['uses' => 'HomeController@auth_login', 'as' => 'login_page']);

Route::post('go', ['uses' => 'HomeController@login_handler', 'as' => 'login_handler']);

Route::post('reg', ['uses' => 'HomeController@registration', 'as' => 'registration_func']);

Route::get('exit', ['uses' => 'HomeController@exit_func', 'as' => 'exit_func']);

Route::get('info', ['uses' => 'HomeController@get_user_info', 'as' => 'get_user_info']);

Route::post('info/add', ['uses' => 'HomeController@add_user_info', 'as' => 'add_user_info']);

