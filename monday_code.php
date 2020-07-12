<?php

$fid =  $_SESSION['fact_id'];

$mon1 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='1' and day='M'");
$mon2 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='2' and day='M'");
$mon3 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='3' and day='M'");
$mon4 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='4' and day='M'");
$mon5 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='5' and day='M'");
$mon6 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='6' and day='M'");

$mon_q1 = mysqli_fetch_assoc($mon1);
$mon_q2 = mysqli_fetch_assoc($mon2);
$mon_q3 = mysqli_fetch_assoc($mon3);
$mon_q4 = mysqli_fetch_assoc($mon4);
$mon_q5 = mysqli_fetch_assoc($mon5);
$mon_q6 = mysqli_fetch_assoc($mon6);

$mon_w1 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$mon_q1[sub_id]'");
$mon_w2 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$mon_q2[sub_id]'");
$mon_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$mon_q3[sub_id]'");
$mon_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$mon_q4[sub_id]'");
$mon_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$mon_q5[sub_id]'");
$mon_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$mon_q6[sub_id]'");

$mon_p1 = mysqli_fetch_assoc($mon_w1);
$mon_p2 = mysqli_fetch_assoc($mon_w2);
$mon_p3 = mysqli_fetch_assoc($mon_w3);
$mon_p4 = mysqli_fetch_assoc($mon_w4);
$mon_p5 = mysqli_fetch_assoc($mon_w5);
$mon_p6 = mysqli_fetch_assoc($mon_w6);

?>