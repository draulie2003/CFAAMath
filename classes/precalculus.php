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
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="../images/favicon.ico" />
		<script src="../js/jquery-1.11.1.min.js"></script>
		<script src="../js/jquery.scrollUp.min.js"></script>
		 
		<title>CFAA Math | Precalculus</title>
		
		<script>
			$(function () {
			  $.scrollUp({
				scrollName: 'scrollUp', // Element ID
				topDistance: '300', // Distance from top before showing element (px)
				topSpeed: 300, // Speed back to top (ms)
				animation: 'slide', // Fade, slide, none
				animationInSpeed: 1500, // Animation in speed (ms)
				animationOutSpeed: 1500, // Animation out speed (ms)
				scrollText: 'Scroll to top', // Text for element
				activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
			  });
			});
		</script>
		
	</head>
	<body>
		<div id="header-container">
			<div id="header">
				<h1 class="title" >CFAA Math - Precalculus</h1>
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
				
					<h3 class="sections">info</h2>
					
					<div id="info_container">
					
						<div style="float:right; margin:0px 0px 15px 15px;">	
							<script src="https://widgets.remind.com/iframe.js?token=8caed1a007e201326bc87a6ff0711d58" type="text/javascript"></script>
						</div>
					
						<h3><a href="../phpbb/phpBB3/index.php" target="_blank">CFAA Math Forums</a></h3>
						
						<h3><a href="/precal/docs/Precalculus%202014-2015%20Syllabus.pdf" target="_blank">Precalculus 2014-2015 Syllabus</a></h3>
						
						<h3><a href="../docs/Classroom%20Policies.pdf" target="_blank">Classroom Policies</a></h3>
						
						<h3><a href="../docs/Test%20Quiz%20Policy.pdf" target="_blank">Test/Quiz Policy</a></h3>
						
						<h3><a href="/precal/docs/precal_remind_info.pdf" target="_blank">Precalculus Remind Information</a></h3>
						
						<h3><a href="/precal/book2.php" target="_blank">Precalculus Book</a></h3>
						
						<h3><a href="/algebra2/docs/Wabbitemu.exe">Wabbit TI 84 Emulator</a></h3>
						
						<h3><a href="/algebra2/docs/wabbit%20instructions.docx">Wabbit TI 84 Emulator Instructions</a></h3>
						
					</div>
					
				</div>
				
				<div class='clear'></div>
				
				<div id="calendar">
					
					<h3 class="sections">calendar</h2>
					
					<div id="cal_container">
					
					<iframe src="https://www.google.com/calendar/embed?&amp;showTabs=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=bp3e26u3mskfium4pputrqvb4g%40group.calendar.google.com&amp;color=%23711616&amp;ctz=America%2FNew_York" style=" border-width:0 " width="850" height="600" frameborder="0" scrolling="no"></iframe>
					
					</div>
					
				</div>
				
				<div id="notesdiv">
							
					<h3 class="sections">exam reviews</h2>
					
					<h4><a href="../precal/docs/reviews/Chapter 10 Conics Part One Quiz - Review.pdf" target="_blank">Conics Part One Quiz - Review</a></h4>
					
					<h4><a href="../precal/docs/reviews/Chapter 10 Conics Part Two Quiz - Review.pdf" target="_blank">Conics Part Two Quiz - Review</a></h4>
					
					<h4><a href="../precal/docs/reviews/Chapter 10 Parametrics Quiz - Raulerson - Review.pdf" target="_blank">Parametrics Quiz - Review</a></h4>
					
					<h4><a href="../precal/docs/reviews/Chapter 9 Arithmetic Sequences Superquiz - Review.pdf" target="_blank">Arithmetic Sequences Superquiz - Review</a></h4>
					
				</div>
				
				<div id="videos">
				
					<h3 class="sections">videos</h2>
					
					<div id="video_chapters">
					
				<!--		<div id="youtube-channel" class="panel">
						
						<center><a href="http://www.youtube.com/channel/UCNRE653xLfQKWr-dTg7A9ZQ/videos?flow=grid&view=1" target="_blank"><img src="../images/youtube-logo.png" width="500px"></a></center>
						
						</div>
						
						<div class='clear'></div>-->
				<!--		<div id="unit7" class="panel">
							<h3>Unit 7</h3><h3>Sequences & Series</h3>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=Wa8pOpC6Tak&unit=7-1&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>7-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Sequences & Series</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=MZEVqtP7t4U&unit=7-2&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>7-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Arithmetic Series</p>
									</div>
								</a>
							</div>
							
							
						</div>
						
						<div class='clear'></div>
					
						
						<div id="unit6" class="panel">
							<h3>Unit 6</h3><h3>Oblique Triangles</h3>
							
							<div class="video_link">
								<a href="../video_player.php?unit=6-1&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>6-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Law of Sines</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=eJSuEo7hj2w&unit=6-2&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>6-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Ambiguous Case for Law of Sines</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=jBGL99YxVCI&unit=6-3&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>6-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Sine Area Formula</p>
									</div>
								</a>
							</div>
							
							
						</div>
						
						<div class='clear'></div>
						
						<div id="unit5" class="panel">
							<h3>Unit 5</h3><h3>Analytical Trig</h3>
				
							<div class="video_link">
								<a href="../youtube_embed.php?path=3izCoIXnfEo&unit=5-1&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>5-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Simplifying Trig Expressions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=wa3isFwxj8g&unit=5-2&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>5-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Verifying Trig Identities</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=DD1d-VJAghg&unit=5-3&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>5-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Solving Trig Equations</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=kbdoj-eWAJU&unit=5-6&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>5-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Sum & Difference Formulas</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=yW9AFQedsbA&unit=5-r&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>5-R</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Analytical Trig Quiz Review</p>
									</div>
								</a>
							</div>
							
							
						</div>
						
						<div class='clear'></div>
					
						
						<div id="unit4b" class="panel">
							<h3>Unit 4c</h3><h3>Trig Graphing</h3>
				
							<div class="video_link">
								<a href="../youtube_embed.php?path=OJLV9xLi1Po&unit=4-10&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-10</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Other Trig Graphs</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=N1yEcCmJFaM&unit=4-r0&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-RO</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Other Trig Graphs Quiz Review</p>
									</div>
								</a>
							</div>
							
							
						</div>
						
						<div class='clear'></div>
						
						
						<div id="unit4b" class="panel">
							<h3>Unit 4b</h3><h3>Right Triangle Trig</h3>
				
							<div class="video_link">
								<a href="../youtube_embed.php?path=dBd8RNkv5As&unit=4-5&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Special Triangles & Trig</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=EtAoUp2OEv4&unit=4-6&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>SOHCAHTOA</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=r_4RTycvI9Q&unit=4-7&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-7</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>SOHCAHTOA & Inverse Trig</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=XjuVJK6aD5M&unit=4-8&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-8</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>ASTC & Pythagorean Trig Identity</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=Iw1jaXN1XIo&unit=4-9&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-9</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>"Cousins" of The Golden Rule & Reference Angles</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=L2KZ37AXQNY&unit=4-rr&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-RR</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Right Triangle Trig Test Review</p>
									</div>
								</a>
							</div>
							
							
						</div>
						
						<div class='clear'></div>
					
						<div id="unit4" class="panel">
							<h3>Unit 4a</h3><h3>Intro To Trig</h3>
				
							<div class="video_link">
								<a href="../youtube_embed.php?path=BdYkRAsR6LY&unit=4-1&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Degrees - Radians</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=VkCSh0m83Zw&unit=4-2&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Converting Systems & Arc Length</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=uuGP1FNSZJ0&unit=4-3&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Unit Circle & Basic Trig</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=igzNCMmRolc&unit=4-4&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Reciprocal Trig Functions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=tPAeV-6-BSw&unit=4-ri&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>4-RI</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Intro To Trig Review</p>
									</div>
								</a>
							</div>
							
							
						</div>
						
						<div class='clear'></div>
							
							
						<div id="chapter3" class="panel">
							<h3>Unit 3</h3><h3>Exponentials and Logarithms</h3>
				
							<div class="video_link">
								<a <?php if (!file_exists('../precal/videos/enable/enable_3-1.txt')) echo "class='disabled'"; ?> href="../youtube_embed.php?path=HLJl3irgYVg&unit=3-1&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Exponentials</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../precal/videos/enable/enable_3-2.txt')) echo "class='disabled'"; ?> href="../youtube_embed.php?path=FJOmvzbk1OE&unit=3-2&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Logarithms</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../precal/videos/enable/enable_3-3.txt')) echo "class='disabled'"; ?> href="../youtube_embed.php?path=s68JFi191ig&unit=3-3&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Four Big Log Rules</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../precal/videos/enable/enable_3-4a.txt')) echo "class='disabled'"; ?> href="../youtube_embed.php?path=Wymcg9Og544&unit=3-4a&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-4a</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p><i>ZOMBIES!!</i><br />Exponential Growth</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=y0B2mvAohLM&unit=3-4b&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-4b</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p><i>ZOMBIES!!</i><br />Part 2</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=f-5mKUSppbc&unit=3-5&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Exponent Equations</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=nZzEzY7kVU8&unit=3-6&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Log Equations</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=VuyIgQl-wdw&unit=3-r&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>3-r</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Unit 3 Review</p>
									</div>
								</a>
							</div>
							
							
						</div>
						
						<div class='clear'></div>
					
						<div id="chapter2b" class="panel">
							<h3>Unit 2b</h3><h3>Limits</h3>
				
							<div class="video_link">
								<a href="../youtube_embed.php?path=ckOqUYvqQak&unit=b2-1&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>b2-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Limits</p>
									</div>
								</a>
							</div>
								
							<div class="video_link">
								<a href="../youtube_embed.php?path=x-rdDx70zXw&unit=b2-2&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>b2-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Limits by Algebra</p>
									</div>
								</a>
							</div>
								
							<div class="video_link">
								<a href="../youtube_embed.php?path=dRlKoy25s9U&unit=b2-3&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>b2-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Limits Involving Radicals</p>
									</div>
								</a>
							</div>
								
							<div class="video_link">
								<a href="../youtube_embed.php?path=mvNC9ijekas&unit=b2-r&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>b2-R</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Limits Quiz</p>
									</div>
								</a>
							</div>
								
							<div class="video_link">
								<a href="../youtube_embed.php?path=-2na3zRO2vA&unit=2-4&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Continuity</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=b0yt187nx3I&unit=2-5&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>One-Sided Limits</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=HEOpWrDPQNg&unit=2-6&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Infinite Limits</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../precal/videos/2-7/2-7.mp4')) echo "class='disabled'"; ?> href="../video_player.php?unit=2-7&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-7</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Limits at Infinity</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists('../precal/videos/enable/enable_2-r.txt')) echo "class='disabled'"; ?> href="../youtube_embed.php?path=XQj0u7C06ZQ&unit=2-r&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-R</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Unit 2b Review</p>
									</div>
								</a>
							</div>
							
						</div>
						
						<div class='clear'></div> -->
