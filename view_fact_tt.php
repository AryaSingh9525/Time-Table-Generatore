<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'boot.php';
include 'conn.php';
include 'admin_top.php';

$status = $_SESSION["log_sts"];
if ($_SESSION["log_sts"] == 1) {
    $status = $_SESSION["log_sts"];
}

if (isset($_POST['submit'])) {

    $fid = $_POST['fact_id'];
    if ($fid != -1) {
        $_SESSION["user_id"] = $fid;
        header("refresh:0;url=test_fact_tt.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> View Time-Table
    </title>
    <!-- <title>Menu</title> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">  -->
    <!-- LINK DISABLE ^|^ -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/drop_down.css">
    <!--===============================================================================================-->
    <style>

        body {
            background-image: url("pics/black.jpg");
            /*background-color: #222222;*/
            background-attachment: fixed;
            color: white;
            background-size: 100%;
            font-family: verdana, sans-serif;
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
            font-family: verdana, sans-serif;
            font-weight: 400;
            font-size: 14px;
            color: #666666;
            text-transform: capitalize;
        }

        .sizefull {
            width: 100%;
            height: 90%;
        }
    </style>

</head>

<body class="animsition">
<div class="item-slick1 item1-slick1">
    <div align=center style="position: relative; top: 230px; ">
        <b>
            <h1 style="font-family: Matura MT Script Capitals, sans-serif; font-size:45px;">
                View Time-Table!
            </h1>
        </b><br/><br/>


        <form id name="alloc" class="wrap-form-reservation size22 m-l-r-auto" action="view_fact_tt.php" method="post">
            <table>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                    <span class="txt9">
                                        Faculty ID:
                                    </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <select name="fact_id" class="bo-rad-10 sizefull txt10 p-l-20">
                                <option value="-1">----- select -----</option>
                                <?php
                                $l1 = mysqli_query($conn, "SELECT distinct fact_id FROM assign");
                                // $l2 = mysqli_num_rows($l1);
                                while ($l3 = mysqli_fetch_array($l1)) {
                                    echo "<option value='" . $l3['fact_id'] . "'>" . $l3['fact_id'] . "</option>";
                                } ?>
                            </select>
                        </div>
                    </td>
                </tr>
            </table>
            <br>
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
            <!--                <button type="submit" name="reset" class="btn btn-danger">Reset</button>-->

        </form>
        <br/> <br/>
        <br/>
        <!--        <div class="row">-->
        <span class="txt9">
                                        Class:
                                    </span>
        <!--        </div>-->
        <form method="post" action="view_fact_tt.php">
            <button type="submit" name="mca1" class="btn btn-primary">MCA 1</button>
            <button type="submit" name="mca2" class="btn btn-primary">MCA 2</button>
        </form>
        <?php
        if (isset($_POST['mca1'])) {
            $_SESSION['CLASS_TT']= "1847230";
            header("refresh:0;URL=check_stud_tt.php");
        }
        if (isset($_POST['mca2'])) {
            $_SESSION['CLASS_TT']= "1847201";
            header("refresh:0;URL=check_stud_tt.php");

        }
        ?>

    </div>

    <div class="end-footer bg2" style="position: relative; top: 480px; ">
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
</body>

<!-- Lunch -->


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
<!-- <script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script> -->
<!--===============================================================================================-->
<script src="js/main.js"></script>


</html>