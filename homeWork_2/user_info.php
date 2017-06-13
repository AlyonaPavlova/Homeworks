<?php
session_start();
include 'users.php'
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Страница информации о пользователе</title>
</head>
<body>
<div id="info_page" align="center" style="margin-top: 20%">
    <label id="myInfo">Пользователь:<br />
        <?php
        echo (isset($_SESSION['login']) ? 'Логин: '.$_SESSION['login'] : 'Войдите, чтобы получить информацию о пользователе.' ).'<br />';
        echo (isset($_SESSION['name']) ? 'Имя: '.$_SESSION['name'] : '' ).'<br />';
        echo (isset($_SESSION['surname']) ? 'Фамилия: '.$_SESSION['surname'] : '' ).'<br />';
        ?>
    </label>
    <button><a href="index.php" class="ui-btn ui-btn-right ui-corner-all">Назад</a></button><br />
</div>
</body>
</html>