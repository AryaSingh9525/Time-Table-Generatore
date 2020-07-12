<?php include 'boot.php';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<style>
body{
	font-size: 20;
	font-family: quesha;
	
	}
</style>
<title>AMS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Site Template Theme" />
<meta name="keywords" content="menus, website, template, your, key, words, here"/>

<link rel="Shortcut Icon" type="image/ico" href="favicon.ico" />

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<link href="css/ddsmoothmenu.css" rel="stylesheet" type="text/css" />
<link href="css/haccordion.css" rel="stylesheet" type="text/css" />


<!-- JQUERY Library -->
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/fadeinout.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/TitilliumText14L_300_600.font.js"></script>
<script type="text/javascript" src="js/fontconfig.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">

</script>
<script type="text/javascript" src="js/common.js"></script>

<link rel="stylesheet" type="text/css" href="css/haccordion.css" />
<script type="text/javascript" src="js/haccordion.js">
</script>

<script type="text/javascript">

haccordion.setup({
	accordionid: 'hc1', 
	paneldimensions: {peekw:'50px', fullw:'786px', h:'430px'},
	selectedli: [-1, true], 
	collapsecurrent: false 
})

</script>
</head>

<body onload="javascript:haccordion.expandli('hc1', 0)">

<!--PHP CODE FOR SUBMITTING-->

<!--<form action="add_stud.php" method="POST"> -->

<!-- --------- -->

<div id="mainpagecontainer"> <!-- Outside Container -->
	<div id="mainpage"> 
	
		
		<div id="mainpageheader"> <!-- Header Start -->
			<div class="clear"></div>
			
			<div id="smoothmenu1" class="ddsmoothmenu"><!-- The Menu -->
				<ul>
					<li><a href="#">Home</a>
					</li>

					<li><a href="logout.php">Logout</a></li>
				</ul>
				<br style="clear: left" />
			</div>
			<br/><br/>
			<!-- Logo -->
			<div id="logo"><a href="#"><img src="images/AMS-white-no-title.png" alt="logo" width="175" height="60"/></a></div>
		<br/>	
		</div> <!-- Close Header -->
		
		<div id="hc1" class="haccordion">
		<ul>
		<!-- Block One -->
		<li>
			<div class="hpanel">
				<!-- Image -->
				<div class="hpanelimage">
				<img src="images/attendance.png" alt="slide" /></a>
				</div>
					<!-- Caption -->
					<div class="hpanelcaption captionfade">
						Click <a href="test_att.php"><input type="submit" value="me" name="click" class="btn btn-link">
<a/> to take the attendance of the students.
					</div>
				
			</div>
		</li>
		<!-- Block Two -->
		<li>
			<div class="hpanel">
			<div class="hpanelimage">
			<a href="#"><img src="images/reports1.jpg" alt="slide" id="rep"/></a>
			</div>
				<div class="hpanelcaption captionfade">
					Click<a href="report.php"> <input type="submit" value="me" name="view" class="btn btn-link"> to generate the attendance report of the students.</a>
				</div>
			</div>
		</li>
		<!-- Block Three -->
		<li>
			<div class="hpanel">
			<div class="hpanelimage">
			<a href="#"><div style="background-size:100% 100%;"><img src="images/user-icon.jpg" style="background-size: 5%;" alt="slide" /></div></a>
			</div>
				<div class="hpanelcaption captionfade">
					Click <a href="edit_profile.php"><input type="submit" value="me" name="report" class="btn btn-link"> to change password.</a>
				</div>
			</div>
		</li>
		<!-- Block Four -->
		<li>
			<div class="hpanel">
			<div class="hpanelimage">
			<a href="#"><img src="images/accordion/image9.jpg" alt="slide" /></a>
			</div>
				<div class="hpanelcaption captionfade">
					<a href="#"></a>
				</div>
			</div>
			
		</li>

		</ul>
		
	</div>
	
	</div><br/><br/><br/><br/>
	<div id="footerbarwrap">
	<ul>
		<li>Copyright © Jayaram G S. All rights reserved.     +91 8971715217</li>
	</ul>
	</div>
	<div class="clear"></div>	
	</div>
	
</body>
</html>
