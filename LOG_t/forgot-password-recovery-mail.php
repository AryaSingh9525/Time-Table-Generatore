<?php
if(!class_exists('PHPMailer')) 
{
	require('E:/x/htdocs/PG/ATTG/LOG/PHPMailer_5.2.0/class.phpmailer.php');
	require('E:/x/htdocs/PG/ATTG/LOG/PHPMailer_5.2.0/class.smtp.php');
}

require_once("mail_configuration.php");

$mail = new PHPMailer();

$user = "";
$emailBody = "<p><h3>Dear " . $user["username"] . ",<h3></p><br><p>Your password is<br>". $user["password"] . "<br><br></p>Regards,<br> TEAM TTG!<br>";
//$emailBody = "<p><h3>Dear . <h3></p><br><br><p>Your password is<br>" . "<br><br></p>Regards,<br> ARYA SINGH<br>Thanks";

$mail->IsSMTP();
//$mail->SMTPDebug = 0;
$mail->SMTPDebug = 2;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
//$mail->SMTPSecure = "ssl";
$mail->Port     = PORT;
$mail->Username = MAIL_USERNAME;
$mail->Password = MAIL_PASSWORD;
$mail->Host     = MAIL_HOST;
$mail->Mailer   = MAILER;
$mail->SetFrom(SERDER_EMAIL, SENDER_NAME);
$mail->AddReplyTo(SERDER_EMAIL, SENDER_NAME);
$mail->ReturnPath=SERDER_EMAIL;	
$mail->AddAddress("arya.singh@mca.christuniversity.in");
$mail->Subject = "Forgot Password Recovery";
$mail->MsgHTML($emailBody);
$mail->IsHTML(true);
$mail->CharSet = "UTF-8";

if(!$mail->Send()) 
{
	$error_message = '<p style="color:red;">ERROR : Problem in Sending Password Recovery Email</p>';
} 
else
 {
	$success_message = '<p style="color:blue;">Please check your email to reset password!</p>';
}

?>
