<?php

include 'boot.php';
include 'conn.php';
include 'admin_top.php';

if (isset($_POST['submit'])) {
    $username = $_POST["username"];

    if ($username == "-1") {
        echo "<script type='text/javascript'>alert(\"Faculty ID is not selected!\");</script>";
        header("refresh:0;url=remove_faculty.php");
        exit();
    }

    $q1 = mysqli_query($conn, "select * from sub_schedule where fact_id = '$username'");
    if (mysqli_num_rows($q1) > 0) {
        echo "<script type='text/javascript'>alert(\"Failed to remove faculty as subjects are still assigned!\");</script>";
        header("refresh:0;url=remove_faculty.php");
        exit();
    }

    $t1 = mysqli_query($conn, "DELETE FROM login WHERE username='$username'");
    $t2 = mysqli_query($conn, "DELETE FROM faculty_details WHERE fact_id='$username'");
    $t3 = mysqli_query($conn, "DELETE FROM faculty WHERE fact_id='$username'");

    if ($t1 && $t2 && $t3) {
        echo "<script type='text/javascript'>alert(\"Faculty removed successfully!\");</script>";
        header("refresh:0;url=remove_faculty.php");
        exit();
    }
}

?>

<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <title>Remove Faculty Details </title>
    <style>
        body {
            background-image: url("pics/black.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #fff;
            background-size: 100%;
        }

        .txt9 {
            color: white;
            font-size: 18px;
        }

        .bo-rad-10 {
            border-radius: 10px;
        }

        .txt10 {
            font-family: Montserrat, sans-serif;
            font-weight: 400;
            font-size: 14px;
            color: #666666;
        }

        .sizefull {
            width: 100%;
            height: 100%;
        }
    </style>


</head>
<body>
<div class="animsition">
    <div align="center" style="position: relative; top:200px;">
        <b>
            <h1 style="font-family:Matura MT Script Capitals,sans-serif; font-size:45px;">
                Remove Faculty!
            </h1>
        </b><br/> <br/>
        <form id="form1" name="form1" method="post" action="">
             <span class="txt9">
                        Faculty ID:
                    </span>
            <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                <select class="bo-rad-10 sizefull txt10 p-l-20" name="username" required
                        style='text - transform: Uppercase;'/>
                <option value="-1"> ---- select ----</option>
                <?php
                $d1 = mysqli_query($conn, "SELECT  fact_id from faculty");
                while ($d2 = mysqli_fetch_array($d1)) {
                    echo "<option value='" . $d2['fact_id'] . "'>" . $d2['fact_id'] . "</option>";
                }
                ?>
                </select>
            </div>
            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success"/>
        </form>
        <br/>

    </div>
</div>
<div class="end-footer bg2" style="position: relative; top:608px;">
    <div class="container">
        <div class="flex-sb-m flex-w p-t-22 p-b-22">
            <div class="p-t-5 p-b-5">
                <a href="#" class="fs-15 c-white"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
                <a href="#" class="fs-15 c-white"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
                <a href="#" class="fs-15 c-white"><i class="fa fa-twitter m-l-18" aria-hidden="true"></i></a>
            </div>

            <div class="txt17 p-r-20 p-t-5 p-b-5">
                Copyright &copy; 2018 All rights reserved
            </div>
        </div>
    </div>
</div>
</body>

</html>


<!--===============================================================================================-->
<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="js/slick-custom.js"></script>

<!--===============================================================================================-->
<script type="text/javascript" src="vendor/parallax100/parallax100.js"></script>
<script type="text/javascript">
    $(' . parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>