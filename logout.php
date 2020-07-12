<?php
session_start();
session_destroy();
session_unset();
?>
<html>

<head>
    <title>Logout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css" type="text/css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!-- ===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="LOG/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="LOG/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="LOG/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="LOG/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="LOG/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="LOG/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="LOG/css/util.css">
    <link rel="stylesheet" type="text/css" href="LOG/css/main.css">
    <!--===============================================================================================-->
    <style>
        body {
            overflow-x: hidden;
            overflow-y: hidden;
            color: #FFEEEE;

        }
    </style>
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="LOG/images/tt1.png" alt="IMG">
            </div>
            <form class="login100-form validate-form" method='post' action="../verify_login.php">
                <marquee STYLE="font-family:quesha;top:380px; font-size: 50px; left:800px; position:absolute;" scrollamount="150" behavior="slide">
                    <?php
                    echo "Logging out... Please wait...!";
                    header("refresh:3;url=LOG/login.html");

                    ?></marquee>
            </form>
        </div>
    </div>
    <!-- <span class='fa fa-logout'>w</span> -->
    <!-- </div> -->
</body>

</html>

<script src="LOG/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="LOG/vendor/bootstrap/js/popper.js"></script>
<script src="LOG/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="LOG/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="LOG/vendor/tilt/tilt.jquery.min.js"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="LOG/js/main.js"></script>