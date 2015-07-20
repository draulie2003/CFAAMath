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
		 
		<title>CFAA Math | Add/Edit Video</title>
		
		<style>
			.pure-button-display {
            background: #D10C02;
        }
		
		.pure-table-odd td{
			background-color:rgba(255,255,255,0.75);
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
				
					<h3 class="sections">add or edit video</h3>
					
					<div id="info_container">
						<center>
							<form method='post' action='../add_edit_video.php' name='add_edit_video' class="pure-form">
								<fieldset>
								
									<select name="class">
										<option value="select">Select a Class</option>
										<option value="algebra1">Algebra 1</option>
										<option value="algebra1im">Algebra 1 IM</option>
										<option value="geometry">Geometry</option>
										<option value="algebra2">Algebra 2</option>
										<option value="precal">Precalculus</option>
										<option value="apcalculus">AP Calculus</option>
										<option value="coll">College Readiness</option>
									</select>

									<input type="hidden" name="message" value="True">
									<br /><br />
									<button type="submit" class="pure-button pure-button-display">Display</button>
					
								</fieldset>
							</form>
						</center>
					</div>
					
				</div>
				
			
			<div class='clear'></div>

			
<?php
	$Message = $_POST['message'];
	$Class = $_POST['class'];
	
	if ($Message)
	{	
		$data = mysql_query("SELECT * FROM videos WHERE class = '" . $Class . "' ORDER BY unit DESC");
	
		echo "<div id='calendar'>";
					
				echo "<div id='info_container'>";
				
				echo "<h3 class='sections'>" . ucwords($Class) . "</h3>";
				echo "<span class='vidunit'><a href='../add_edit_unit.php?new_unit=yes&class=" . $Class . "'>Add /Edit Unit</a></span>";
				echo "<span class='vidunit'><a href='../add_edit_video_info.php?new_video=yes&class=" . ucwords($Class) . "'>Add New Video</a></span>";
				
				if (mysql_num_rows($data) == 0)	
					echo "<h3 class='sections'>No videos posted yet!</h3>";
				
				else
				{				
					echo "<table class='pure-table'>";
					echo "<thead><tr><th>#</th><th>Unit</th><th>Title</th><th>Path</th><th>Enable</th><th>Edit</th><th>Delete</th></tr></thead><tbody>";
					
					for ($i = 0; $i < mysql_num_rows($data); $i++)
					{
						if (($i + 1) % 2 == 0)
							$odd =  " class='pure-table-odd'";
						
						else
							$odd = "";
						
						echo "<tr" . $odd . "><td>" . ($i + 1) . "</td><td>" .mysql_result($data, $i, "unit")."</td><td>".mysql_result($data, $i, "title"). "</td><td>" . mysql_result($data, $i, "path") . "</td><td>" . mysql_result($data, $i, "enable") . "</td><td><a href='../add_edit_video_info.php?new_video=no&class=" . $Class . "&unit=" . mysql_result($data, $i, "unit") . "'>edit</a></td><td><a href='../delete_video.php?class=" . $Class . "&unit=" . mysql_result($data, $i, "unit") . "'>delete</a></td></tr>";
					}
					echo "</tbody></table>";
				}
					echo "<div class='clear'></div>";
				echo "</div>";
			echo "</div>";
	}
?>

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
