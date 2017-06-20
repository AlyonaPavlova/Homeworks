<?php
session_start();
include 'users.php'
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
</head>
<body>
<div style="width: 100%">
    <div id="form_block" align="center" style="margin-top: 20%">
        <p><label id="myLabel">Пользователь: <?php echo (isset($_SESSION['login']) ? $_SESSION['login'] : 'Завершил сессию!' ) ?></label></p>
        <form method="post" action="handler.php">
            <input type="text" name="login" id="textinput-hide" placeholder="LOGIN" value="">
            <input type="password" name="password" id="textinput-hide" placeholder="PASSWORD" value="">
            <button type="submit" class="ui-shadow ui-btn ui-corner-all">Войти</button>
        </form>
    </div>
    <div id="buttons_block" align="center">
        <button><a href="user_info.php" class="ui-shadow ui-btn ui-corner-all">Информация о пользователе</a></button>
        <button><a href="auth_text.php" class="ui-shadow ui-btn ui-corner-all">Текст</a></button><br /><br />
        <button><a href="profile_settings.php" class="ui-shadow ui-btn ui-corner-all">Настройки профиля</a></button><br /><br />
        <button><a href="destroy-session.php" class="ui-shadow ui-btn ui-corner-all">Выйти</a></button>
    </div>
</div>
</body>
</html>