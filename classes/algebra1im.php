<?php
	// Inialize session
	session_start();
	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];

	include('config.inc');
	
	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['firstname'])) {
		header('Location: ../classes.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css" />  
		<link rel="stylesheet" type="text/css" href="../css/fonts.css" />  
		<link href="http://fonts.googleapis.com/css?family=Terminal+Dosis&subset=latin" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="../images/favicon.ico" />
		 
		<title>CFAA Math | Algebra 1 IM</title>
		
	</head>
	<body>
		<div id="header-container">
			<div id="header">
				<h1 class="title" >CFAA Math - Algebra 1 IM</h1>
				<div id="nav">
					<ul>
						<li><a href="../">home</a></li>
						<li><a href="../classes.php">classes</a></li>	
						<li><a href="../schedule.php">schedule</a></li>
						<li><a href="../tutoring.php">tutoring</a></li>
						<li class="last" ><a href="../contact.php">contact</a></li>
<?php
						if (isset($_SESSION['name']))
							echo "<li class='loggedin' ><a href='../logout.php'>logout</a></li>";
?>						
					</ul>
				</div>
			</div>
		</div>
		
		<div id="main-container">
			<div id="main">
				<div id="info">
				
					<h3 class="sections">info</h3>
					
					<div id="info_container">
					
						<div style="float:right; margin:0px 0px 15px 15px;">
							<script src="https://www.remind101.com/widgets/messages.js?token=3a5c8270fa350130a97f0af711d74ade" type="text/javascript"></script>
						</div>
					
						<h3><a href="../algebra1/docs/Algebra%201%202014-2015%20Syllabus.pdf" target="_blank">Syllabus</a></h3>
						
						<h3><a href="../geometry/docs/ClassExpectationsProcedures2014-15Alg1Geomflipclass.pdf" target="_blank" >Class Expectations</a></h3>
						
						<h3><a href="../algebra1cr/remind_101_algebra_1_cr.pdf" target="_blank">Sign Up For Remind 101</a></h3>
						
						<h3><a href="../docs/Bell Schedule 11-17 - 11-21.pdf" target="_blank">Bell Schedule For 11-17 - 11-21</a></h3>
						
					</div>
					
				</div>
				
				<div class='clear'></div>
				
				<div id="calendar">
					
					<h3 class="sections">calendar</h3>
					
					<div id="cal_container">
					
					<iframe src="https://www.google.com/calendar/embed?&amp;showTabs=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=i9igsmj6lvrhsqr92rsv8nmu9s%40group.calendar.google.com&amp;color=%23711616&amp;ctz=America%2FNew_York" style=" border-width:0 " width="850" height="600" frameborder="0" scrolling="no"></iframe>
					
					</div>
					
				</div>
				
<!--				<div id="notesdiv">
					
					<h3 class="sections">notes</h2>
					
				</div> -->
				
				<div id="videos">
				
					<h3 class="sections">videos</h3>
					<div id="video_chapters">
<?php
						$data = mysql_query("SELECT * FROM unit_titles WHERE class = 'algebra1im' ORDER BY unit_num DESC");
						
						
						
						for ($j = 0; $j < mysql_num_rows($data) ; $j++)
						{
							echo "<div id='unit" . mysql_result($data, $j, "unit_num") . "' class='panel'>";
							echo "<h3>Unit " . mysql_result($data, $j, "unit_num") . "</h3><h3>" . mysql_result($data, $j, "unit_title") . "</h3>";
								
							$videos = mysql_query("SELECT * FROM videos WHERE class = 'algebra1im' AND unit LIKE '" . mysql_result($data, $j, "unit_num") . "-%' ORDER BY UNIT ASC");
								
							for ($k = 0; $k < mysql_num_rows($videos); $k++)
							{
								echo "<div class='video_link'>";
									echo "<a ";
									
									if (mysql_result($videos, $k, "enable") == 'no')
										echo "class='disabled'";
									
									echo "href='../youtube_embed.php?path=" . mysql_result($videos, $k, "path") . "&unit=" . mysql_result($videos, $k, "unit") . "&subject=algebra1im' title='Watch Video' target='_blank' >";
									echo "<div class='unit_number'>";
											echo "<h4>" . mysql_result($videos, $k, 'unit') . "</h4>";
											echo "<img class='play_button' src='../images/play_black.png' />";
										echo "</div>";
										echo "<div class='unit_desc'>";
											echo " <p>" . mysql_result($videos, $k, "title") . "</p>";
										echo "</div>";
									echo "</a>";
								echo "</div>";
							}
							
							echo "<div class='clear'></div>";
						}

?>
					
				</div>
				
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