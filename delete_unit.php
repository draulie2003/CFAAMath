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
		 
		<title>CFAA Math | Video</title>
		
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
				
					<h3 class="sections">Confirm Delete</h3>
					
						<div id="info_container">
							<form method='post' action='../confirm_unit_deleted.php' name='add_edit_student' class="pure-form pure-form-aligned">
							<fieldset>
<?php
	
								$Class = $_GET['class'];
								$Unit = $_GET['unit_num'];
								
							 
								$data = mysql_query("SELECT * FROM unit_titles WHERE (class='" . $Class ."' and unit_num='" . $Unit . "')");
																
								echo "<div class='pure-control-group'>";
									echo "<label for='class'>Class:</label>";
									echo "<input name='class' type='text' value='" . mysql_result($data, 0, "class") . "'>";
								echo "</div>";
								
								echo "<div class='pure-control-group'>";
									echo "<label for='unit_num'>Unit:</label>";
									echo "<input name='unit_num' type='text' value='" . mysql_result($data, 0, "unit_num") ."'>";
								echo "</div>";
																
								echo "<div class='pure-control-group'>";
									echo "<label for='unit_title'>Title:</label>";
									echo "<input name='unit_title' type='text' value='" . mysql_result($data, 0, "unit_title") ."'>";
								echo "</div>";
															
								echo "<div class='pure-controls'>";
									echo "<input type='hidden' name='completed' value='True'>";
									echo "<button type='submit' class='pure-button pure-button-display'>Confirm Delete</button>";
								echo "</div>";	
								
?>

							</fieldset>
						</form>
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