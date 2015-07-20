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
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<link rel="shortcut icon" href="../images/favicon.ico" />
		 
		<title>CFAA Math | Geometry</title>
		
	</head>
	<body>
		<div id="header-container">
			<div id="header">
				<h1 class="title" >CFAA Math - Geometry</h1>
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
							
							<script src="https://widgets.remind.com/iframe.js?token=ce1447a007de0132ff5a5ade8bfdbc46" type="text/javascript"></script>
    
						</div>
					
						<h3><a href="../geometry/docs/Geometry%202014-2015%20Syllabus.pdf" target="_blank">Syllabus</a></h3>
						
						<h3><a href="../geometry/docs/ClassExpectationsProcedures2014-15Alg1Geomflipclass.pdf" target="_blank" >Class Expectations</a></h3>
						
						<h3><a href="../geometry/docs/geometry_remind_info.pdf" target="_blank">Sign Up For Remind 101</a></h3>
						
						<h3><a href="../geometry/docs/FLVSEOCReview.pdf" target="_blank">FLVS Geometry EOC Review</a></h3>
					</div>
					
				</div>
				
				<div class='clear'></div>
				
				<div id="calendar">
					
					<h3 class="sections">calendar</h3>
					
					<div id="cal_container">
					
						<iframe src="https://www.google.com/calendar/embed?src=6rns3bklita5ao0lndgi5g55jg%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
					
					</div>
					
					<div class='clear'></div>
				</div>
				
				<div class='clear'></div>
				
