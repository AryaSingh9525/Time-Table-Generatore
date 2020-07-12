<?php
if (!isset($_SESSION)) {
    session_start();
}
$status = $_SESSION["log_sts"];
if ($_SESSION["log_sts"] == 1) {
    $status = $_SESSION["log_sts"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Menu</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
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


    <style>
        body {
            background-image: url("pics/black.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
            background-size: 100%;
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
            background-color: #00ADEF;
            text-decoration: none;
        }

        .dropdown:hover {
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


<body class="animsition">
<!--<div class="item-slick1 item1-slick1" style="background-image: url(pics/black.jpg);">-->
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
                                <a href="./fact_top.php">Home</a>
                            </li>

                            <li>
                                <a href="./test_fact_tt.php">View TT</a>
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
                <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
            </div>
        </div>
    </div>
</header>

<!-- Sidebar -->
<aside class="sidebar trans-0-4">
    <!-- Button Hide sidebar -->
    <button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>
    <ul class="menu-sidebar p-t-95 p-b-70">
        <li class="t-center m-b-13">
            <div class="dropdown">
                <button class="dropbtn"><a style="color: #00ADEF;" href="fact_top.php">HOME</a></button>
            </div>
        </li>

        <li class="t-center m-b-13">
            <div class="dropdown">
                <button class="dropbtn" ><a style="color: #00ADEF;" href="view_fact_tt.php">VIEW TT</a></button>
            </div>
        </li>

        <?php
        $status = $_SESSION["log_sts"];
        if ($status != 1) { ?>
            <li class="t-center m-b-13">
                <div class="dropdown">
                    <button class="dropbtn"><a style="color: #00ADEF;" href="LOG/login.php">LOGIN</a></button>
                </div>
            </li>
            <?php
        } else {
            ?>
            <li class="t-center m-b-13">
                <div class="dropdown">
                    <button class="dropbtn" ><a style="color: #00ADEF;" href="./logout.php">LOGOUT</a></button>
                </div>
            </li>
            <?php
        }
        ?>

    </ul>

    <!-- - -->
</aside>

<div class="end-footer bg2" style="top:790px; position: relative">
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