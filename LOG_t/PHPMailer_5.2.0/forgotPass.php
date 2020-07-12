<html>
	<body bgcolor="lightgreen">
<?php
	if(!empty($_POST["forgot-password"]))
	{
		$conn = mysqli_connect("localhost", "root", "", "time_table_db");
		
		$condition = "";
		if(!empty($_POST["user-login-name"])) 
			$condition = " username = '" . $_POST["user-login-name"] . "'";
		if(!empty($_POST["user-email"])) 
		{
			if(!empty($condition))
			 {
				$condition = " and ";
			}
			$condition = "email = '" . $_POST["user-email"] . "'";
		}
		
		if(!empty($condition)) {
			$condition = " where " . $condition;
		}

		$sql = "Select * from login" . $condition;
		$result = mysqli_query($conn,$sql);
		$user = mysqli_fetch_array($result);
		
		if(!empty($user)) {
			require_once("forgot-password-recovery-mail.php");
		}
		 else 
		 {
			$error_message = '<p style="color:red;">No Email Found</p>';
		}
	}
?>
<link href="demo-style.css" rel="stylesheet" type="text/css">
<script>
function validate_forgot() 
{
	if((document.getElementById("user-login-name").value == "") && (document.getElementById("email").value == "")) 
	{
		document.getElementById("validation-message").innerHTML = "Login Email is required!"
		return false;
	}
	return true
}
</script>
<br><br><h3><li><a href="../LOG/login.php" target="_self" >Back</a></li></h3>
<form align="center" name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_forgot();"><br><br><br><br>
<h1>Forgot Password?</h1>
	<?php if(!empty($success_message)) 
	{ ?>
	<div class="success_message"><?php echo $success_message; ?></div>
	<?php } ?>

	<div id="validation-message">
		<?php if(!empty($error_message)) 
		{ ?>
	<?php echo $error_message; ?>
	<?php
 }
  ?>
	</div>

	<!-- <div class="field-group">
		<div><label for="username">Username</label></div>
		<div><input type="text" name="user-login-name" id="user-login-name" class="input-field"> Or</div>
	</div>
	 -->
	<div class="field-group">
		<div><label for="email"><h3>Enter Your Email</h3></label></div>
		<div><input type="text" name="user-email" id="user-email" class="input-field">
		<input type="submit" name="forgot-password" id="forgot-password" value="Submit" class="form-submit-button">
	</div>

</form>
	</body>
</html>