<?php
ob_start();
// $_SESSION["log_sts"] = 0;
if (!isset($_SESSION)) {
    session_start();
    $_SESSION['log_sts'] = 1;
}

if ($_SESSION["USER_LOGIN_STATUS"] != "true") {
    echo "<script type='text/javascript'>alert(\"Kindly login first!!\");</script>";
    echo "Redirecting to Login page!";
    header("refresh:0;url=LOG/login.php");
    exit();
}

//$status = $_SESSION["log_sts"];
//if ($_SESSION["log_sts"] == 1) {
//    $status = $_SESSION["log_sts"];
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--    <title></title>-->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

    <!--    <link rel="stylesheet" href="css/style.css" type="text/css">-->

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- <title>Menu</title> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> -->
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
    <!--===============================================================================================-->

    <style>
        /* body {
            background-image: url("pics/black.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
            background-size: 100%;
        } */

        body {
            /*background-color: #2b4162;*/
            background-image: linear-gradient(315deg, #2b4162 0%, #12100e 74%);
        }

        .main_menu > li > a {
            font-family: Lithos Pro Regular, serif;
            font-weight: 400;
            font-size: 16px;
            text-transform: uppercase
            color: white;
            padding: 15px;
        }

        .dropbtn {
            /* background-color: #4CAF50; */
            font-family: Lithos Pro Regular, serif;
            color: white;
            padding: 15px;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            /* SUB MENU BACKGROUND COLOR */
            min-width: 100px;
            box-shadow: 0 8px 16px 6px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 4px 0;
            /*vertical & horizontal distance*/
            /* SUB MENU */
            text-decoration: none;
            display: block;
            font-size: 14px;
            text-align: center;
        }

        .dropdown-content a:hover {
            background-color: #ffffff;
            text-decoration: none;
        }

        .dropdown:hover .dropdown-content {
            display: block;
            text-decoration: none;
        }

        .dropdown:hover .dropbtn {
            font-family: Lithos Pro Regularserif, serif;
            font-weight: 400;
            font-size: 14px;
            text-transform: uppercase;
            color: #00ADEF;
            padding: 15px;
            text-decoration: none;
        }

        a:hover {
            color: #00adef;
            text-decoration: none;
        }

    </style>
</head>
<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="wrap-menu-header gradient1 trans-0-4">
        <div class="container h-full">
            <div class="wrap_header trans-0-3">
                <!-- Logo -->
                <div class="logo">
                    <a href="#">
                        <img src="images/icons/tt1.png" alt="IMG-LOGO" data-logofixed="images/icons/tt1.png">
                    </a>
                </div>

                <!-- Menu -->
                <div class="wrap_menu p-l-45 p-l-0-xl">
                    <nav class="menu">

                        <ul class="main_menu">
                            <li>
                                <a href="./index.php">Home</a>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button class="dropbtn"><a>FACULTY</a></button>
                                    <div class="dropdown-content">
                                        <a href="add_faculty.php">ADD</a>
                                        <a href="#">REMOVE</a>
                                        <a href="update_faculty.php">UPDATE</a>
                                        <a href="assign_sub.php">ASSIGN</a>
                                        <a href="unassign_sub.php">UN-ASSIGN</a>
                                        <!--                                        <a href="view_fact_tt.php">VIEW TT</a>-->
                                    </div>
                                </div>
                            </li>
<!--                            <li>-->
<!--                                <div class="dropdown">-->
<!--                                    <button class="dropbtn"><a>&nbsp;&nbsp;HOD</a></button>-->
<!--                                    <div class="dropdown-content">-->
<!--                                        <a href="assign_hod.php">ASSIGN</a>-->
<!--                                        <a href="unassign_hod.php">UNASSIGN</a>-->
<!--                                                                                <a href="#">UPDATE</a>-->
<!---->
<!--                                                                                <a href="view_fact_tt.php">VIEW TT</a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </li>-->
                            <!---->
                            <!--                            <li>-->
                            <!--                                <div class="dropdown">-->
                            <!--                                    <button class="dropbtn"><a href="#">HOD</a></button>-->
                            <!--                                    <div class="dropdown-content">-->
                            <!--                                        <a href="add_faculty.php">ASSIGN</a>-->
                            <!--                                        <a href="#">REMOVE</a>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </li>-->

                            <li>
                                <div class="dropdown">
                                    <button class="dropbtn"><a>STUDENT</a></button>
                                    <div class="dropdown-content">
                                        <a href="#">ADD</a>
                                        <a href="#">REMOVE</a>
                                        <a href="#">UPDATE</a>
                                        <!-- <a href="#">ASSIGN</a> -->
                                        <!--                                        <a href="#">VIEW TT</a>-->

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button class="dropbtn"><a>SCHEDULE</a></button>
                                    <div class="dropdown-content">
                                        <a href="sub_schedule.php">ADD</a>
                                        <!--                                        <a href="remove_schedule.php">REMOVE</a>-->
                                        <!--                                    <a href="#">UPDATE</a>-->
                                        <!-- <a href="#">ASSIGN</a> -->
                                        <a href="view_fact_tt.php">VIEW TT</a>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="search.php">SEARCH</a>
                            </li>
                            <?php
                            $status = $_SESSION["log_sts"];
                            if ($status != 1) { ?>
                                <li>
                                    <a href="LOG/login.php">login</a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li>
                                    <a href="./logout.php">Logout</a>
                                </li>
                                <?php
                            }
                            ?>

                        </ul>
                    </nav>
                </div>

                <!-- Social -->
                <div class="social flex-w flex-l-m p-r-20">
                    <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Sidebar -->
<!--<aside class="sidebar trans-0-4" style="background-color: #2b4162; background-image: linear-gradient(315deg, #2b4162 0%, #12100e 74%);">-->
<aside class="sidebar trans-0-4" style="    background: linear-gradient(-135deg, #004e92,#000428);">
    <!-- Button Hide sidebar -->
    <button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

    <ul class="menu-sidebar p-t-95 p-b-70">
        <li class="t-center m-b-13">
            <div class="dropdown">
                <button class="dropbtn">
                    <a href="index.php" style="color: #ffffff;">HOME</a>
                </button>
            </div>
        </li>


        <li class="t-center m-b-13">
            <div class="dropdown">
                <button class="dropbtn"><a href="#" style="color: #ffffff;">FACULTY</a></button>
                <div class="dropdown-content">
                    <a href="add_faculty.php">ADD</a>
                    <a href="#">REMOVE</a>
                    <a href="update_faculty.php">UPDATE</a>
                    <a href="assign_sub.php">ASSIGN</a>
                    <a href="unassign_sub.php">UN-ASSIGN</a>
                    <!--                            <a href="view_fact_tt.php">VIEW TT</a>-->
                </div>
            </div>
        </li>

        <li class="t-center m-b-13">
            <div class="dropdown">
                <button class="dropbtn"><a href="#" style="color: #ffffff;">HOD</a></button>
                <div class="dropdown-content">
                    <a href="assign_hod.php">ASSIGN</a>
                    <a href="unassign_hod.php">UNASSIGN</a>
                </div>
        </li>

        <li class="t-center m-b-13">
            <div class="dropdown">
                <button class="dropbtn"><a style="color: #ffffff;">STUDENT</a></button>
                <div class="dropdown-content">
                    <a href="#">ADD</a>
                    <a href="#">REMOVE</a>
                    <a href="#">UPDATE</a>
                    <!--                    <a href="#">VIEW TT</a>-->

                </div>
            </div>
        </li>

        <li class="t-center m-b-13">
            <div class="dropdown">
                <button class="dropbtn"><a href="#" style="color: #ffffff;">SCHEDULE</a></button>
                <div class="dropdown-content">
                    <a href="sub_schedule.php">ADD</a>
                    <!--                    <a href="#">REMOVE</a>-->
                    <a href="view_fact_tt.php">VIEW TT</a>

                </div>
        </li>

        <li class="t-center m-b-13">
            <div class="dropdown">
                <button class="dropbtn">
                    <a href="search.php" style="color: #ffffff;">SEARCh</a>
                </button>
            </div>
        </li>

        <?php
        $status = $_SESSION["log_sts"];
        if ($status != 1) { ?>
            <li class="t-center m-b-13">
                <div class="dropdown">
                    <button class="dropbtn"><a href="LOG/login.php" style="color: #00ADEF;">LOGIN</a></button>
                </div>
            </li>
            <?php
        } else {
            ?>
            <li class="t-center m-b-13">
                <div class="dropdown">
                    <button class="dropbtn"><a href="./logout.php" style="color: #ffffff;">LOGOUT</a></button>
                </div>
            </li>
            <?php
        }
        ?>

    </ul>

    <!-- - -->
</aside>


<!-- Main menu -->
<section class="section-mainmenu p-t-110 p-b-70 bg1-pattern">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-6 p-r-35 p-r-15-lg m-l-r-auto">
                <div class="wrap-item-mainmenu p-b-22">

                </div>
            </div>
        </div>
    </div>
</section>


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
<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</html>