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
		 
		<title>CFAA Math | Video Stats</title>
		
		<script>
			$(document).ready(function(){ 
				
				$(window).scroll(function(){
					if ($(this).scrollTop() > 100) {
						$('.scrollup').fadeIn();
					} else {
						$('.scrollup').fadeOut();
					}
				}); 
				
				$('.scrollup').click(function(){
					$("html, body").animate({ scrollTop: 0 }, 1000);
					return false;
				});
	 
			});
		</script>
		
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
	$Oldname = $_POST['oldname'];
	$New = $_POST['new'];
	$FName = $_POST['firstname'];
	$LName = $_POST['lastname'];
	$Password = $_POST['password'];
	$Subject1 = $_POST['subject1'];
	$Subject2 = $_POST['subject2'];
	$Subject3 = $_POST['subject3'];
	$Role = $_POST['role'];
	
	$oldname = explode(",",$Oldname);
	$oldlname = trim($oldname[0], " ");
	$oldfname = trim($oldname[1], " ");
	
    if ($Completed)
	{
	
		if ($New != 'Yes')
		{
			mysql_query("UPDATE `login_info` SET firstname = '" . $FName . "', lastname = '" . $LName . "', password = '" . $Password . "', subject1 = '" . $Subject1 . "' , subject2 = '" . $Subject2 . "', subject3 = '" . $Subject3 . "', role = '" . $Role . "' WHERE (firstname='" . $oldfname ."' and lastname='" . $oldlname . "')",$db);
			
			$display = TRUE;
		}
			
			
		else if ($New == 'Yes')
		{
			$check = mysql_query("Select firstname, lastname FROM login_info WHERE (firstname='" . $FName ."' and lastname='" . $LName . "')");
			
			if (mysql_num_rows($check) == 0)
			{
				mysql_query("INSERT INTO `login_info` (`firstname`, `lastname`, `password`, `subject1`, `subject2`, `subject3`, `role`) VALUES ('$FName', '$LName', '$Password', '$Subject1', '$Subject2', '$Subject3', '$Role')",$db);
			
				$display = TRUE;
			}
			
			else
				echo "<h3>Name already exists in database. Please choose another name.</h3><br />";
		}
			
		if ($display)
		{
			$confirm = mysql_query("SELECT * FROM login_info WHERE (firstname='" . $FName ."' and lastname='" . $LName . "')");
			
			echo "<h3>First Name: " . mysql_result($confirm, 0, 'firstname') . "</h3><br />";
			echo "<h3>Last Name: " . mysql_result($confirm, 0, 'lastname') . "</h3><br />";
			echo "<h3>Password: " . mysql_result($confirm, 0, 'password') . "</h3><br />";
			echo "<h3>Subject 1: " . mysql_result($confirm, 0, 'subject1') . "</h3><br />";
			echo "<h3>Subject 2: " . mysql_result($confirm, 0, 'subject2') . "</h3><br />";
			echo "<h3>Subject 3: " . mysql_result($confirm, 0, 'subject3') . "</h3><br />";
			echo "<h3>Role: " . mysql_result($confirm, 0, 'role') . "</h3><br />";
		}
		

	}
?>						
					
					<a class="pure-button pure-button-display" href="../add_edit_student.php">Add / Update Another</a>
					
					</div>
					
				</div>
				
			
				<div class='clear'></div>

			</div>
			<div class='clear'></div>
			<a href="#" class="scrollup">Scroll</a>
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