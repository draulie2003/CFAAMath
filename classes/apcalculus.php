<?php
	// Inialize session
	session_start();
	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['firstname'])) {
		header('Location: ../classes.php');
	}

	include "../config.inc";

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
		<link rel="shortcut icon" href="../images/favicon.ico" />
		 
		<title>CFAA Math | AP Calculus</title>
		
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
						<li class="last" ><a href="../contact.php">contact</a></li>
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
				
					<h3 class="sections">info</h3>
					
					<div id="info_container">
					
						<div style="float:right; margin:0px 0px 15px 15px;">
							<script src="https://www.remind101.com/widgets/messages.js?token=b662c700f4b2013006b95e5f62373d02" type="text/javascript"></script>
						</div>
						
						<h3><a href="../apcalculus/docs/AP Calculus Syllabus - 2013-2014.pdf" target="_blank">Syllabus</a></h3>
						
						<h3><a href="/apcalcbook/disc1/calc7e/calc7emain.html" target="_blank">Online Calculus Book Chapters 1 - 9</a></h3>
						
						<h3><a href="/apcalcbook/disc2/calc7e/calc7emain.html" target="_blank">Online Calculus Book Chapters 10 - 14</a></h3>
						
						<h3><a href="../apcalculus/docs/remind_101_ap_calculus.pdf" target="_blank">Sign Up For Remind 101</a></h3>
						
						<h3><a href="../apcalculus/docs/Basic%20Differentiation%20Rules.pdf" target="_blank">Basic Differentiation Rules</a></h3>
						
						<p><b>Clicking on the calendar event (the red bars in the calendar) will give you the classwork for that day as well.</b></p>
						
					</div>
					
				</div>
				
				<div class='clear'></div>
				
				<div id="calendar">
					
					<h3 class="sections">calendar</h3>
					
					<div id="cal_container">
					
					<iframe src="https://www.google.com/calendar/embed?&amp;showTabs=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=ihpi7fmsm47l6qj2c3k9kvq9qg%40group.calendar.google.com&amp;color=%23711616&amp;ctz=America%2FNew_York" style=" border-width:0 " width="850" height="600" frameborder="0" scrolling="no"></iframe>
					
					</div>
					
				</div>
				
<!--				<div id="notesdiv">
					
					<h3 class="sections">notes</h2>
					
				</div> -->
				
				<div id="videos">
				
					<h3 class="sections">videos</h3>
					
					<div id="video_chapters">
					
						<div id="youtube-channel" class="panel">
						
						<center><a href="http://www.youtube.com/channel/UCNRE653xLfQKWr-dTg7A9ZQ/videos?flow=grid&view=1" target="_blank"><img src="../images/youtube-logo.png" width="500px"></a></center>
						
						</div>
						
						<div class='clear'></div>
