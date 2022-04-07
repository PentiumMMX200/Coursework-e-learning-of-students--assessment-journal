<?php
include '../includes/DBCon.php';


$id = $_GET['M_id'];
$mark = $_GET['M_Mark'];
$studentId = $_GET['S_id'];
$date = $_GET['M_Date'];
$subject = $_GET['M_study_subs'];
$group = $_GET['G_group'];

if ($_GET["markEditAction"] == "Edit") {
    $queryUPD = $db->prepare("UPDATE `marks` SET `M_Mark` = :mark WHERE `M_id` = :id");
    $queryUPD->execute(array(":id" => $id, ":mark" => $mark));
}

if ($_GET["markEditAction"] == "Delete") {
    $queryDel = $db->prepare("DELETE FROM `marks` WHERE `M_id` = :id");
    $queryDel->execute(array(":id" => $id));
}
if ($_GET['markCreate'] == "Create") {
    $markId = $db->prepare("SELECT count(*) FROM `marks`");
    $markId->execute();
    $markId = $markId->fetchAll(PDO::FETCH_DEFAULT)[0]['count(*)'];
    $queryCreate = $db->prepare("INSERT INTO `marks`(M_id, S_id, M_date, M_Mark, M_study_subs, G_group) VALUES (:id, :stuid, :mdate, :mark, :subs, :group)");
    $queryCreate->execute(array(":id" => $markId + 1, ":stuid" => $studentId, ":mdate" => $date, ":mark" => $mark, ":subs" => $subject, ":group" => $group));
}

header('Location: ./tablepage.php');