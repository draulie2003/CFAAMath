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
		 
		<title>CFAA Math | Algebra 1</title>
		
	</head>
	<body>
		<div id="header-container">
			<div id="header">
				<h1 class="title" >CFAA Math - Algebra 1</h1>
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
							<script src="https://www.remind101.com/widgets/messages.js?token=544ead20fa350130baab3a9102cfcac8" type="text/javascript"></script>
						</div>
					
						<h3><a href="../algebra1/docs/Algebra%201%202014-2015%20Syllabus.pdf" target="_blank">Syllabus</a></h3>
						
						<h3><a href="../algebra1/docs/alg1_remind_info.pdf" target="_blank">Sign Up For Remind 101</a></h3>
						
						<h3><a href="../geometry/docs/ClassExpectationsProcedures2014-15Alg1Geomflipclass.pdf" target="_blank" >Class Expectations</a></h3>
						
						<h3><a href="../algebra1/Algebra1%20EOC%20Item%20Bank.pdf" target="_blank">EOC Practice</a></h3>
						
						<h3><a href="../algebra1/Alg1_EOC_examples%20with%20answers.pdf" target="_blank">EOC Practice Answers</a></h3>
						
					</div>
					
				</div>
				
				<div class='clear'></div>
				
				<div id="calendar">
					
					<h3 class="sections">calendar</h3>
					
					<div id="cal_container">
					
					<iframe src="https://www.google.com/calendar/embed?&amp;showTabs=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=ps81k9djcvhg26vrfiihbdgtbg%40group.calendar.google.com&amp;color=%23711616&amp;ctz=America%2FNew_York" style=" border-width:0 " width="850" height="600" frameborder="0" scrolling="no"></iframe>
					
					</div>
					
				</div>
				
<!--				<div id="notesdiv">
					
					<h3 class="sections">notes</h2>
					
				</div> -->
				
				<div id="videos">
				
					<h3 class="sections">videos</h3>
					
					<div id="video_chapters">
					
				<!--		<div id="unit_101" class="panel">
							<h3>Unit 2<br />Solving Equations</h3>
				
							<div class="video_link">
								<a <?php if (!file_exists('../algebra1/videos/2-1_alg1/2-1_alg1.mp4')) echo "class='disabled'"; ?> href="../video_player.php?unit=2-1_alg1&subject=algebra1" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-1a</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>One-Step Equations - Add & Subtract</p>
									</div>
								</a>
							</div>
				
							<div class="video_link">
								<a <?php if (!file_exists('../algebra1/videos/2-1b_alg1/2-1b_alg1.mp4')) echo "class='disabled'"; ?> href="../video_player.php?unit=2-1b_alg1&subject=algebra1" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-1b</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>One-Step Equations - Multiply & Divide</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../algebra1/videos/2-2_alg1/2-2_alg1.mp4')) echo "class='disabled'"; ?> href="../video_player.php?unit=2-2_alg1&subject=algebra1" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Two-Step Equations</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../algebra1/videos/2-3_alg1/2-3_alg1.mp4')) echo "class='disabled'"; ?> href="../video_player.php?unit=2-3_alg1&subject=algebra1" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Multi-Step Equations</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../algebra1/videos/2-4_alg1/2-4_alg1.mp4')) echo "class='disabled'"; ?> href="../video_player.php?unit=2-4_alg1&subject=algebra1" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Equations with Variables on Both Sides</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../algebra1/videos/2-5_alg1/2-5_alg1.mp4')) echo "class='disabled'"; ?> href="../video_player.php?unit=2-5_alg1&subject=algebra1" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Literal Equations and Formulas</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../algebra1/videos/2-6_alg1/2-6_alg1.mp4')) echo "class='disabled'"; ?> href="../video_player.php?unit=2-6_alg1&subject=algebra1" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Rates, Ratios, and Conversions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../algebra1/videos/2-7_alg1/2-7_alg1.mp4')) echo "class='disabled'"; ?> href="../video_player.php?unit=2-7_alg1&subject=algebra1" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-7</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Proportions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../algebra1/videos/2-8_alg1/2-8_alg1.mp4')) echo "class='disabled'"; ?> href="../video_player.php?unit=2-8_alg1&subject=algebra1" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-8</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Proportions and Similar Figures</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../algebra1/videos/2-9_alg1/2-9_alg1.mp4')) echo "class='disabled'"; ?> href="../video_player.php?unit=2-9_alg1&subject=algebra1" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-9</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Percents</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../algebra1/videos/2-10_alg1/2-10_alg1.mp4')) echo "class='disabled'"; ?> href="../video_player.php?unit=2-10_alg1&subject=algebra1" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-10</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Percent of Change</p>
									</div>
								</a>
							</div>
							
							
						</div>
						
						<div class='clear'></div>
						
						<div id="unit_101" class="panel">
							<h3>Unit 101</h3>
				
							<div class="video_link">
								<a href="../video_player.php?unit=101-f&subject=algebra1" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>101-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Fractions - Add & Subtract</p>
									</div>
								</a>
							</div>
				
							<div class="video_link">
								<a href="../video_player.php?unit=101-2&subject=algebra1" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>101-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Fractions - Multiply & Divide</p>
									</div>
								</a>
							</div>
							
							
							
						</div>
						
						<div class='clear'></div>
					
						<div id="intro_vid" class="panel">
							<h3>Intro</h3>
				
							<div class="video_link">
								<a href="../video_player.php?unit=sylla&subject=algebra1" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>0-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Syllabus & Intro</p>
									</div>
								</a>
							</div>
						</div>
						
						<div class='clear'></div> -->
						
