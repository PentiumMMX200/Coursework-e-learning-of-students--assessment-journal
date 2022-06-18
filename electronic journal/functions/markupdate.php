<?php
include '../includes/DBCon.php';


$id = $_GET['M_id'];
$mark = $_GET['M_Mark'];
$studentId = $_GET['S_id'];
$date = $_GET['M_Date'];
$subject = $_GET['M_study_subs'];
$group = $_GET['G_group'];
$attend = $_GET['M_Attendance'];
if ($_GET["markEditAction"] == "Edit") {

    $queryUPD = $db->prepare("UPDATE `marks` SET `M_Mark` = :mark ,`M_Attendance`= :att WHERE `M_id` = :id");
    $queryUPD->execute(array(":id" => $id, ":mark" => ($attend ? NULL : $mark), ":att" => $attend));
}

if ($_GET["markEditAction"] == "Delete") {
    $queryDel = $db->prepare("DELETE FROM `marks` WHERE `M_id` = :id");
    $queryDel->execute(array(":id" => $id));
}
if ($_GET['markCreate'] == "Create") {
    $queryCreate = $db->prepare("INSERT INTO `marks`(S_id, M_date, M_Mark, M_study_subs, G_group) VALUES (:stuid, :mdate, :mark, :subs, :group)");
    $queryCreate->execute(array(":stuid" => $studentId, ":mdate" => $date, ":mark" => $mark, ":subs" => $subject, ":group" => $group));
}

header('Location: ./tablepage.php');