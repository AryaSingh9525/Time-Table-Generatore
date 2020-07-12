<?php
if (!isset($_SESSION)) {
	session_start();
}

if (!class_exists('PHPMailer')) {
    require('E:/x/htdocs/PG/ATTG/LOG/PHPMailer_5.2.0/class.phpmailer.php');
    require('E:/x/htdocs/PG/ATTG/LOG/PHPMailer_5.2.0/class.smtp.php');
}

require_once("mail_configuration.php");

$mail = new PHPMailer();

$user = "";
$emailBody = "<p><h3>Dear " . $_SESSION['MAIL_USER_NAME'] . ",<h3></p><p>Your password is:<br>" . $_SESSION['MAIL_USER_PASSWORD'] . "<br><br>Kindly copy the  given code and reset your password.<br></p>Regards,<br> TEAM TTG! :)<br>";
//$emailBody = "<p><h3>Dear . <h3></p><br><br><p>Your password is<br>" . "<br><br></p>Regards,<br> ARYA SINGH<br>Thanks";

$mail->IsSMTP();
//$mail->SMTPDebug = 0; //DEBUGGING PURPOSE
//$mail->SMTPDebug = 2;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
//$mail->SMTPSecure = "ssl";
$mail->Port = PORT;
$mail->Username = MAIL_USERNAME;
$mail->Password = MAIL_PASSWORD;
$mail->Host = MAIL_HOST;
$mail->Mailer = MAILER;
$mail->SetFrom(SERDER_EMAIL, SENDER_NAME);
$mail->AddReplyTo(SERDER_EMAIL, SENDER_NAME);
$mail->ReturnPath = SERDER_EMAIL;
$mail->AddAddress($_SESSION["MAIL_USER_EMAIL_ID"]);
$mail->Subject = "Forgot Password Recovery";
$mail->MsgHTML($emailBody);
$mail->IsHTML(true);
$mail->CharSet = "UTF-8";

if (!$mail->Send()) {
    $error_message = '<p style="color:red;">ERROR : Problem in Sending Password Recovery Email</p>';
} else {
    $success_message = '<p style="color:blue;">Please check your email to reset password!</p>';
}

echo "<script> alert(\"Mail has been sent successfully. Reset your password!\");</script>";
header("refresh:0;URL=reset_password.php");