<!--				<div id="notesdiv">
					
					<h3 class="sections">notes</h3>
					
					<div id="note_chapters">
						<div id="chapter1" class="panel">
							<h3>chapter 1</h3>
				
							<div class="note_link">
								<a href="../geometry/video_notes/1-1.pdf" title="Download Notes" target="_blank" >
									<div class="unit_number">
										<h4>1-1</h4>
										<img class="download_arrow" src="../images/download_arrow1.png" />
									</div>
									<div class="unit_desc">
										<p>Patterns and Inductive Reasoning</p>
									</div>
								</a>
							</div>
							
							<div class="note_link">
								<a href="../geometry/video_notes/1-2.pdf" title="Download Notes" target="_blank" >
									<div class="unit_number">
										<h4>1-2</h4>
										<img class="download_arrow" src="../images/download_arrow1.png" />
									</div>
									<div class="unit_desc">
										<p>Points, Lines and Planes</p>
									</div>
								</a>
							</div>
							
							<div class="note_link">
								<a href="../geometry/video_notes/1-3.pdf" title="Download Notes" target="_blank" >
									<div class="unit_number">
										<h4>1-3</h4>
										<img class="download_arrow" src="../images/download_arrow1.png" />
									</div>
									<div class="unit_desc">
										<p>Segments, Rays, Parallel Lines and Planes</p>
									</div>
								</a>
							</div>
							
							<div class="note_link">
								<a href="../geometry/video_notes/1-4.pdf" title="Download Notes" target="_blank" >
									<div class="unit_number">
										<h4>1-4</h4>
										<img class="download_arrow" src="../images/download_arrow1.png" />
									</div>
									<div class="unit_desc">
										<p>Measuring Segments and Angles</p>
									</div>
								</a>
							</div>
							
							<div class="note_link">
								<a href="../geometry/video_notes/1-5.pdf" title="Download Notes" target="_blank" >
									<div class="unit_number">
										<h4>1-5</h4>
										<img class="download_arrow" src="../images/download_arrow1.png" />
									</div>
									<div class="unit_desc">
										<p>Basic Constructions</p>
									</div>
								</a>
							</div>
							
							<div class="note_link">
								<a href="../geometry/video_notes/1-6.pdf" title="Download Notes" target="_blank" >
									<div class="unit_number">
										<h4>1-6</h4>
										<img class="download_arrow" src="../images/download_arrow1.png" />
									</div>
									<div class="unit_desc">
										<p>Coordinate Plane</p>
									</div>
								</a>
							</div>
							
							<div class="note_link">
								<a href="../geometry/video_notes/1-7.pdf" title="Download Notes" target="_blank" >
									<div class="unit_number">
										<h4>1-7</h4>
										<img class="download_arrow" src="../images/download_arrow1.png" />
									</div>
									<div class="unit_desc">
										<p>Perimeter, Circumference and Area</p>
									</div>
								</a>
							</div>
							
						<div class='clear'></div>
						
						</div>
							
						<div id="chapter2" class="panel">
							<h3>chapter 2</h3>
						</div>
						
						<div id="chapter3" class="panel">
							<h3>chapter 3</h3>
						</div>
						
						<div id="chapter4" class="panel">
							<h3>chapter 4</h3>
						</div>
						
						<div id="chapter5" class="panel">
							<h3>chapter 5</h3>
						</div>
						
						<div id="chapter6" class="panel">
							<h3>chapter 6</h3>
						</div>
						
						<div id="chapter7" class="panel">
							<h3>chapter 7</h3>
						</div>
						
						<div id="chapter8" class="panel">
							<h3>chapter 8</h3>
						</div>
						
						<div id="chapter9" class="panel">
							<h3>chapter 9</h3>
						</div>
						
						<div id="chapter10" class="panel">
							<h3>chapter 10</h3>
						</div>
						
						<div id="chapter11" class="panel">
							<h3>chapter 11</h3>
						</div>
						
						<div id="chapter12" class="panel">
							<h3>chapter 12</h3>
						</div>	
					</div>
					
				</div>-->
				
				<div id="videos">
				
					<h3 class="sections">videos</h3>
				
					<div id="video_chapters">
						
				<!--		<div id="chapter4" class="panel">
							<h3>Unit 4</h3><h3>Congruent Triangles</h3>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=0anaJjrNXvM&unit=4-1&subject=geometry&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Congruent Figures</p>
									</div>
								</a>
							</div>
						
							<div class="video_link">
								<a class="disabled" href="../youtube_embed.php?path=&unit=4-2&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Triangle Congruence by SSS & SAS</p>
									</div>
								</a>
							</div>
						
							<div class="video_link">
								<a class="disabled" href="../youtube_embed.php?path=&unit=4-3a&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-3a</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Triangle Congruence by ASA & AAS</p>
									</div>
								</a>
							</div>
						
							<div class="video_link">
								<a class="disabled" href="../youtube_embed.php?path=&unit=4-3b&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-3b</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Triangle Congruence by ASA & AAS</p>
									</div>
								</a>
							</div>
						
							<div class="video_link">
								<a class="disabled" href="../youtube_embed.php?path=&unit=4-4&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Using Corresponding Parts of Congruent Triangles</p>
									</div>
								</a>
							</div>
						
							<div class="video_link">
								<a class="disabled" href="../youtube_embed.php?path=&unit=4-5&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Isosceles & Equilateral Triangles</p>
									</div>
								</a>
							</div>
						
							<div class="video_link">
								<a class="disabled" href="../youtube_embed.php?path=&unit=4-6&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Congruence in Right Triangles</p>
									</div>
								</a>
							</div>
						
							<div class="video_link">
								<a class="disabled" href="../youtube_embed.php?path=&unit=4-7&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-7</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Congruence in Overlapping Triangles</p>
									</div>
								</a>
							</div>
						
							<div class="video_link">
								<a class="disabled" href="../youtube_embed.php?path=&unit=4-r&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-R</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Unit 4 Review</p>
									</div>
								</a>
							</div>
						
							
						</div>
						
						<div class='clear'></div>
					
						
						
						<div id="chapter3" class="panel">
							<h3>Unit 3</h3><h3>Parallel and Perpendicular Lines</h3>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=kDMKDUJc6uE&unit=3-1&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Properties of Parallel Lines</p>
									</div>
								</a>
							</div>
						
							<div class="video_link">
								<a href="../youtube_embed.php?path=XFLi1oIWer0&unit=3-2&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Proving Lines Parallel</p>
									</div>
								</a>
							</div>
						
							<div class="video_link">
								<a href="../youtube_embed.php?path=6LzndeeeR7E&unit=3-3&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Parallel and Perpendicular Lines</p>
									</div>
								</a>
							</div>
						
							<div class="video_link">
								<a <?php if (!file_exists('../geometry/videos/3-4/3-4.mp4')) echo "class='disabled'"; ?> href="../video_player.php?unit=3-4&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Parallel Lines and Triangles</p>
									</div>
								</a>
							</div>
						
							<div class="video_link">
								<a href="../youtube_embed.php?path=yCLVAapRzQY&unit=3-5a&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-5a</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Equations of Lines in the Coordinate Plane - Part 1</p>
									</div>
								</a>
							</div>
						
							<div class="video_link">
								<a href="../youtube_embed.php?path=pTdYXHOnAEE&unit=3-5b&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-5b</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Equations of Lines in the Coordinate Plane - Part 2</p>
									</div>
								</a>
							</div>
						
							<div class="video_link">
								<a href="../youtube_embed.php?path=OYckQ9HD0FI&unit=3-6&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Slopes of Parallel and Perpendicular Lines</p>
									</div>
								</a>
							</div>
						
							<div class="video_link">
								<a href="../youtube_embed.php?path=GrohLZioLpY&unit=3-r&subject=geometry" title="Watch Video" target="_blank" >
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
					
						<div id="chapter2" class="panel">
							<h3>Unit 2</h3><h3>Reasoning and Proofing</h3>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=NF80O6LHE08&unit=2-1&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Conditional Statements</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=57x3heNINDY&unit=2-2a&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-2a</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Biconditionals</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=HhuEBFhg7vA&unit=2-2b&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-2b</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Recognizing Good Definitions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=uTu99LtqCWM&unit=2-3&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Deductive Reasoning</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=DQE6GYy3yfU&unit=2-4&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Reasoning in Algebra</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=gjtu10Lme_E&unit=2-5a&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-5a</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Identifying Angle Pairs</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=wi2wX2sf4_E&unit=2-5b&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-5b</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Theorems About Angles</p>
									</div>
								</a>
							</div>
							
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=gRWJxXxPb3U&unit=2-r&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-R</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Unit 2 Review</p>
									</div>
								</a>
							</div>
							
						</div>
						
						<div class='clear'></div> -->
