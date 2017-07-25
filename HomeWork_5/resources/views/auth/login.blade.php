@extends('auth.auth_base')

@section('title')
    LOGIN
@stop
@section('links')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/login_page.css') }}" type="text/css">
@stop
@section('content')
    <div class="container">
        <div class="container">
            <div class="col-md-4 col-md-offset-4" style="text-align: center; margin-top: 20%">

                @if(Session::has('err'))
                    <h1><b>Возникла проблема</b></h1>
                    <b style="color: deeppink">{{ Session::get('err') }}</b>
                @else
                    <h1><b>Добро пожаловать</b></h1>
                @endif
                <h3>Войдите или зарегистрируйтесь</h3>
                <em>По всем вопросам обращаться к <b>Павловой А.И.</b></em>
                <br>
                <button class="btn btn-primary btn-lg" href="#signup" data-toggle="modal" data-target=".bs-modal-sm">
                    Вход/Регистрация
                </button>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm" >
            <div class="modal-content">
                <br>
                <div class="bs-example bs-example-tabs">
                    <ul id="myTab" class="nav nav-tabs">
                        <li class="active"><a href="#signin" data-toggle="tab">Вход</a></li>
                        <li class=""><a href="#signup" data-toggle="tab">Регистрация</a></li>
                        <li class=""><a href="#why" data-toggle="tab">ЧаВо</a></li>
                    </ul>
                </div>
                <div class="modal-body">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in" id="why">
                            <p>Вводимая информация не будет анализироваться или передаваться третьим лицам.
                                Аутентификация необходима для предоставления доступа к данным.</p>
                            <p></p><br> Пожалуйста, свяжитесь с <b>AlyonaBill3@mail.ru</b> по любым иным вопросам</p>
                        </div>
                        <div class="tab-pane fade active in" id="signin">
                            <form class="form-horizontal" method="post" action="/go">
                                {{ csrf_field() }}
                                <fieldset>
                                    <!-- Sign In Form -->
                                    <!-- Text input-->
                                    <div class="control-group">
                                        <label class="control-label" for="userid">Логин:</label>
                                        <div class="controls">
                                            <input required="" id="userid" name="login" type="text"
                                                   class="form-control" placeholder="XXX_PUPKIN_XXX"
                                                   class="input-medium"
                                                   required="">
                                        </div>
                                    </div>

                                    <!-- Password input-->
                                    <div class="control-group">
                                        <label class="control-label" for="passwordinput">Пароль:</label>
                                        <div class="controls">
                                            <input required="" id="passwordinput" name="password"
                                                   class="form-control" type="password" placeholder="********"
                                                   class="input-medium">
                                        </div>
                                    </div>

                                    <!-- Multiple Checkboxes (inline) -->
                                    <center>
                                        <div class="control-group">
                                            <label class="control-label" for="rememberme"></label>
                                            <div class="controls">
                                                <label class="checkbox inline" for="rememberme-0">
                                                    <input type="checkbox" name="rememberme" id="rememberme-0"
                                                           value="Remember me">
                                                    Запомнить меня
                                                </label>
                                            </div>
                                        </div>
                                        <!-- Button -->
                                        <div class="control-group">
                                            <label class="control-label" for="signin"></label>
                                            <div class="controls">
                                                <button id="signin" name="signin" class="btn btn-success">Войти</button>
                                            </div>
                                        </div>
                                    </center>
                                </fieldset>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="signup">
                            <form class="form-horizontal" method="post" action="/reg">
                                {{ csrf_field() }}
                                <fieldset>
                                    <!-- Sign Up Form -->
                                    <!-- Email input-->
                                    <div class="control-group">
                                        <label class="control-label" for="Email">Email:</label>
                                        <div class="controls">
                                            <input id="Email" name="email_reg" class="form-control" type="email"
                                                   placeholder="Vasyan_Zver_2004@rambler.ru" class="input-large"
                                                   required="">
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="control-group">
                                        <label class="control-label" for="username">Имя:</label>
                                        <div class="controls">
                                            <input id="username" name="name_reg" class="form-control" type="text"
                                                   placeholder="Василий" class="input-large" required="">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="usersurname">Фамилия:</label>
                                        <div class="controls">
                                            <input id="usersurname" name="surname_reg" class="form-control" type="text"
                                                   placeholder="Пупкин" class="input-large" required="">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="phone">Телефон:</label>
                                        <div class="controls">
                                            <input id="phone" name="phone_reg" class="form-control" type="number"
                                                   placeholder="555-666-777" class="input-large" required="">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="userid">Логин:</label>
                                        <div class="controls">
                                            <input id="userid" name="login_reg" class="form-control" type="text"
                                                   placeholder="XXX_PUPKIN_XXX" class="input-large" required="">
                                        </div>
                                    </div>

                                    <!-- Password input-->
                                    <div class="control-group">
                                        <label class="control-label" for="password">Пароль:</label>
                                        <div class="controls">
                                            <input id="password" name="password_reg" class="form-control"
                                                   type="password"
                                                   placeholder="********" class="input-large" required="">
                                            <em>1-8 символов</em>
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="control-group">
                                        <label class="control-label" for="reenterpassword">Пароль, дубль-два:</label>
                                        <div class="controls">
                                            <input id="reenterpassword" class="form-control" name="reenterpassword_reg"
                                                   type="password" placeholder="********" class="input-large"
                                                   required="">
                                        </div>
                                    </div>
                                    <br>
                                    <label class="control-label" for="gender">Укажите свой пол</label>
                                    <select class="form-control" name="gender">
                                        <option></option>
                                        <option>Ж</option>
                                        <option>М</option>
                                    </select>
                                    <!-- Multiple Radios (inline) -->
                                    <center><br>
                                        <div class="control-group">
                                            <label class="control-label" for="humancheck">Отсеивание мозговых
                                                слизней:</label>
                                            <div class="controls">
                                                <label class="radio inline" for="humancheck-0">
                                                    <input type="radio" name="humancheck" id="humancheck-0"
                                                           value="robot"
                                                           checked="checked">Я мозговой слизень!</label>
                                                <label class="radio inline" for="humancheck-1">
                                                    <input type="radio" name="humancheck" id="humancheck-1"
                                                           value="human">Я - человек! И это звучит гордо!</label>
                                            </div>
                                        </div>

                                        <!-- Button -->
                                        <div class="control-group">
                                            <label class="control-label" for="confirmsignup"></label>
                                            <div class="controls">
                                                <button id="confirmsignup" name="confirmsignup" class="btn btn-success">
                                                    Зарегистрируй меня!
                                                </button>
                                            </div>
                                        </div>
                                    </center>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
@stop
