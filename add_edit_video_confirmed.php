<?php
	// Inialize session
	session_start();
	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];
	$role = $_SESSION['role'];

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['firstname'])) {
		header('Location: classes.php');
	}
	
	if ($role != 'admin')
		header('Location: classes.php');
		
	include "config.inc";

	$db = mysql_connect($hostname, $username, $password) or die(mysql_error());
	mysql_select_db($dbname,$db) or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css" />  
		<link rel="stylesheet" type="text/css" href="../css/fonts.css" />  
		<link href="http://fonts.googleapis.com/css?family=Terminal+Dosis&subset=latin" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.2.1/pure-min.css">
		<link rel="shortcut icon" href="../images/favicon.ico" />
		 
		<title>CFAA Math | Video Info</title>
		
		<style>
			.pure-button-display {
            background: #D10C02;
        }
		</style>
		
	</head>
	<body>
		<div id="header-container">
			<div id="header">
				<h1 class="title" >CFAA Math</h1>
				<div id="nav">
					<ul>
						<li><a href="../">home</a></li>
						<li><a href="../classes.php">classes</a></li>	
						<li><a href="../schedule.php">schedule</a></li>
						<li><a href="../tutoring.php">tutoring</a></li>
						<li class="last" ><a href="contact.php">contact</a></li>
<?php
						if (isset($_SESSION['firstname']))
							echo "<li class='loggedin' ><a href='../logout.php'>logout</a></li>";
?>						
					</ul>
				</div>
			</div>
		</div>
		
		<div id="main-container">
			<div id="main">
				<div id="info">
				
					<h3 class="sections">Confirm Information</h3>
					
						<div id="info_container">
<?php
	
	$Completed = $_POST['completed'];
	$New = $_POST['new'];
	$Class = $_POST['class'];
	$Unit = $_POST['unit'];
	$Title = $_POST['title'];
	$Path = $_POST['path'];
	$Enable = $_POST['enable'];
	
    if ($Completed)
	{
	
		if ($New != 'Yes')
		{
			mysql_query("UPDATE `videos` SET title = '" . $Title . "', path = '" . $Path . "', enable = '" . $Enable . "' WHERE (class='" . $Class ."' and unit='" . $Unit . "')",$db);
			
			$display = TRUE;
		}
			
			
		else if ($New == 'Yes')
		{
			$check = mysql_query("Select class, unit FROM videos WHERE (class='" . $Class ."' and unit='" . $Unit . "')");
			
			if (mysql_num_rows($check) == 0)
			{
				mysql_query("INSERT INTO `videos` (`class`, `unit`, `title`, `path`, `enable`) VALUES ('$Class', '$Unit', '$Title', '$Path', '$Enable')",$db);
			
				$display = TRUE;
			}
			
			else
				echo "<h3>Unit already exists in database. Please choose another unit.</h3><br />";
		}
			
		if ($display)
		{
			$confirm = mysql_query("SELECT * FROM videos WHERE (class='" . $Class ."' and unit='" . $Unit . "')");
			
			echo "<h3>Class: " . mysql_result($confirm, 0, 'class') . "</h3><br />";
			echo "<h3>Unit: " . mysql_result($confirm, 0, 'unit') . "</h3><br />";
			echo "<h3>Title: " . mysql_result($confirm, 0, 'title') . "</h3><br />";
			echo "<h3>Path: " . mysql_result($confirm, 0, 'path') . "</h3><br />";
			echo "<h3>Enable: " . mysql_result($confirm, 0, 'enable') . "</h3><br />";
		}
		

	}
?>						
					
					<a class="pure-button pure-button-display" href="../add_edit_video.php">Add / Update / Delete Another</a>
					
					</div>
					
				</div>
				
			
				<div class='clear'></div>

			</div>
			<div class='clear'></div>
			<div id="footer">
				<p><a href="../">home</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="../classes.php">classes</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="../schedule.php">schedule</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="../tutoring.php">tutoring</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="../contact.php">contact</a></p>
			</div>
			
		</div>
	</body>
</html>