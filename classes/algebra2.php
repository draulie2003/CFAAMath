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
		 
		<title>CFAA Math | Algebra 2</title>
		
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
				<h1 class="title" >CFAA Math - Algebra 2</h1>
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
							<script src="https://widgets.remind.com/iframe.js?token=fccbb890ffa401315e967e8b22e7e3f5" type="text/javascript"></script>
						</div>
					
						<h3><a href="../phpbb/phpBB3/index.php" target="_blank">CFAA Math Forums</a></h3>
						
						<h3><a href="/algebra2/docs/Algebra%202%202014-2015%20Syllabus.pdf" target="_blank">Algebra 2 2014-2015 Syllabus</a><br /></h3>
						
						<h3><a href="../docs/Classroom%20Policies.pdf" target="_blank">Classroom Policies</a></h3>
						
						<h3><a href="../docs/Test%20Quiz%20Policy.pdf" target="_blank">Test/Quiz Policy</a></h3>
												
						<h3><a href="/algebra2/docs/alg2_remind_info.pdf" target="_blank">Algebra 2 Remind Information</a><br /></h3>
						
						<h3><a href="/algebra2/docs/Wabbitemu.exe">Wabbit TI 84 Emulator</a></h3>
						
						<h3><a href="/algebra2/docs/wabbit%20instructions.docx">Wabbit TI 84 Emulator Instructions</a></h3>
						
					</div>
					
				</div>
				
				<div class='clear'></div>
				
				<div id="calendar">
					
					<h3 class="sections">calendar</h3>
					
					<div id="cal_container">
					
					<iframe src="https://www.google.com/calendar/embed?src=ti3ldjq92mchvgkmi11k2rah3c%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
					
					</div>
					
				</div>
				
				<div id="notesdiv">
					
					<h3 class="sections">exam reviews</h2>
					
					<h4><a href="../algebra2/docs/reviews/ExamView - Chapter 4 Assessment Review.pdf" target="_blank">Chapter 4 Exam Review</a></h4>
					
					<h4><a href="../algebra2/docs/reviews/Chapter 5 Assessment Review.pdf" target="_blank">Chapter 5 Exam Review</a></h4>
					
					<h4><a href="../algebra2/docs/reviews/2014-2015 - 1st Semester Exam Review.pdf" target="_blank">Midterm Review - 2014-2015</a></h4>
					
					<h4><a href="../algebra2/docs/reviews/Chapter 8 Assessment Review.pdf" target="_blank">Chapter 8 Exam Review</a></h4>
					
					<h4><a href="../algebra2/docs/reviews/Chapter 6 Assessment Review.pdf" target="_blank">Chapter 6 Exam Review</a></h4>
				</div>
				
				<div id="videos">
				
					<h3 class="sections">videos</h3>
<?php
						$data = mysql_query("SELECT * FROM unit_titles WHERE class = 'algebra2' ORDER BY unit_num DESC");
						
						
						
						for ($j = 0; $j < mysql_num_rows($data) ; $j++)
						{
							echo "<div id='unit" . mysql_result($data, $j, "unit_num") . "' class='panel'>";
							echo "<h3>Unit " . mysql_result($data, $j, "unit_num") . "</h3><h3>" . mysql_result($data, $j, "unit_title") . "</h3>";
								
							$videos = mysql_query("SELECT * FROM videos WHERE class = 'algebra2' AND unit LIKE '" . mysql_result($data, $j, "unit_num") . "-%' ORDER BY UNIT ASC");
								
							for ($k = 0; $k < mysql_num_rows($videos); $k++)
							{
								echo "<div class='video_link'>";
									echo "<a ";
									
									if (mysql_result($videos, $k, "enable") == 'no')
										echo "class='disabled'";
									
									echo "href='../youtube_embed.php?path=" . mysql_result($videos, $k, "path") . "&unit=" . mysql_result($videos, $k, "unit") . "&subject=algebra2' title='Watch Video' target='_blank' >";
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
						<div id="unit2" class="panel">
							<h3>Unit 2</h3><h3>Functions, Equations, and Graphs</h3>
				
							<div class="video_link">
								<a href="../youtube_embed.php?path=PryDXEtPGDE&unit=2-1&subject=algebra2&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Relations & Functions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=Ps_YRWPdkfk&unit=2-2&subject=algebra2&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Direct Variation</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=kvbT3Er7Zgk&unit=2-3&subject=algebra2&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Linear Functions & Slope Intercept Form</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=Q8A2Sm9FXiE&unit=2-4&subject=algebra2&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>More About Linear Equations</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=g3ouvPBCcwk&unit=2-5&subject=algebra2&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Using Linear Models</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=FAbqCzGHIhs&unit=2-6&subject=algebra2&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Families of Functions Part 1 - Vertical & Horizontal Shifts</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=4CXDLqAe3FM&unit=2-6b&subject=algebra2&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-6B</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Families of Functions Part 2 - Reflections & Stretches</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=KXdT7-RuTUk&unit=2-7&subject=algebra2&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-7</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Absolute Value Functions & Graphs</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=sNzqiiXR4yk&unit=2-8&subject=algebra2&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-8</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Two-Variable Inequalities</p>
									</div>
								</a>
							</div>
							
							
						</div>
						
						<div class="clear"></div>
							
						<div id="unit1" class="panel">
							<h3>Unit 1</h3><h3>Expressions, Equations, and Inequalities</h3>
				
							<div class="video_link">
								<a <?php if (!file_exists("../algebra2/docs/enable/1-1.txt")) echo "class='disabled'"?> href="../youtube_embed.php?path=HaAUuiHzj-E&unit=1-1&subject=algebra2&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Patterns & Expressions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists("../algebra2/docs/enable/1-2.txt")) echo "class='disabled'"?> href="../youtube_embed.php?path=v54CEowddaE&unit=1-2&subject=algebra2&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Properties of Real Numbers</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=gB9cQQ9156c&unit=1-3&subject=algebra2&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Algebraic Expressions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=AYjeWhypzlU&unit=1-4&subject=algebra2&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Solving Equations</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=Nb1OdvTNOEA&unit=1-5&subject=algebra2&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Solving Inequalities</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=dT-w_2XuGOI&unit=1-6&subject=algebra2&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Solving Absolute Equations & Inequalities</p>
									</div>
								</a>
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