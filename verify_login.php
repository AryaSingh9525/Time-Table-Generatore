<?php
session_start();
include 'boot.php';
include 'conn.php';

$_SESSION['log'] = 0;
$_SESSION['level'] = NULL;
$_SESSION['user'] = NULL;
$_SESSION["log_sts"] = 0;

if (isset($_POST['login'])) {

    $user = $_POST['username'];
    $pass = md5($_POST['password']);
    $pass2 = md5($pass);
    $_SESSION['user'] = $user;
    $_SESSION['user_id'] = $user;

    $sql1 = mysqli_query($conn, "SELECT * FROM login WHERE username = '" . $user . "' and password = '" . $pass . "'");
    if (mysqli_num_rows($sql1) == 0) {
        $msg = "Invalid credentials. Try again! :(";
        echo "<script type='text/javascript'>alert(\"$msg\");</script>";
        header("refresh:0;url=LOG/login.php");
    }

    $sql2 = mysqli_query($conn, "SELECT level from login where username = '" . $user . "' and password = '" . $pass . "' ");
    $res = mysqli_fetch_assoc($sql2);

    $_SESSION['level'] = $res['level'];
    $_SESSION["USER_LOGIN_STATUS"] = "true";
//    echo $_SESSION['level'];
    if ($res['level'] == 0)    //SHOULD BE ADMIN
    {
        if (mysqli_num_rows($sql2) == 1) {
            $_SESSION["USER_LOGIN_STATUS"] = "true";
            $msg = "Admin Login Successful! :)";
            echo "<script type='text/javascript'>alert(\"$msg\");</script>";
            header("refresh:0;url=./index.php");
            $_SESSION["log_sts"] = 1;
            $_SESSION["STUDENT"] = 0;
        }
    } else
        if ($res['level'] == "1") {
            $_SESSION["USER_LOGIN_STATUS"] = "true";

            $_SESSION["user_id"] = $user;
            $msg = "HOD Login Successful! :)";
            echo "<script type='text/javascript'>alert(\"$msg\");</script>";
            $_SESSION["log_sts"] = 1;
            header("refresh:0;url=./hod_top.php");
            exit();
        } else
            if ($res['level'] == "2") {
                $_SESSION["USER_LOGIN_STATUS"] = "true";

                $_SESSION["user_id"] = $user;
                $msg = "Faculty Login Successful! :)";
                echo "<script type='text/javascript'>alert(\"$msg\");</script>";
                $_SESSION["log_sts"] = 1;
                header("refresh:0;url=fact_top.php");
                exit();
            } else //    if ($res['level'] == "3")
            {
                $_SESSION["USER_LOGIN_STATUS"] = "true";
                $_SESSION["STUDENT"] = 1;
                $_SESSION["user_id"] = $user;
                $msg = "Student Login Successful! :)";
                echo "<script type='text/javascript'>alert(\"$msg\");</script>";
                $_SESSION["log_sts"] = 1;
                header("refresh:0;url=stud_top.php");
                exit();
            }
//	else {
//        $qw1 = mysqli_query($conn, "SELECT username from login where username='$user");
//        if (mysqli_num_rows($qw1) != 1) {
//            $msg = "Invalid password. Try again! :(";
//            echo "<script type='text/javascript'>alert(\"$msg\");</script>";
//            header("refresh:0;url=LOG/login.php");
//        }
}

