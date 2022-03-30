<?php
include '../includes/DBCon.php';

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$passwd = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$passwd = hash('ripemd160', $passwd);

$result = $db->prepare("SELECT * FROM `login` WHERE `login`=:logs AND `passwd`=:pass");
$result->execute(array(":logs" => $login, ":pass" => $passwd));

$user = $result->fetch(PDO::FETCH_ASSOC);

if ($user == 0) {
    echo 'Пароль неверный\ данные для входа не валидны';
    die;
}


$cookie = hash('ripemd160', $user['name'] . 'dfg324');
setcookie('log', $cookie, time() + 60 * 60 * 24 * 365, "/");

header('Location: ../main.php');