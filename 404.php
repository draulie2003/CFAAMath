<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="/css/style.css" />  
		<link rel="stylesheet" type="text/css" href="/css/fonts.css" />  
		<link href="http://fonts.googleapis.com/css?family=Terminal+Dosis&subset=latin" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="../images/favicon.ico" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script language="JavaScript" src="js/gen_validatorv31.js" type="text/javascript"></script>
		 
		<title>CFAA Math | 404 Page</title>
		
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
						<li><a href="../tutoring.php">tutoring</a></li>
						<li class="last selected" ><a class="selected" href="../contact.php">contact</a></li>
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
			
			<p>There you did it! You managed to find a page that doesn't exist. Hope you're happy.</p>
			
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