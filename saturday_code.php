<?php

$fid =  $_SESSION['fact_id'];

$sat1 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='1' and day='S'");
$sat2 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='2' and day='S'");
$sat3 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='3' and day='S'");
$sat4 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='4' and day='S'");
$sat5 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='5' and day='S'");
$sat6 = mysqli_query($conn, "select * from assign where fact_id = '$fid' and hrs='6' and day='S'");

$sat_q1 = mysqli_fetch_assoc($sat1);
$sat_q2 = mysqli_fetch_assoc($sat2);
$sat_q3 = mysqli_fetch_assoc($sat3);
$sat_q4 = mysqli_fetch_assoc($sat4);
$sat_q5 = mysqli_fetch_assoc($sat5);
$sat_q6 = mysqli_fetch_assoc($sat6);

$sat_w1 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q1[sub_id]'");
$sat_w2 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q2[sub_id]'");
$sat_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q3[sub_id]'");
$sat_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q4[sub_id]'");
$sat_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q5[sub_id]'");
$sat_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q6[sub_id]'");

$sat_p1 = mysqli_fetch_assoc($sat_w1);
$sat_p2 = mysqli_fetch_assoc($sat_w2);
$sat_p3 = mysqli_fetch_assoc($sat_w3);
$sat_p4 = mysqli_fetch_assoc($sat_w4);
$sat_p5 = mysqli_fetch_assoc($sat_w5);
$sat_p6 = mysqli_fetch_assoc($sat_w6);

?>