<?php
						$data = mysql_query("SELECT * FROM unit_titles WHERE class = 'precal' ORDER BY unit_num DESC");
						
						
						
						for ($j = 0; $j < mysql_num_rows($data) ; $j++)
						{
							echo "<div id='unit" . mysql_result($data, $j, "unit_num") . "' class='panel'>";
							echo "<h3>Unit " . mysql_result($data, $j, "unit_num") . "</h3><h3>" . mysql_result($data, $j, "unit_title") . "</h3>";
								
							$videos = mysql_query("SELECT * FROM videos WHERE class = 'precal' AND unit LIKE '" . mysql_result($data, $j, "unit_num") . "-%' ORDER BY UNIT ASC");
								
							for ($k = 0; $k < mysql_num_rows($videos); $k++)
							{
								echo "<div class='video_link'>";
									echo "<a ";
									
									if (mysql_result($videos, $k, "enable") == 'no')
										echo "class='disabled'";
									
									echo "href='../youtube_embed.php?path=" . mysql_result($videos, $k, "path") . "&unit=" . mysql_result($videos, $k, "unit") . "&subject=precal' title='Watch Video' target='_blank' >";
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
				<!--		<div id="chapter2" class="panel">
							<h3>Unit 2</h3><h3>Polynomial & Rational Functions</h3>
				
							<div class="video_link">
								<a href="../youtube_embed.php?path=x1JNYbs60xs&unit=2-1&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Complex Numbers</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=eFZOnAcuVLM&unit=2-2&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Quadratic Functions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=-X2ALD7NL6o&unit=2-3&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Polynomial Functions & Their Graphs</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=JlhN8tt-lSY&unit=2-4&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Dividing Polynomials; Remainder & Factor Theorems</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=kk95aEBtu3o&unit=2-5a&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-5A</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Zeros of Polynomials</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a class="disabled" href="../youtube_embed.php?path=MKz-yLRrmTA&unit=2-5b&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-5B</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Descartes' Rule of Signs</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a class="disabled" href="../youtube_embed.php?path=qERe7nun_Rs&unit=2-6a&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-6A</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Rational Functions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a class="disabled" href="../youtube_embed.php?path=SV4dvUvKfTw&unit=2-6b&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-6B</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Rational Functions - Slant Asymptotes</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a class="disabled" href="../youtube_embed.php?path=&unit=2-7&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-7</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Polynomial & Rational Inequalities</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a class="disabled" href="../youtube_embed.php?path=&unit=2-8&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-8</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Modeling Using Variation</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a class="disabled" href="../youtube_embed.php?path=&unit=2-r&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>2-R</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Unit 2 Review</p>
									</div>
								</a>
							</div> -->
							
							
						</div> 
						
						<div class='clear'></div>
					
						<div id="chapter1" class="panel">
							<h3>Unit 1</h3><h3>Functions and Their Graphs</h3>
				
							<div class="video_link">
								<a href="../precal/docs/Unit%201/1.1%20MLN.pdf" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-1</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Graphs and Graphing Utilities</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists("../precal/docs/enable/1-2.txt")) echo "class='disabled'"?> href="../youtube_embed.php?path=OpaBl9MSnjg&unit=1-2&subject=precal&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-2</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Basics of Functions & Their Graphs</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=lY7FZvuj09Q&unit=1-3&subject=precal&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-3</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>More on Functions & Their Graphs</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists("../precal/docs/enable/1-4.txt")) echo "class='disabled'"?> href="../youtube_embed.php?path=&unit=1-4&subject=precal&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-4</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Linear Functions & Slope</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=Tt6NeDyJzQQ&unit=1-5&subject=precal&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-5</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Rate of Change</p>
									</div>
								</a>
							</div>
							
					<!--		<div class="video_link">
								<a <?php if (!file_exists("../precal/docs/enable/1-5b.txt")) echo "class='disabled'"?> href="../youtube_embed.php?path=?unit=Translating_Graphs_Part_2&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-5b</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Translating Graphs Part 2 - Reflections & Stretches</p>
									</div>
								</a>
							</div> -->
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=FAbqCzGHIhs&unit=1-6&subject=precal&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-6</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Transformations of Functions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=4CXDLqAe3FM&unit=1-6b&subject=precal" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-6b</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Transformations of Functions - Part 2</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=8kEGjA0LDY0&unit=1-7&subject=precal&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-7</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Combinations of Functions; Composite Functions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=qrRNxrDGU5E&unit=1-8&subject=precal&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-8</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Inverse Functions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=Ngj2T_FV1-I&unit=1-9&subject=precal&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-9</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Distance & Midpoint Formulas; Circles</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a href="../youtube_embed.php?path=R0ccRWPMXtY&unit=1-10&subject=precal&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-10</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Modeling with Functions</p>
									</div>
								</a>
							</div>
							
							<div class="video_link">
								<a <?php if (!file_exists("../precal/docs/enable/1-r.txt")) echo "class='disabled'"?> href="../youtube_embed.php?path=jUv5nhvDsIs&unit=1-r&subject=precal&period=<?= $_GET['period'] ?>" title="Watch Video" target="_blank" >
									<div class="unit_number">
										<h4>1-R</h4>
										<img class="play_button" src="../images/play_black.png" />
									</div>
									<div class="unit_desc">
										<p>Functions Test Review</p>
									</div>
								</a>
							</div>
							
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