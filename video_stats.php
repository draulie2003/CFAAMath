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
				
					<h3 class="sections">video stats</h3>
					
					<div id="info_container">
						<center>
							<form method='post' action='../video_stats.php' name='video_stats' class="pure-form">
								<fieldset>
									
									<select name="subject">
										<option value="select">Select Subject</option>
										<option value="algebra1">algebra 1</option>
										<option value="algebra1cr">algebra 1 cr</option>
										<option value="geometry">geometry</option>
										<option value="algebra2">algebra 2</option>
										<option value="precal">precalculus</option>
										<option value="apcalculus">ap calculus</option>
										<option value="college_readiness">college readiness</option>
									</select>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<select name="period">
										<option value="select">Select Period</option>
										<option value="1">1st Period</option>
										<option value="2">2nd Period</option>
										<option value="3">3rd Period</option>
										<option value="4">4th Period</option>
										<option value="5">5th Period</option>
										<option value="6">6th Period</option>
										<option value="7">7th Period</option>
									</select>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="text" name="unit" placeholder="Unit Number">
									<input type="hidden" name="message" value="True">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<button type="submit" class="pure-button pure-button-display">Display</button>
								</fieldset>
							</form>
						</center>
					</div>
					
				</div>
				
			
			<div class='clear'></div>
<?php
	$Message = $_POST['message'];
	$Subject = $_POST['subject'];
	$Period = $_POST['period'];
	$Unit = $_POST['unit'];
	
	if ($Message)
	{	
		if ($Period == 'select')
		{
			$data = mysql_query("SELECT name, times_watched, first_date_watched, last_date_watched  FROM videos_watched WHERE (subject = '" . $Subject . "') and (video = '" . $Unit . "') ORDER BY name ASC");
		}
		
		else if ($Period != 'select')
		{
			$data = mysql_query("SELECT name, times_watched, first_date_watched, last_date_watched  FROM videos_watched WHERE (period LIKE '%" . $Period . "%') and (subject = '" . $Subject . "') and (video = '" . $Unit . "') ORDER BY name ASC");
		}
		
		if (mysql_num_rows($data) == 0) 
		{
			echo "<div id='calendar'>";
				
				echo "<h3 class='sections'>No one has watched the " . ucwords($Subject) . " - Unit ". $Unit . " video yet!</h3>";
					
				echo "<div id='info_container'>";
				
				echo "</div>";
			echo "</div>";
		}
		
		else if (mysql_num_rows($data) > 0)
		{
			echo "<div id='calendar'>";
					
				echo "<div id='info_container'>";
					echo "<h3 class='sections'>" . ucwords($Subject) . " - Unit ". $Unit . "</h3>";
					echo "<table class='pure-table'>";
					echo "<thead><tr><th>#</th><th>Name</th><th>Times Watched</th><th>First Watched</th><th>Last Watched</th></tr></thead><tbody>";
					
					for ($i = 0; $i < mysql_num_rows($data); $i++)
					{
						if (($i + 1) % 2 == 0)
							$odd =  " class='pure-table-odd'";
						
						else
							$odd = "";
						
						echo "<tr" . $odd . "><td>" . ($i + 1) . "</td><td>" . mysql_result($data, $i, "name") . "</td><td>" . mysql_result($data, $i, "times_watched") . "</td><td>" . mysql_result($data, $i, "first_date_watched") . "</td><td>" . mysql_result($data, $i, "last_date_watched") . "</td></tr>";
					}
					
					echo "</tbody></table>";
				
				echo "</div>";
			echo "</div>";
		}
	}
?>
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

