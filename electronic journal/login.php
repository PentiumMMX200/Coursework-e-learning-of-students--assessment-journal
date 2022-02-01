<?php
$login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$passwd=filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

header('Location:main.html');
?>