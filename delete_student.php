<?php

include 'boot.php';
include 'conn.php';
include 'admin_top.php';

if (isset($_POST['submit'])) {
    $reg_no = $_POST["reg_no"];
// sql to delete a record
    if ($reg_no) {
        $sql = "DELETE FROM student_details WHERE reg_no='$reg_no'";
        if (mysqli_query($conn, $sql)) {
            echo    "<script type='text/javascript'>alert(\"Student record deleted successfully!\");</script>";
//            echo "";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}

?>

<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <title>Remove Student</title>
    <style>
        body {
            background-image: url("pics/black.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
            background-size: 100%;
            /*font-family: ;*/
        }

        select {
            /*border-color: none;*/
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

        .row {
            margin-right: -15px;
            margin-left: 70px;
        }

        .col-md-4 {
            width: 72.333333%;
        }
    </style>

</head>
<body>
<div class="animsition">
    <!-- <div class="item-slick1 item1-slick1" style="background-image: url(pics/black.jpg);"> -->
    <br><br><br><br><br><br><br> <br>
    <div align="center">
        <b>
            <h1 style=" font-family:Matura MT Script Capitals,sans-serif; font-size:45px;">
                Remove Student!
            </h1>
        </b><br/> <br/>
        <form id="form1" name="form1" method="post" action="">
        <span class="txt9">
                        Student Reg. No:
                    </span>
            <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                <input type="text" name="reg_no" id="reg_no" class="bo-rad-10 sizefull txt10 p-l-20" required/>
            </div>


            <p>
                <label>
                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success"/>
                </label>
            </p>
        </form>
        <br/>


        <br/>
        <div class="end-footer bg2" style="top: 370px; position: relative;">
            <div class="container">
                <div class="flex-sb-m flex-w p-t-22 p-b-22">
                    <div class="p-t-5 p-b-5">
                        <a href="#" class="fs-15 c-white"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
                        <a href="#" class="fs-15 c-white"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
                        <a href="#" class="fs-15 c-white"><i class="fa fa-twitter m-l-18" aria-hidden="true"></i></a>
                    </div>

                    <div class="txt17 p-r-20 p-t-5 p-b-5">
                        Copyright &copy; 2019 All rights reserved
                    </div>
                </div>
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
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>