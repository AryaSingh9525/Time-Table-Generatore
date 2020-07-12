<?php

$fid =  $_SESSION['fact_id'];

$wed1 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='1' and day='W'");
$wed2 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='2' and day='W'");
$wed3 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='3' and day='W'");
$wed4 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='4' and day='W'");
$wed5 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='5' and day='W'");
$wed6 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='6' and day='W'");

$wed_q1 = mysqli_fetch_assoc($wed1);
$wed_q2 = mysqli_fetch_assoc($wed2);
$wed_q3 = mysqli_fetch_assoc($wed3);
$wed_q4 = mysqli_fetch_assoc($wed4);
$wed_q5 = mysqli_fetch_assoc($wed5);
$wed_q6 = mysqli_fetch_assoc($wed6);

$wed_w1 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q1[sub_id]'");
$wed_w2 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q2[sub_id]'");
$wed_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q3[sub_id]'");
$wed_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q4[sub_id]'");
$wed_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q5[sub_id]'");
$wed_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q6[sub_id]'");

$wed_p1 = mysqli_fetch_assoc($wed_w1);
$wed_p2 = mysqli_fetch_assoc($wed_w2);
$wed_p3 = mysqli_fetch_assoc($wed_w3);
$wed_p4 = mysqli_fetch_assoc($wed_w4);
$wed_p5 = mysqli_fetch_assoc($wed_w5);
$wed_p6 = mysqli_fetch_assoc($wed_w6);

?>