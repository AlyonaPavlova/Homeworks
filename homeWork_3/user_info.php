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
        class ActiveUser{
            public function getLogin(){
                return $_SESSION['login'];
            }
            public function getUserName(){
                return $_SESSION['name'];
            }
            public function getUserSurname(){
                return $_SESSION['surname'];
            }
            var $_sis;
            public function SessionExist(){
                isset($_SESSION['login']) ? $_sis = true : $_sis = false;
                return $_sis;
            }
        };
        $AU = new ActiveUser;
        if ($AU->SessionExist()){
            echo 'Логин: '.$AU->getLogin().'<br />';
            echo 'Имя: '.$AU->getUserName().'<br />';
            echo 'Фамилия: '.$AU->getUserSurname().'<br />';
        } else {
            echo 'Войдите, чтобы получить информацию о пользователе.'.'<br />';
        }
        ?>
    </label>
    <br>
    <button><a href="index.php" class="ui-btn ui-btn-right ui-corner-all">Назад</a></button><br />
</div>
</body>
</html>