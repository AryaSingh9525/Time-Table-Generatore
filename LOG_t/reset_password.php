<html>
	<body bgcolor="lightblue">
<?php
	if(isset($_POST["reset-password"]))
	 {
		$conn = mysqli_connect("localhost", "root", "", "time_table_db");
		$sql = "UPDATE `login`.`password` SET `password` = '" .$_POST["password"]. "' WHERE `password`.`email` = '" . $_GET["email"] . "'";
		$result = mysqli_query($conn,$sql);
		$success_message = '<p style="color:green;">Password is reset successfully.</p>';
		
	}
?>
<link href="demo-style.css" rel="stylesheet" type="text/css">
<script>
function validate_password_reset()
 {
	if((document.getElementById("password").value == "") && (document.getElementById("confirm_password").value == "")) 
	{
		document.getElementById("validation-message").innerHTML = '<p style="green;">Please enter new password!</p>'
		return false;
	}
	if(document.getElementById("password").value  != document.getElementById("confirm_password").value) 
	{
		document.getElementById("validation-message").innerHTML = '<p style="color:red;">Both password should be same!</p>'
		return false;
	}
	
	return true;
}
</script>
<form align="center" name="frmReset" id="frmReset" method="post" onSubmit="return validate_password_reset();">
<h1>Reset Password</h1>
	<?php if(!empty($success_message)) 
	{
	 ?>
	<div class="success_message"><?php echo $success_message; ?></div>
	<?php
 } 
 ?>

	<div id="validation-message">
		<?php if(!empty($error_message)) 
		{
	     ?>
	<?php echo $error_message; ?>
	<?php 
        } 
    ?>
	</div>

	<div class="field-group">
		<div><label for="Password">Password</label></div>
		<div>
		<input type="password" name="member_password" id="member_password" class="input-field"></div>
	</div>
	
	<div class="field-group">
		<div><label for="email">Confirm Password</label></div>
		<div><input type="password" name="confirm_password" id="confirm_password" class="input-field"></div>
	</div>
	
	<div class="field-group">
		<div><input type="submit" name="reset-password" id="reset-password" value="Reset Password" class="form-submit-button"></div>
	</div>	
</form>
</body>
</html>
				