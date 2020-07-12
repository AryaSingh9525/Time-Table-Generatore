<?php

$fid =  $_SESSION['fact_id'];

$thur1 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='1' and day='Th'");
$thur2 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='2' and day='Th'");
$thur3 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='3' and day='Th'");
$thur4 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='4' and day='Th'");
$thur5 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='5' and day='Th'");
$thur6 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='6' and day='Th'");

$thur_q1 = mysqli_fetch_assoc($thur1);
$thur_q2 = mysqli_fetch_assoc($thur2);
$thur_q3 = mysqli_fetch_assoc($thur3);
$thur_q4 = mysqli_fetch_assoc($thur4);
$thur_q5 = mysqli_fetch_assoc($thur5);
$thur_q6 = mysqli_fetch_assoc($thur6);

$thur_w1 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$thur_q1[sub_id]'");
$thur_w2 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$thur_q2[sub_id]'");
$thur_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$thur_q3[sub_id]'");
$thur_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$thur_q4[sub_id]'");
$thur_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$thur_q5[sub_id]'");
$thur_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$thur_q6[sub_id]'");

$thur_p1 = mysqli_fetch_assoc($thur_w1);
$thur_p2 = mysqli_fetch_assoc($thur_w2);
$thur_p3 = mysqli_fetch_assoc($thur_w3);
$thur_p4 = mysqli_fetch_assoc($thur_w4);
$thur_p5 = mysqli_fetch_assoc($thur_w5);
$thur_p6 = mysqli_fetch_assoc($thur_w6);

?>