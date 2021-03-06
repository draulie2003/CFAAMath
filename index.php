<?php
	// Inialize session
	session_start();
	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css" />  
		<link rel="stylesheet" type="text/css" href="../css/fonts.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>		
		<link href="http://fonts.googleapis.com/css?family=Terminal+Dosis&subset=latin" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="../images/favicon.ico" />
		 
		<title>CFAA Math | Home</title>
		
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
				<h1 class="title" >CFAA Math</h1>
				<div id="nav">
					<ul>
						<li class="selected" ><a class="selected" href="../">home</a></li>
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
				<a href="http://www.polkacademies.com/cfaa/default.asp" target="_blank" ><img class="pic_logo" src="../images/logo4.png"></a>
				<div class="left"><p><br /><br /><b>CFAA Mission:</b> Through a combination of relevant academic experiences, collaboration with the local aerospace community,
												and an aviation focus, all students will engage in a rigorous college preparatory program that will maximize the potential
												for successful careers.</p>
				</div>
				
				
				<div class='clear'><br /><br /></div>
				<div id="info">
					<div id="info_container">
						<div class="col1">
							<h3>Logging In</h3>
							<p style="text-align: left;">Click classes at top of page,
							<br /><b>username:</b> firstname.lastname
							<b>password:</b> student id number
							</p>
						</div>
						<div class="col2">
							<h3>Videos</h3>
							<p>The videos can only be accessed after logging in and are located at the bottom of the subject page <b><i>under</i></b> the calendar.
							</p>
						</div>
						<div class="col3">
							<h3>Info & Calendar</h3>
							<p>
							Check the website <b><i>daily</i></b> for important information about class and for when to watch the lecture videos.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class='clear'><br /><br /></div>
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