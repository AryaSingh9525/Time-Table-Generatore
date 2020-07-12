<?php
//if (!isset($_SESSION)) {
//    session_start();
//}

//if ($_SESSION["USER_LOGIN_STATUS"] != "true")
//{
//    echo "<script type='text/javascript'>alert(\"Kindly login first!!\");</script>";
//    echo "Redirecting to Login page!";
//    header("refresh:0;url=LOG/login.php");
//}
//else {
if (isset($_SESSION['level']) == 0) {
    include 'admin_top.php';
} elseif (isset($_SESSION['level']) == 1) {
    include 'hod_top.php';
} else {
//        include 'index_top.php';
    $_SESSION['level'] = NULL;
}
//}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

    <style>
        body {
            text-decoration: none;

        }
    </style>
</head>

<body class="animsition">
<!-- Sidebar -->
<!---->
<!-- Slide1 -->
<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            <div class="item-slick1 item1-slick1" style="background-image: url(pics/black.jpg);">
                <!-- <div class="item-slick1 item1-slick1" style="background-color: #000;"> -->

                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15"
                              data-appear="fadeInDown">
							Welcome to
						</span>

                    <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                        TT generator
                    </h2>

                    <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                        <!-- Button1 -->
                        <!-- <a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
                            Look Menu
                        </a> -->
                    </div>
                </div>
            </div>

            <div class="item-slick1 item2-slick1" style="background-image: url(pics/black.jpg);">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rollIn">
							Welcome to
						</span>

                    <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                        TT generator
                    </h2>

                    <div class="wrap-btn-slide1 animated visible-false" data-appear="slideInUp">
                        <!-- Button1 -->
                        <!-- <a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
                            Look Menu
                        </a> -->
                    </div>
                </div>
            </div>

            <div class="item-slick1 item3-slick1" style="background-image: url(pics/black.jpg);">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15"
                              data-appear="rotateInDownLeft">
							Welcome to
						</span>

                    <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37"
                        data-appear="rotateInUpRight">
                        TT generator
                    </h2>

                    <div class="wrap-btn-slide1 animated visible-false" data-appear="rotateIn">
                        <!-- Button1 -->
                        <!-- <a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
                            Look Menu
                        </a> -->
                    </div>
                </div>
            </div>

        </div>

        <div class="wrap-slick1-dots"></div>
    </div>
</section>

<div class="end-footer bg2">
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
<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
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
<!-- <script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script> -->
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>

</html>