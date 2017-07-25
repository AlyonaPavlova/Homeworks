@extends('index_base')

@section('title')
    Информация о пользователе
@stop

@section('links')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/info.css') }}" type="text/css">
@stop

@section('content')
   <div style="margin-top: 50px"> <div class="container-fluid well span6">
        <div class="row-fluid">
            <div class="span2" style="width: 200px; height: 200px">
                <img style="display: block;max-width: 100%;max-height: 100%;" src="{{ $avatar }}"
                     class="img-circle">
            </div>

            <div class="span8">
                <h3>Логин: {{ $login }}</h3>
                <h3>Имя: {{ $name }}</h3>
                <h3>Фамилия: {{ $surname }}</h3>
                <h6>Email: {{ $email }}</h6>
                <h6>Пол: @if($gender == '0') Чудовище @elseif ($gender == '1') Женский @else Мужской @endif</h6>
                <h6>Телефон: {{ $phone }}</h6>
                <h6>Обо мне: {{ $info }}</h6>
            </div>

            <div class="span2">
                <div class="btn btn-default">
                    Редактировать
                </div>
            </div>
        </div>
    </div></div>
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