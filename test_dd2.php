<?php
if (!isset($_SESSION)) {
    session_start();
}
$status = $_SESSION["log_sts"];
if ($_SESSION["log_sts"] == 1) {
    $status = $_SESSION["log_sts"];
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <title>Menu</title> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
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
</head>


<style>
    .main_menu>li>a {
        font-family: Montserrat;
        font-weight: 400;
        font-size: 14px;
        text-transform: uppercase;
        color: white;
        padding: 15px;
    }

    .dropbtn {
        /* background-color: #4CAF50; */
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
        box-shadow: 0px 8px 16px 6px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 4px 0px;
        /*vertical & horizontal distance*/
        /* SUB MENU */
        text-decoration: none;
        display: block;
        font-size: 12px;
        text-align: center;
    }

    .dropdown-content a:hover {
        background-color: #00ADEF;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        font-family: Montserrat;
        font-weight: 400;
        font-size: 14px;
        text-transform: uppercase;
        color: #00ADEF;
        padding: 15px;
    }

    /* header-fixed .main_menu> li > dropdown */

    header-fixed .dropbtn {
        color: red;
    }
</style>

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
                                    <button class="dropbtn">FACULTY</button>
                                    <div class="dropdown-content">
                                        <a href="#">ADD</a>
                                        <a href="#">REMOVE</a>
                                        <a href="#">UPDATE</a>
                                        <a href="#">ASSIGN</a>
                                        <a href="#">VIEW TT</a>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button class="dropbtn">STUDENT</button>
                                    <div class="dropdown-content">
                                        <a href="#">ADD</a>
                                        <a href="#">REMOVE</a>
                                        <a href="#">UPDATE</a>
                                        <a href="#">ASSIGN</a>
                                        <a href="#">VIEW TT</a>

                                    </div>
                                </div>
                            </li>

                            <?php
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
                    <a href="#"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-facebook m-l-21" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter m-l-21" aria-hidden="true"></i></a>

                    <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Sidebar -->
<aside class="sidebar trans-0-4">
    <!-- Button Hide sidebar -->
    <button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

    <!-- - -->

    <!-- Button3 -->
    <a href="reservation.html" class="btn3 flex-c-m size13 txt11 trans-0-4 m-l-r-auto">
        Reservation
    </a>
    </li>
    </ul>

    <!-- - -->
    <div class="gallery-sidebar t-center p-l-60 p-r-60 p-b-40">
        <!-- - -->
        <h4 class="txt20 m-b-33">
            Gallery
        </h4>

    </div>
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
<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>

</html>