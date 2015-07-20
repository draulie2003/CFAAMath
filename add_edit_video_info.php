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
		
		.help {
			background-color: #FFFF73;
			border-radius: 10px;
			display: none;
			position: relative;
			top: 25px;
			left: 75px;
			opacity: 0.9;
			padding: 15px;
			z-index: 100;
		}

		.help_link:hover + span {
			display: block;
			width: 450px;
			height: 50px;
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
				
					<h3 class="sections">add / edit video</h3>
					
					<div id="info_container">
						<form method='post' action='../add_edit_video_confirmed.php' name='add_edit_student' class="pure-form pure-form-aligned">
							<fieldset>
								
<?php
								$Class = $_GET['class'];
								$Unit = $_GET['unit'];
								$New_Video = $_GET['new_video'];
								
								if ($New_Video == 'yes')
								{
									echo "<div class='pure-control-group'>";
										echo "<label for='class'>Class:</label>";
										echo "<input name='class' type='text' value='" . $Class . "'>";
									echo "</div>";
								
									echo "<div class='pure-control-group'>";
										echo "<label for='unit'>Unit</label>";
										echo "<input name='unit' type='text' placeholder='Unit'> New <input name='new' type='checkbox' value='Yes' checked>";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='title'>Title</label>";
										echo "<input name='title' type='text' placeholder='Title'>";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='path'>Path</label>";
										echo "<input name='path' type='text' placeholder='Path'><a href='#' class='help_link'>Help</a> <span class='help'>i.e. https://www.youtube.com/watch?v=<b>eFZOnAcuVLM</b><br />Only enter the <b>eleven characters</b> that follow the v=</span><br />";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='enable'>Enable</label>";
										echo "<input name='enable' type='text' placeholder='Enable'>";
									echo "</div>";

								}
								
								else if ($New_Video == 'no')
								{
									$data = mysql_query("SELECT * FROM videos WHERE (class='" . $Class ."' and unit='" . $Unit . "')");
									
									echo "<div class='pure-control-group'>";
										echo "<label for='class'>Class:</label>";
										echo "<input name='class' type='text' value='" . mysql_result($data, 0, "class") . "'>";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='unit'>Unit:</label>";
										echo "<input name='unit' type='text' value='" . mysql_result($data, 0, "unit") ."'>";
									echo "</div>";
									
									echo "-------------------Do NOT edit anything above this line.---------------------<br /><br />";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='title'>Title:</label>";
										echo "<input name='title' type='text' value='" . mysql_result($data, 0, "title") ."'>";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='path'>Path:</label>";
										echo "<input name='path' type='text' value='" . mysql_result($data, 0, "path") ."'><a href='#' class='help_link'>Help</a> <span class='help'>i.e. https://www.youtube.com/watch?v=<b>eFZOnAcuVLM</b><br />Only enter the <b>eleven characters</b> that follow the v=</span><br />";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='enable'>Enable:</label>";
										echo "<input name='enable' type='text' value='" . mysql_result($data, 0, "enable") ."'>";
									echo "</div>";
								}	
									echo "<div class='pure-controls'>";
										echo "<input type='hidden' name='completed' value='True'>";
										echo "<button type='submit' class='pure-button pure-button-display'>Add / Update Video</button>";
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