<?php
include '../conn.php';
if (!isset($_SESSION)) {
    session_start();
}
//include 'conn.php';
if (isset($_POST["reset-password"])) {

    $old = $_POST['old_pass'];
    $pass = md5($_POST['member_password']);
    $conf = md5($_POST['confirm_password']);

    if ($pass != $conf) {
        echo "<script type='text/javascript'>alert(\"Passwords do not match. Please try again!\");</script>";
        header("refresh:0;url=reset_password.php");
        exit();
    }

    $ch1 = mysqli_query($conn,"SELECT * from login where password = '$old'");
    if(mysqli_num_rows($ch1) < 1)
    {
        echo "<script type='text/javascript'>alert(\"Invalid old password. Kindly paste the code received in the mail!\");</script>";
        header("refresh:0;url=reset_password.php");
        exit();
    }

    $mail_id = $_SESSION['MAIL_USER_EMAIL_ID'];
    $user_name = $_SESSION["MAIL_USER_NAME"];
    $conn = mysqli_connect("localhost", "root", "", "time_table_db");
//    $a1 = mysqli_query($conn, "Select * from login where email= '$mail_id' and password ='$old' and username = '$user_name'");
    $a1 = mysqli_query($conn, "Select * from faculty_details where email= '$mail_id'");
    $a2 = mysqli_fetch_assoc($a1);
    if ($a2) {
        $a3 = mysqli_query($conn, "UPDATE login set password = '$pass' where password ='$old' and username = '$user_name'");
        echo "<script type='text/javascript'>alert(\"Password changed successfully!\");</script>";
        header("refresh:0;url=login.php");
        exit();
    }
//    $sql = "UPDATE `login`.`password` SET `password` = '" . $_POST["password"] . "' WHERE `password`.`email` = '" . $_GET["email"] . "'";
//    $result = mysqli_query($conn, $sql);
//    $success_message = '<p style="color:green;">Password is reset successfully.</p>';
}
?>
<html lang="en">
<head>
    <title>Reset password</title>
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
    <script>
        function validate_password_reset() {
            if ((document.getElementById("password").value === "") && (document.getElementById("confirm_password").value === "")) {
                document.getElementById("validation-message").innerHTML = '<p style="green;">Please enter new password!</p>';
                return false;
            }
            if (document.getElementById("password").value !== document.getElementById("confirm_password").value) {
                document.getElementById("validation-message").innerHTML = '<p style="color:red;">Both password should be same!</p>';
                return false;
            }
            return true;
        }
    </script>
    <style>
        body {
            background: linear-gradient(-135deg, #004e92, #000428);
        }
    </style>
<body>
<div class="container-login100">
    <!-- <div class="wrap-login100"> -->
    <div class="login100-pic js-tilt" data-tilt>
        <img src="images/tt1.png" alt="IMG">
    </div>

    <form align="center" name="frmReset" id="frmReset" method="post" onSubmit="return validate_password_reset();"
          class="login100-form validate-form">
                <span class="login100-form-title">
					Time Table Generator
				</span>
        <!--    <h1>Reset Password</h1>-->
        <!--    --><?php //if (!empty($success_message)) {
        //        ?>
        <!--        <div class="success_message">--><?php //echo $success_message; ?><!--</div>-->
        <!--        --><?php
        //    }
        //    ?>
        <span style="font-size: 28px; color: #a5a5a5">Reset password!</span> <br/> <br/>
        <div id="validation-message">
            <?php if (!empty($error_message)) {
                ?>
                <?php echo $error_message; ?>
                <?php
            }
            ?>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="password" name="old_pass" placeholder="Old password"
                   required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="password" placeholder="New password" required name="member_password"
                   id="member_password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="password" placeholder="New password" name="confirm_password"
                   id="confirm_password" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
        </div>

        <div class="container-login100-form-btn">
            <input type="submit" name="reset-password" id="reset-password" value="SUBMIT"
                   class="login100-form-btn">
        </div>
        <!--        <div class="text-center p-t-12">-->
        <!--            <a class="txt2" href="../LOG/login.php">-->
        <!--                Login</a>-->
        <!--        </div>-->
    </form>

</div>
</body>
</html>
				