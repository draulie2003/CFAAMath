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
		 
		<title>CFAA Math | Tutoring</title>
		
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
						<li><a href="../">home</a></li>
						<li><a href="../classes.php">classes</a></li>	
						<li><a href="../schedule.php">schedule</a></li>
						<li class="selected" ><a class="selected" href="../tutoring.php">tutoring</a></li>
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
				<img class="pic_tutor" src="../images/thinker_mirror1.png"></a>
				<div class="left_class">
					<h1 class="class_title">Tutoring</h1>
					<p>Ms. Cole and Mr. Raulerson offer tutoring after school. We ask that the student (or parent)
					   notify us a day or two in advance so we know how many are staying and to see if we have a parent conference, or other meeting, on that day.
					   Students are also responsible for arranging their own transportation to and from tutoring.
					</p>
				</div>
				
				<div class='clear'><br /><br /></div>
				
				<div class="tutoring">
					<h3>Ms. Cole</h3>
					<p>provides tutoring after school Monday and Tuesday from 1:45 pm - 2:15 pm in room 307. 
					</p>
					<h3>Mr. Raulerson</h3>
					<p>provides tutoring after school Monday and Tuesday from 1:45 pm - 2:15 pm in room 308.
					</p>
					<p><br /><br />We ask that the students come to tutoring prepared and with questions already in mind.
					</p>
				</div>
				
			</div>
			
			<div class='clear'><br /><br /></div>
			<div class='clear'><br /></div>
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