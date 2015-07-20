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

		<title>CFAA Math | College Readiness</title>

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

	</head>
	<body>
		<div id="header-container">
			<div id="header">
				<h1 class="title" >CFAA Math - Coll. Readiness</h1>
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

					<h3 class="sections">info</h3>

					<div id="info_container">
						<div style="float:right; margin:0px 0px 15px 15px;">
							<script src="https://widgets.remind.com/iframe.js?token=ab2a228007e2013203f95ade8bfdbc46" type="text/javascript"></script>
						</div>
						
						<h3><a href="../phpbb/phpBB3/index.php" target="_blank">CFAA Math Forums</a></h3>
						
						<h3><a href="/college_readiness/docs/College%20Readiness%202014-2015%20Syllabus.pdf" target="_blank">College Readiness 2014-2015 Syllabus</a></h3>
						
						<h3><a href="/college_readiness/docs/collegereadiness_remind_info.pdf" target="_blank">College Readiness Remind Information</a></h3>
						
						<h3>Cengage Course Key: CM-9781285836959-0000023</h3>
						
						<p><b>Clicking on the calendar event (the red bars in the calendar) will give you the classwork for that day as well.</b></p>
						
						<h3><a href="../docs/Bell Schedule 11-17 - 11-21.pdf" target="_blank">Bell Schedule For 11-17 - 11-21</a></h3>

					</div>

				</div>
				
				<div class='clear'></div>

				<div id="calendar">

					<h3 class="sections">calendar</h3>

					<div id="cal_container">

					<iframe src="https://www.google.com/calendar/embed?&amp;showTabs=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=gv3rlnbflllmffmemvaofvp4m0%40group.calendar.google.com&amp;color=%23711616&amp;ctz=America%2FNew_York" style=" border-width:0 " width="850" height="600" frameborder="0" scrolling="no"></iframe>

					</div>

				</div>

				<div id="notesdiv">
							
					<h3 class="sections">exam reviews</h2>
					
					<h4><a href="../college_readiness/docs/reviews/Chapter 6 Exam Review.pdf" target="_blank">Chapter 6 Exam Review</a></h4>
					
					<h4><a href="../college_readiness/docs/reviews/Chapter 7 Exam Review.pdf" target="_blank">Chapter 7 Exam Review</a></h4>
					
				</div>

				<div id="videos">

					<h3 class="sections">videos</h3>

					<div id="video_chapters">
					
					<!--	<div id="youtube-channel" class="panel">
						
						<center><a href="http://www.youtube.com/channel/UCNRE653xLfQKWr-dTg7A9ZQ/videos?flow=grid&view=1" target="_blank"><img src="../images/youtube-logo.png" width="500px"></a></center>
						
						</div>
						
						<div class='clear'></div>--> 
					
				<!--		<div id="chapter3" class="panel">
							<h3>Unit 5</h3><h3>Writing Linear Equations</h3>

							<div class="video_link">
								<a href="../youtube_embed.php?path=zqCokP2vDGo&unit=5-1&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>5-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Graphs of Linear Equations</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=9hryH94KFJA&unit=5-2&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>5-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Equations of Parallel & Perpendicular Lines</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=rrQsqneZjh0&unit=5-3&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>5-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Fitting a Line to Data</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=aVDiAGZmcPo&unit=5-4&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>5-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Predicting With Linear Models</p>
									</div>
								</a>
							</div>
							
							
						</div>

						<div class='clear'></div>
					
					
						<div id="chapter3" class="panel">
							<h3>Unit 4</h3><h3>Graphs of Equations and Functions</h3>

							<div class="video_link">
								<a href="../youtube_embed.php?path=2UrcUfBizyw&unit=4-1&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Graphs of Linear Equations</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=6zixwWZ88tk&unit=4-2&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Graphing Using Intercepts</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=hXP1Gv9IMBo&unit=4-3&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Slope and Rate of Change</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../college_readiness/videos/enable/enable_4-4.txt')) echo "class='disabled'"; ?> href="../youtube_embed.php?path=9wOalujeZf4&unit=4-4&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Graphs Using Slope-Intercept Form</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=EmTvdKkAUtE&unit=4-5&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Linear Function Graphs</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../college_readiness/videos/enable/enable_4-r.txt')) echo "class='disabled'"; ?> href="../youtube_embed.php?path=&unit=4-r&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-r</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Unit 4 Review</p>
									</div>
								</a>
							</div>
							
							
						</div>

						<div class='clear'></div> -->