<?php
						$data = mysql_query("SELECT * FROM unit_titles WHERE class = 'algebra1' ORDER BY unit_num DESC");
						
						
						
						for ($j = 0; $j < mysql_num_rows($data) ; $j++)
						{
							echo "<div id='unit" . mysql_result($data, $j, "unit_num") . "' class='panel'>";
							echo "<h3>Unit " . mysql_result($data, $j, "unit_num") . "</h3><h3>" . mysql_result($data, $j, "unit_title") . "</h3>";
								
							$videos = mysql_query("SELECT * FROM videos WHERE class = 'algebra1' AND unit LIKE '" . mysql_result($data, $j, "unit_num") . "-%' ORDER BY UNIT ASC");
								
							for ($k = 0; $k < mysql_num_rows($videos); $k++)
							{
								echo "<div class='video_link'>";
									echo "<a ";
									
									if (mysql_result($videos, $k, "enable") == 'no')
										echo "class='disabled'";
									
									echo "href='../youtube_embed.php?path=" . mysql_result($videos, $k, "path") . "&unit=" . mysql_result($videos, $k, "unit") . "&subject=algebra1' title='Watch Video' target='_blank' >";
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
					
						<div id="chapter1" class="panel">
							<h3>Unit 1</h3>
				
							<div class="video_link">
								<a href="../youtube_embed.php?path=aP497uEnSjk&unit=1-1&subject=algebra1&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Variables and Expressions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=_ewoBK25d2g&unit=1-2&subject=algebra1&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Order of Operations</p>
									</div>
								</a>
							</div> 
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=MkTdOX2vj-c&unit=1-3&subject=algebra1&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Real Numbers</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=F2nWZcw5kmU&unit=1-4&subject=algebra1&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Properties of Real Numbers</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=SSQQQCUlWT8&unit=1-5&subject=algebra1&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-5<br />1-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Add, Subtract, Multiply & Divide Real Numbers</p>
									</div>
								</a>
							</div>
							
					<!--		<div class="video_link">
								<a href="../video_player.php?unit=1-6_alg1&subject=algebra1" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Multiply and Divide Real Numbers</p>
									</div>
								</a>
							</div> -->
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=kM2hXg3HTEM&unit=1-7&subject=algebra1&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-7</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Distributive Property</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a class="disabled" href="../youtube_embed.php?path=&unit=1-8&subject=algebra1&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-8</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Intro to Equations</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a class="disabled" href="../youtube_embed.php?path=&unit=1-9&subject=algebra1&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-9</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Patterns, Equations, and Graphs</p>
									</div>
								</a>
							</div>
							
						<div class='clear'></div>
						
						</div>
							
							
					</div>
					
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