<?php
						$data = mysql_query("SELECT * FROM unit_titles WHERE class = 'apcalculus' ORDER BY unit_num DESC");
						
						for ($j = 0; $j < mysql_num_rows($data) ; $j++)
						{
							echo "<div id='unit" . mysql_result($data, $j, "unit_num") . "' class='panel'>";
							echo "<h3>Unit " . mysql_result($data, $j, "unit_num") . "</h3><h3>" . mysql_result($data, $j, "unit_title") . "</h3>";
								
							$videos = mysql_query("SELECT * FROM videos WHERE class = 'apcalculus' AND unit LIKE '" . mysql_result($data, $j, "unit_num") . "-%' ORDER BY UNIT ASC");
								
							for ($k = 0; $k < mysql_num_rows($videos); $k++)
							{
								echo "<div class='video_link'>";
									echo "<a href='../youtube_embed.php?path=" . mysql_result($videos, $k, "path") . "&unit=" . mysql_result($videos, $k, "unit") . "&subject=apcalculus' title='Watch Video' target='_blank' >";
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

						
						<div id="unit5" class="panel">
							<h3>Unit 6</h3><h3>Geometric Applications of Integrals<br />Areas & Volumes</h3>
				
							<div class="video_link">
								<a href="../youtube_embed.php?path=xJdJarRoKJ4&unit=6-1&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>6-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Volumes of Revolution</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=jWgsoGgP8Ag&unit=6-2&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>6-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Y-Axis Solids</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=DvJm6DHRYVI&unit=6-3&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>6-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Washer Method</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=S70PPjH-DnA&unit=6-4&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>6-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Washer Method - Revolutions Around Non-Axis Lines</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=21qftZWc7RQ&unit=6-5&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>6-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Solids With a Known Base</p>
									</div>
								</a>
							</div>
							
							
						</div>
						
						<div class='clear'></div>
							
						<div id="unit5" class="panel">
							<h3>Unit 5</h3><h3>Introduction to Antiderivatives</h3>
				
							<div class="video_link">
								<a href="../youtube_embed.php?path=rfbsIvBCUk4&unit=5-r&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>5-R</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Integrals End Test Review</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=wG6cEqIfj70&unit=5-4&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>5-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Integral Properties & Theorems</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=7dskZCUCAlM&unit=5-r1&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>5-R</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Integral Theorems Test Review</p>
									</div>
								</a>
							</div>
							
							
						</div>
						
						<div class='clear'></div>
							
						<div id="unit4" class="panel">
							<h3>Unit 4 Part 2</h3><h3>More Derivatives</h3>
				
							<div class="video_link">
								<a href="../youtube_embed.php?path=0YH8BrlVTqk&unit=4-9&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-9</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Derivatives of Logarithmic Functions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=OjnOgoEu6CM&unit=4-10&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-10</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Derivatives of Exponential Functions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=pU0XJndeM4A&unit=4-11&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-11</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Derivatives of Inverse Functions</p>
									</div>
								</a>
							</div>
							
							
						</div>
						
						<div class='clear'></div>
							
						<div id="unit4" class="panel">
							<h3>Unit 4</h3><h3>Advanced Uses of the Derivative</h3>
				
							<div class="video_link">
								<a href="../youtube_embed.php?path=0c598x9tSEY&unit=4-1&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Graphing Without a Calculator</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=NhKOLbTqhdk&unit=4-2&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>L'Hopital's Rule</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=7eizrg3GEUE&unit=4-3&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Other Graph Features</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=9GGPiBp_Gu0&unit=4-4&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Optimizations</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=l02BBAHYOiw&unit=4-5&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Distance Walking Optimizations</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=vnBV1_LKfnU&unit=4-6&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Building a Box - Cost Problem</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=ZLFIABH2cZs&unit=4-7&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-7</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Related Rates</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=KGdP6nfuheM&unit=4-8&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-8</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>More on Related Rates</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=mwJ_NE4o80g&unit=4-r&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-R</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Optimizations/Related Rates Quiz Review</p>
									</div>
								</a>
							</div>
							
							
						</div>
						
						<div class='clear'></div>
							
						<div id="unit3" class="panel">
							<h3>Unit 3</h3><h3>Uses of the Derivative</h3>
				
							<div class="video_link">
								<a <?php if (!file_exists('../apcalculus/videos/enable/enable_3-1.txt')) echo "class='disabled'"; ?> href="../youtube_embed.php?path=1i1exf7TSxE&unit=3-1&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Extrema</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../apcalculus/videos/enable/enable_3-2.txt')) echo "class='disabled'"; ?> href="../youtube_embed.php?path=RB_DZlNkGL0&unit=3-2&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Types of Extrema</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=GLTdILZbzfk&unit=3-3&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Increasing & Decreasing Intervals</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=QlYDw1D8lAU&unit=3-4&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>First Derivative Test</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=JQvl6xMhpd4&unit=3-5&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Second Derivative Concavity</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=Y2wR1KOif90&unit=3-6&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Points of Inflection - Second Derivative</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=f4j9kNi00KY&unit=3-7&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-7</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Important Theorems</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=vvAVtIAvd0w&unit=3-r&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-R</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Unit 3 Review</p>
									</div>
								</a>
							</div>
							
							
						</div>
						
						<div class='clear'></div>
							
							<div id="unit2" class="panel">
							<h3>Unit 2</h3><h3>Derivatives</h3>
				
							<div class="video_link">
								<a href="../youtube_embed.php?path=V-5gsnhj84w&unit=2-1&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Intro to Derivatives</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=uJJLLcE8HEQ&unit=2-2&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Differentiability</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=GF1-cJUmLPI&unit=2-3&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Basic Derivative Rules</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=kQuKu_QXqko&unit=2-4&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Derivatives of Two Basic Trig Functions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=BrrzdwE5e4E&unit=2-4&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Product Rule</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../video_player.php?unit=2-5&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Higher Order Derivatives & Physics</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../video_player.php?unit=2-6&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Quotient Rule and Tangent Derivative</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../apcalculus/videos/2-7/2-7.mp4')) echo "class='disabled'"; ?> href="../video_player.php?unit=2-7&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-7</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Chain Rule</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../apcalculus/videos/Implicit_Derivatives/Implicit_Derivatives.mp4')) echo "class='disabled'"; ?> href="../video_player.php?unit=Implicit_Derivatives&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-8</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Implicit Derviatives</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../apcalculus/videos/Second_Derivative_Implicit_Derivatives/Second_Derivative_Implicit_Derivatives.mp4')) echo "class='disabled'"; ?> href="../video_player.php?unit=Second_Derivative_Implicit_Derivatives&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-9</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Second Derivative Implicit Derivatives</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../apcalculus/videos/enable/enable_2-r.txt')) echo "class='disabled'"; ?> href="../youtube_embed.php?path=egOg3zrp2MA&unit=2-r&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-R</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Derivatives End-Test Review</p>
									</div>
								</a>
							</div>
							
							
						</div>
						
						<div class='clear'></div>
					
						<div id="unit1" class="panel">
							<h3>Unit 1</h3><h3>Limits</h3>
				
							<div class="video_link">
								<a href="../youtube_embed.php?path=ckOqUYvqQak&unit=Limits&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Limits</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=x-rdDx70zXw&unit=1-2&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Limits by Algebra</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=7sXXyfInZGo&unit=1-3a&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-3a</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Radical Limits</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=23hls1peeko&unit=1-3b&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-3b</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Trig Limits & Basic Limit Math</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=-2na3zRO2vA&unit=1-4a&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-4a</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Continuity</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=b0yt187nx3I&unit=1-4b&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-4b</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>One-Sided Limits</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=HEOpWrDPQNg&unit=1-5&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Infinite Limits</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=3PWf91ysAA8&unit=1-6&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Limits At Infinity</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=jQAtv6bamfM&unit=1-7&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-7</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Horizontal Asymptotes</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=0gKuNrozzCo&unit=1-r&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-R</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Unit 1 Review</p>
									</div>
								</a>
							</div>
							
							
						</div>
						
						<div class='clear'></div>
					
						<div id="precalreview" class="panel">
							<h3>Precalculus Review</h3>
				
							<div class="video_link">
								<a href="../video_player.php?unit=Trig_Review&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>P-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Trig Review</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../video_player.php?unit=Trig_Review_Cont&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>P-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Trig Review Cont</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../video_player.php?unit=Reciprocal_Functions&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>P-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Reciprocal Functions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../video_player.php?unit=Trig_Functions&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>P-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Trig Functions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../video_player.php?unit=Golden_Rule&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>P-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Golden Rule</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../video_player.php?unit=Trig_Review_Test_Review&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>P-R</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Trig Review Test Review</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../video_player.php?unit=Exponentials_and_Logs&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>P-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Exponentials and Logs</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../video_player.php?unit=Properties_of_Logs&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>P-7</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Properties of Logs</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=QS53ABxXg1M&unit=Log_Equations&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>P-8</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Log Equations</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=MYrzaKZ1wwg&unit=Log_Quiz_Review&subject=apcalculus" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>P-Rl</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Log Quiz Review</p>
									</div>
								</a>
							</div>
							
						</div>
					</div>
					
				</div>
				
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