<?php
						$data = mysql_query("SELECT * FROM unit_titles WHERE class = 'coll' ORDER BY unit_num DESC");
						
						
						
						for ($j = 0; $j < mysql_num_rows($data) ; $j++)
						{
							echo "<div id='unit" . mysql_result($data, $j, "unit_num") . "' class='panel'>";
							echo "<h3>Unit " . mysql_result($data, $j, "unit_num") . "</h3><h3>" . mysql_result($data, $j, "unit_title") . "</h3>";
								
							$videos = mysql_query("SELECT * FROM videos WHERE class = 'coll' AND unit LIKE '" . mysql_result($data, $j, "unit_num") . "-%' ORDER BY UNIT ASC");
								
							for ($k = 0; $k < mysql_num_rows($videos); $k++)
							{
								echo "<div class='video_link'>";
									echo "<a ";
									
									if (mysql_result($videos, $k, "enable") == 'no')
										echo "class='disabled'";
									
									echo "href='../youtube_embed.php?path=" . mysql_result($videos, $k, "path") . "&unit=" . mysql_result($videos, $k, "unit") . "&subject=college_readiness' title='Watch Video' target='_blank' >";
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

						<div class='clear'></div>

						<div id="chapter2" class="panel">
							<h3>Unit 2</h3><h3>Fundamentals of Algebra</h3>

							<div class="video_link">
								<a href="../youtube_embed.php?path=gB9cQQ9156c&unit=2-1&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Writing & Evaluating Algebraic Expressions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=RGzelaA7sf0&unit=2-2&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Simplifying Algebraic Expressions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=R0ccRWPMXtY&unit=2-3&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Algebra & Problem Solving</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=AYjeWhypzlU&unit=2-4&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Introduction to Equations</p>
									</div>
								</a>
							</div>
							
							
							
						</div> 

						<div class='clear'></div>

						<div id="chapter1" class="panel">
							<h3>Unit 1</h3><h3>The Real Number System</h3>

							<div class="video_link">
								<a <?php if (!file_exists("../college_readiness/docs/enable/1-1.txt")) echo "class='disabled'"?> href="../youtube_embed.php?path=faSQOEbYqgQ?unit=1-1&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>The Real Number System</p>
									</div>
								</a>
							</div>

							<div class="video_link">
								<a <?php if (!file_exists("../college_readiness/docs/enable/1-2.txt")) echo "class='disabled'"?> href="../youtube_embed.php?path=U3iHPniXvDg?unit=1-2&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Addition & Subtraction of Integers</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists("../college_readiness/docs/enable/1-3.txt")) echo "class='disabled'"?> href="../youtube_embed.php?path=BRSse0xck3A?unit=1-3&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Multiplication & Division of Integers</p>
									</div>
								</a>
							</div>

						

							<div class="video_link">
								<a href="../youtube_embed.php?path=QIiGT70fDpg?unit=1-5&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Exponents & Properties of Real Numbers</p>
									</div>
								</a>
							</div>

						<!--	<div class="video_link">
								<a href="../video_player.php?unit=1-6&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Square Roots and Real Numbers</p>
									</div>
								</a>
							</div>

							<div class="video_link">
								<a href="../video_player.php?unit=1-7&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-7</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Problem-Solving Strategies</p>
									</div>
								</a>
							</div>

							<div class="video_link">
								<a href="../video_player.php?unit=Unit_1_Review&subject=college_readiness" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-R</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Unit 1 Review</p>
									</div>
								</a>
							</div>-->

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