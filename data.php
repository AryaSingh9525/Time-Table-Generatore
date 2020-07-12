<?php
require 'DbConnect.php';
if(isset($_POST['sem_id']))
{
    $sem=$_POST['sem_id'];
    $db = new DbConnect;
    $conn = $db->connect();
    $stmt = $conn->prepare("SELECT sub_name FROM subjects where  sem_id='$sem' and  sub_id not in (select sub_id from assign)"); // WHERE sem_id = " . $_POST['sem']);
    $stmt->execute();
    $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($subjects); // echo json is used for returning to ajax block
}

function loadAuthors() {
    $db = new DbConnect;
    $conn = $db->connect();
    $stmt = $conn->prepare("SELECT sem_id,sem_no FROM semester LIMIT 3");
    $stmt->execute();
    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $authors; // return is used for block of code
}

/*---------------------------------------------------------------------------------------*/

//FOR FACULTY NAME AND ASSIGNED SUBJECTS
if(isset($_POST['fact_id']))
{
    $fid=$_POST['fact_id'];
    $db = new DbConnect;
    $conn = $db->connect();
    $stmt = $conn->prepare("SELECT f_name, m_name,l_name FROM faculty_details where  fact_id='$fid'");
    $qry = $conn->prepare("select s.sub_name from subjects s , assign a where a.fact_id='$fid' && a.sub_id = s.sub_id");

    $stmt->execute();
    $qry->execute();
    $fnames= $stmt->fetchAll(PDO::FETCH_ASSOC);
    $snames = $qry->fetchAll(PDO::FETCH_ASSOC);
    //$fnames=json_encode($fnames);
    //$snames=json_encode($snames);
    $result= array_merge($fnames,$snames);

    echo json_encode($result);

}

//FOR FACULTY NAMES IN ASSIGN THEORY PAGE
if(isset($_POST['fact_id2'])) {
    $fid = $_POST['fact_id2'];
    $db = new DbConnect;
    $conn = $db->connect();
    $stmt = $conn->prepare("SELECT f_name, m_name,l_name FROM faculty_details where  fact_id='$fid'");
    $stmt->execute();
    $fnames = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($fnames);
}

if(isset($_POST['semester_id']))
{
    $sem=$_POST['semester_id'];
    $db = new DbConnect;
    $conn = $db->connect();
    $stmt = $conn->prepare("SELECT sub_name FROM subjects where  sem_id='$sem'"); // WHERE sem_id = " . $_POST['sem']);
    $stmt->execute();
    $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($subjects);
}