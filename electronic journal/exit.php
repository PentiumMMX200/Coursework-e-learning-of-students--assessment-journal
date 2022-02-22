<?php
include 'DBCon.php';
$cookie = hash('ripemd160', $user['name'].'dfg324');
setcookie('log', $cookie, time()- 60*60*24*365, "/");
header('Location: /');
?>