<?php
error_reporting(E_ALL ^ E_WARNING);
$db = new PDO("mysql:host=127.0.0.1;port=3306;dbname=journal", "root", "root");
$db->exec("set names utf8");
?>