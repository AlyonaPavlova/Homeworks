<?php
session_start();
include 'users.php';

if (isset($_POST['login']) && isset($_POST['password'])) {
	if (isset($credentials[$_POST['login']]) && $credentials[$_POST['login']]['pass'] == $_POST['password']) {
		$_SESSION['login'] = $_POST['login'];
        $_SESSION['name'] = $credentials[$_POST['login']]['name'];
        $_SESSION['surname'] = $credentials[$_POST['login']]['surname'];
		header('Location: index.php');
	} else {
        header('Location: index.php');
	};
} else {
	header('Location: index.php');
};

if (isset($_POST['user_name']) && isset($_POST['user_surname']) && $_POST['user_name'] != '' && $_POST['user_surname'] != '') {
    $_SESSION['name'] = $_POST['user_name'];
    $_SESSION['surname'] = $_POST['user_surname'];
    header('Location: index.php');
}elseif ($_POST['user_name'] != '' || $_POST['user_surname'] != ''){
    echo '<script language="javascript">';
    echo 'alert("Имя и Фамилия пользователя не могут быть пустыми.")';
    echo '</script>';
    echo "<script type='text/javascript'>alert('Имя и Фамилия пользователя не могут быть пустыми.');</script>";
};

