<?php
include '../includes/DBCon.php';


$id = $_GET['M_id'];

$query = $db->prepare("DELETE FROM `marks` WHERE `M_id` = :id");
$query->execute(array(":id" => $id));



header('Location: ./tablepage.php');