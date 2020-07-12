<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!empty($_POST["forgot-password"])) {
    $mail_id = $_REQUEST['user-email'];

    $conn = mysqli_connect("localhost", "root", "", "time_table_db");


    $ch1 = mysqli_query($conn, "SELECT * from admin_details where email = '$mail_id'");
    $ch2 = mysqli_fetch_array($ch1);
    if (mysqli_num_rows($ch1) == 1) {
        $ch3 = mysqli_query($conn, "SELECT * from login where username = '$ch2[username]'");
        $ch4 = mysqli_fetch_array($ch3);
        $_SESSION['MAIL_USER_NAME'] = $ch4['username'];
        $_SESSION['MAIL_USER_PASSWORD'] = $ch4['password'];
        $_SESSION['MAIL_USER_EMAIL_ID'] = $ch2['email'];
    } else {


        $result = mysqli_query($conn, "SELECT * from faculty_details where email = '$mail_id'");
        $user = mysqli_fetch_array($result);

        $qry1 = mysqli_query($conn, "SELECT * from login where username = '$user[fact_id]'");
        $qry2 = mysqli_fetch_array($qry1);

        $_SESSION['MAIL_USER_NAME'] = $qry2['username'];
        $_SESSION['MAIL_USER_PASSWORD'] = $qry2['password'];
        $_SESSION['MAIL_USER_EMAIL_ID'] = $user['email'];
    }

    if (!empty($qry2) || !empty($ch4)) {
        require_once("forgot-password-recovery-mail.php");
    } else {
        $error_message = '<p style="color:rgba(230,36,0,0.86);">No Email ID found. Try again!</p>';
    }

}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Recover password</title>
    <style>
        body {
            background: linear-gradient(-135deg, #004e92, #000428);
        }
    </style>

    <script>
        function validate_forgot() {
            if ((document.getElementById("user-login-name").value === "") && (document.getElementById("email").value === "")) {
                document.getElementById("validation-message").innerHTML = "Login Email is required!";
                return false;
            }
            return true
        }

    </script>
</head>
<body>
<div class="limiter">
    <div class="container-login100">

        <div class="login100-pic js-tilt" data-tilt>
            <img src="images/tt1.png" alt="IMG">
        </div>


        <form align="center" name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_forgot();"
              class="login100-form validate-form">
            <span class="login100-form-title">
					Time Table Generator
				</span>
            <!--            --><?php //if (!empty($success_message)) { ?>
            <!--                <div class="success_message">--><?php //echo $success_message; ?><!--</div>-->
            <!--            --><?php //} ?>

            <div class="field-group">
                <!--                <div><label for="email"><h3>Enter Your Email</h3></label></div><br/>-->

                <!--                <div>-->
                <!--                   <input type="text" name="user-email" id="user-email" class="input-field">-->
                <!--                    <input type="submit" name="forgot-password" id="forgot-password" value="Submit"-->
                <!--                           class="form-submit-button">-->
                <!--                </div>-->
                <span style="font-size: 28px; color: #a5a5a5">Forgot password?</span> <br/> <br/>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="email" name="user-email" placeholder="Email ID" id="user-email"
                           required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
                </div>
                <div id="validation-message">
                    <?php if (!empty($error_message)) { ?>
                        <?php echo $error_message; ?>
                        <?php
                    }
                    ?>

                    <div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" name='forgot-password' id="forgot-password">
                    </div>

        </form>
        <div class="text-center p-t-12">
            <a class="txt2" href="../LOG/login.html">
                Login</a>
        </div>

    </div>

</body>
</html>