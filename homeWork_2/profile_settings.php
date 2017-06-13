<?php
session_start();
include 'users.php'
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Редактирование профиля</title>
</head>
<body>
<div id="info_page" data-role="page" data-dom-cache="true" data-theme="b">

    <div id="form_block" align="center" style="margin-top: 20%">
        <p><label id="myLabel">Введите имя и фамилию.</label></p>
        <form method="post" action="handler.php">
            <input type="text" name="user_name" id="textinput-hide" placeholder="Имя" value="">
            <input type="text" name="user_surname" id="textinput-hide" placeholder="Фамилия" value="">
            <button type="submit">Подтвердить</button>
            <button><a href="index.php">Назад</a></button>
        </form>
    </div>
</div>
</body>
</html>