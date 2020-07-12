<?php
session_start();
include 'conn.php';
include 'boot.php';
include 'admin_top.php';

if (isset($_POST['remove'])) {
	$n = $_POST['usn'];
	$test = $n;

	if ($n != $_SESSION["test_s"]) {
		echo "<script type='text/javascript'>alert(\"USN is invalid! :/\");</script>";
		header("refresh:0;url=remove_stud.php");
		exit();
	}

	//$msg="<script type='text/javascript'>var conf=confirm(\"Are you sure?\");</script>";

	//echo $msg;
	//$conf = $msg;
	//if ($conf)
	//{

	$c1 = mysqli_query($conn, "delete from stud_list where usn = '$n'");
	$c2 = mysqli_query($conn, "delete from stud_att where usn = '$n'");
	if ($c2 && $c1) {
		echo "<script type='text/javascript'>alert(\"Student removed successfully! :)\");</script>";
		header("refresh:0;url=remove_stud.php");
		exit();
	}
	/*}
	else if (!$conf)
	{
	echo "<script type='text/javascript'>alert(\"Student has not been removed!\");</script>";
	header("refresh:10;url=remove_stud.php");	
	}*/
}

?>

<head>
	<style>
		body {
			color: white;
			font-size: 18px;
		}
	</style>
</head>
<center>
	<h2 style="font-family:Matura MT Script Capitals; font-size:35px;"> View Student! </h2><br />

	<form action="remove_stud.php" method="post">
		USN:

		<select name="usn" class="btn btn-default">
			<option value="-1">--select--</option>
			<?php
			$x = "select usn from stud_list ";
			$y = $conn->query($x);
			while ($z = mysqli_fetch_assoc($y)) {
				echo "<option value='" . $z['usn'] . "'>" . $z['usn'] . "</option>";
			}
			?>

		</select>

		<input type="submit" value="Search" name="search" class="btn btn-primary" />
	</form>

</center>
<br />
<?php

if (isset($_POST['search'])) {
	$n = $_POST['usn'];
	$_SESSION["test_s"] = $n;
	//--------------validations------------

	if ($n == "-1") {
		echo "<script type='text/javascript'>alert(\"Select a USN!\");</script>";
		//header("refresh:0;url=remove_stud.php");
		exit();
	}

	$a = "select * from stud_list where usn = '$n'";
	$b = $conn->query($a);

	?>


	<body>
		<center>
			<form action="remove_stud.php" method="post">
				<h2 style="font-family:Matura MT Script Capitals; font-size:35px;"> Remove Student! </h2><br />
				<table border="1">
					<tr>
						<td align='center'>Name: </td>
						<td><input type="text" class="btn btn-default" disabled name="name" value=" <?php while ($row1 = mysqli_fetch_assoc($b)) {
																										echo $row1['name'];

																										?>">

								<?php
								$s1 = mysqli_query($conn, "select * from subject where class_id = '$row1[class_id]'");
								$s2 = mysqli_fetch_array($s1);
								?>

						<tr>
							<td align='center'>Class ID: </td>
							<td><input type="text" disabled class="btn btn-default" value=" <?php
																							echo $s2['class_id'];
																							?>">

						<tr>
							<td align='center'>Semester: </td>
							<td><input type="text" disabled class="btn btn-default" value=" <?php
																							echo $s2['sem'];

																							?>">
						<tr>
							<td align='center'>Course: </td>
							<td><input type="text" disabled class="btn btn-default" value=" <?php
																							echo $s2['course'];
																						}
																						?>">
					</TR>

					<tr>
						<td align="center">USN:</td>
						<td><input type="text" class="btn btn-default" name="usn" required value="<?php echo $n; ?>"></td>
					</tr>

				</TABLE>
				<br />
				<input type="submit" value="Remove" name="remove" class="btn btn-primary">
			<?php } ?>


	</center>
	</form>

	<!------------------------->



</body>
<div id="footerbarwrap">
	<ul>
		<li>Copyright © Jayram G S. All rights reserved. +91 8971715217</li>

	</ul>
</div> <!-- Close Container -->