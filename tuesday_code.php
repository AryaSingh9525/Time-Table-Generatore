<?php

$fid =  $_SESSION['fact_id'];

$tue1 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='1' and day='T'");
$tue2 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='2' and day='T'");
$tue3 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='3' and day='T'");
$tue4 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='4' and day='T'");
$tue5 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='5' and day='T'");
$tue6 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='6' and day='T'");

$tue_q1 = mysqli_fetch_assoc($tue1);
$tue_q2 = mysqli_fetch_assoc($tue2);
$tue_q3 = mysqli_fetch_assoc($tue3);
$tue_q4 = mysqli_fetch_assoc($tue4);
$tue_q5 = mysqli_fetch_assoc($tue5);
$tue_q6 = mysqli_fetch_assoc($tue6);

$tue_w1 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q1[sub_id]'");
$tue_w2 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q2[sub_id]'");
$tue_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q3[sub_id]'");
$tue_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q4[sub_id]'");
$tue_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q5[sub_id]'");
$tue_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q6[sub_id]'");

$tue_p1 = mysqli_fetch_assoc($tue_w1);
$tue_p2 = mysqli_fetch_assoc($tue_w2);
$tue_p3 = mysqli_fetch_assoc($tue_w3);
$tue_p4 = mysqli_fetch_assoc($tue_w4);
$tue_p5 = mysqli_fetch_assoc($tue_w5);
$tue_p6 = mysqli_fetch_assoc($tue_w6);

?>