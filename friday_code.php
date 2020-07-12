<?php

$fid =  $_SESSION['fact_id'];

$fri1 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='1' and day='F'");
$fri2 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='2' and day='F'");
$fri3 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='3' and day='F'");
$fri4 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='4' and day='F'");
$fri5 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='5' and day='F'");
$fri6 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='6' and day='F'");

$fri_q1 = mysqli_fetch_assoc($fri1);
$fri_q2 = mysqli_fetch_assoc($fri2);
$fri_q3 = mysqli_fetch_assoc($fri3);
$fri_q4 = mysqli_fetch_assoc($fri4);
$fri_q5 = mysqli_fetch_assoc($fri5);
$fri_q6 = mysqli_fetch_assoc($fri6);

$fri_w1 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q1[sub_id]'");
$fri_w2 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q2[sub_id]'");
$fri_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q3[sub_id]'");
$fri_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q4[sub_id]'");
$fri_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q5[sub_id]'");
$fri_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q6[sub_id]'");

$fri_p1 = mysqli_fetch_assoc($fri_w1);
$fri_p2 = mysqli_fetch_assoc($fri_w2);
$fri_p3 = mysqli_fetch_assoc($fri_w3);
$fri_p4 = mysqli_fetch_assoc($fri_w4);
$fri_p5 = mysqli_fetch_assoc($fri_w5);
$fri_p6 = mysqli_fetch_assoc($fri_w6);

?>