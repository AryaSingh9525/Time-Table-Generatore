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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
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
        .dropdown-menu>li.kopie>a {
            padding-left: 5px;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -6px;
            margin-left: -1px;
            -webkit-border-radius: 0 6px 6px 6px;
            -moz-border-radius: 0 6px 6px 6px;
            border-radius: 0 6px 6px 6px;
        }

        .dropdown-submenu>a:after {
            border-color: transparent transparent transparent #333;
            border-style: solid;
            /* border-width: 5px 0 5px 5px; */
            content: " ";
            display: block;
            float: right;
            height: 0;
            margin-right: -10px;
            margin-top: 5px;
            width: 0;
        }

        .dropdown-submenu:hover>a:after {
            border-left-color: #555;
        }

        .dropdown-menu>li>a:hover,
        .dropdown-menu>.active>a:hover {
            text-decoration: none;
        }

        @media (max-width: 767px) {

            .navbar-nav {
                display: inline;
            }

            .navbar-default .navbar-brand {
                display: inline;
            }

            .navbar-default .navbar-toggle .icon-bar {
                background-color: #fff;
            }

            .navbar-default .navbar-nav .dropdown-menu>li>a {
                /* color: red; */
                /* background-color: #ccc; */
                border-radius: 4px;
                margin-top: 2px;
            }

            .navbar-default .navbar-nav .open .dropdown-menu>li>a {
                /* color: #333; */
            }

            .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover,
            .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus {
                /* background-color: #ccc; */
            }

            .navbar-nav .open .dropdown-menu {
                border-bottom: 1px solid white;
                border-radius: 0;
            }

            .dropdown-menu {
                padding-left: 10px;
            }

            .dropdown-menu .dropdown-menu {
                padding-left: 20px;
            }

            .dropdown-menu .dropdown-menu .dropdown-menu {
                padding-left: 30px;
            }

            li.dropdown.open {
                /* border: 0px solid red; */
            }

        }

        @media (min-width: 768px) {
            ul.nav li:hover>ul.dropdown-menu {
                display: block;
            }

            #navbar {
                text-align: center;
            }
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
                <div id="navbar">
                    <nav class="" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"></a>
                        </div>

                        <div class="collapse navbar-collapse" id="navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <!-- <li class="active"><a href="#">Active Link</a></li> -->
                                <li><a href="#">HOME</a></li>
                                <!-- <li><a href="#">HOME</a></li> -->
                                <!-- <li><a href="#">HOME</a></li> -->

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">FACULTY <b class="caret"></b></a>

                                    <ul class="dropdown-menu">
                                        <!-- <li class="kopie"><a href="#">Dropdown</a></li> -->
                                        <li><a href="#">ADD</a></li>
                                        <!-- <li class="active"><a href="#">Dropdown Link 2</a></li> -->
                                        <li><a href="#">REMOVE</a></li>
                                        <li><a href="#">UPDATE</a></li>
                                        <li><a href="#">ASSIGN</a></li>
                                        <li><a href="#">VIEW TT</a></li>
                                    </ul>

                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">STUDENT <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <!-- <li class="kopie"><a href="#">Dropdown</a></li> -->
                                        <li><a href="#">ADD</a></li>
                                        <!-- <li class="active"><a href="#">Dropdown Link 2</a></li> -->
                                        <li><a href="#">REMOVE</a></li>
                                        <li><a href="#">UPDATE</a></li>
                                        <li><a href="#">ASSIGN</a></li>
                                        <li><a href="#">VIEW TT</a></li>
                                    </ul>


                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
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
<img src="images/icons/tt1.png" alt="IMG-LOGO" data-logofixed="images/icons/tt1.png">
<img src="images/icons/tt1.png" alt="IMG-LOGO" data-logofixed="images/icons/tt1.png">
<img src="images/icons/tt1.png" alt="IMG-LOGO" data-logofixed="images/icons/tt1.png">
<img src="images/icons/tt1.png" alt="IMG-LOGO" data-logofixed="images/icons/tt1.png">
<img src="images/icons/tt1.png" alt="IMG-LOGO" data-logofixed="images/icons/tt1.png">
<img src="images/icons/tt1.png" alt="IMG-LOGO" data-logofixed="images/icons/tt1.png">
<img src="images/icons/tt1.png" alt="IMG-LOGO" data-logofixed="images/icons/tt1.png">
<img src="images/icons/tt1.png" alt="IMG-LOGO" data-logofixed="images/icons/tt1.png">
<img src="images/icons/tt1.png" alt="IMG-LOGO" data-logofixed="images/icons/tt1.png">


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