<?php
ob_start();
include 'boot.php';
include 'conn.php';
include 'admin_top.php';

if (isset($_POST['submit1'])) {
    header("refresh:0;url=assign_theory.php");
    die();
}
?>
    <html lang="en">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
        </script>
        <script src="jquery.lwMultiSelect.js">
        </script>

        <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
        <title>
            Subject allocation
        </title>

        <!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> -->
        <style>
            body {
                background-image: url("pics/black.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                color: white;
                background-size: 100%;
                background-color: #000;
                font-family: verdana, serif;
            }

            #butt {
                font-size: 20px;
            }
        </style>
    </head>
    <body class="animsition">
    <div style="position: relative; top: 300px;" align="center">
        <form action="assign_sub.php" method="post">
            <input type="submit" name="submit1" id="butt" class='btn btn-success' value="Assign Theory"><br/><br/>
            <input type="submit" name="submit2" id="butt" class='btn btn-success' value="Assign Lab">
        </form>
    </div>

    <div class="end-footer bg2" style="position: relative; top: 690px">
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
    </body>
    </html>

<?php
$conn->close();
?>
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
<?php
ob_end_flush();
?>