<?php
session_start();
include 'conn.php';
require 'DbConnect.php';
if (isset($_POST['day'])) {

    $sem = $_POST['sem'];
    $day = $_POST['day'];
    $db = new DbConnect;
    $conn = $db->connect();

    $stmt = $conn->prepare("SELECT hour_id FROM class_hours where hour_id not in(select hour_id from sub_schedule where day_id='$day' and sem_id = '$sem')");
    $stmt->execute();
    $fnames = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($fnames);
//    return $fnames;
//    echo $_POST['day'];

// echo   $_SESSION['test'];
}