<?php
						$data = mysql_query("SELECT * FROM unit_titles WHERE class = 'geometry' ORDER BY unit_num DESC");
						
						
						
						for ($j = 0; $j < mysql_num_rows($data) ; $j++)
						{
							echo "<div id='unit" . mysql_result($data, $j, "unit_num") . "' class='panel'>";
							echo "<h3>Unit " . mysql_result($data, $j, "unit_num") . "</h3><h3>" . mysql_result($data, $j, "unit_title") . "</h3>";
								
							$videos = mysql_query("SELECT * FROM videos WHERE class = 'geometry' AND unit LIKE '" . mysql_result($data, $j, "unit_num") . "-%' ORDER BY UNIT ASC");
								
							for ($k = 0; $k < mysql_num_rows($videos); $k++)
							{
								echo "<div class='video_link'>";
									echo "<a ";
									
									if (mysql_result($videos, $k, "enable") == 'no')
										echo "class='disabled'";
									
									echo "href='../youtube_embed.php?path=" . mysql_result($videos, $k, "path") . "&unit=" . mysql_result($videos, $k, "unit") . "&subject=geometry' title='Watch Video' target='_blank' >";
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
							<h3>Unit 1</h3><h3>Tools of Geometry</h3>
				
							<div class="video_link">
								<a class='disabled' href="../video_player.php?unit=1-1&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Patterns and Inductive Reasoning</p>
									</div>
								</a>
							</div> 

							
							<div class="video_link">
								<a href="../youtube_embed.php?path=zvk-As_ORkU&unit=1-2&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Points, Lines and Planes</p>
									</div>
								</a>
							</div> 
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=uBX9yIl44pk&unit=1-3&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Measuring Segments</p>
									</div>
								</a>
							</div>
							
						<!--	<div class="video_link">
								<a href="../video_player.php?unit=1-3b&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-3b</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Segments, Rays, Parallel Lines and Planes Part 2</p>
									</div>
								</a>
							</div> -->
							
							 <div class="video_link">
								<a href="../youtube_embed.php?path=JaQKF3QLZwg&unit=1-4&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Measuring Angles</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=EnI8A5IHuzg&unit=1-5&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Exploring Angle Pairs</p>
									</div>
								</a>
							</div>
							
				<!--		<div class="video_link">
								<a href="../youtube_embed.php?path=jve5rvMwqXg&unit=1-6b&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-6b</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Coordinate Plane<br />Part 2</p>
									</div>
								</a>
							</div> -->
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=acTeTqw6YlI&unit=1-7&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-7</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Midpoint & Distance</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=id0WalWOqjM&unit=1-8&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-8</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Perimeter, Circumference, & Area</p>
									</div>
								</a>
							</div>
							
				<!--			<div class="video_link">
								<a href="../youtube_embed.php?path=OSSHsy4P5Rk&unit=1-r&subject=geometry" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-R</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Unit 1 Review</p>
									</div>
								</a>
							</div>
							
						<div class='clear'></div>
						
						</div>
							
	-->
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