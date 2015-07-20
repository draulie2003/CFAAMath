<!DOCTYPE html>

<html lang="en">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<link rel="stylesheet" type="text/css" href="../css/style.css" />  

		<link rel="stylesheet" type="text/css" href="../css/fonts.css" />  
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<link href="http://fonts.googleapis.com/css?family=Terminal+Dosis&subset=latin" rel="stylesheet" type="text/css">

		<link rel="shortcut icon" href="../images/favicon.ico" />



		<title>CFAA Math | Schedule</title>

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

						<li class="selected" ><a class="selected" href="../schedule.php">schedule</a></li>

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



				<h1 class="subject_title" >Class Schedule</h1>



				<table>

					<tr><th colspan="2">Regular Bell Schedule</th><th rowspan="23" width="20"></th><th rowspan="23" width="1" bgcolor="#333"></th><th rowspan="23" width="20"></th><th colspan="2">Early Release Bell Schedule</th></tr>

					<tr><td>7:02am</td><td>Warning Bell</td><td>7:08am</td><td>Warning Bell</td></tr>

					<tr><td>7:05am</td><td>Tardy Bell</td><td>7:10am</td><td>Tardy Bell</td></tr>

					<tr><td>7:05am - 7:53am</td><td>1st Period</td><td>7:05am - 7:32am</td><td>1st Period</td></tr>

					<tr class="small"><td>7:53am - 7:57am</td><td>Class Change</td><td>7:32am - 7:36am</td><td>Class Change</td></tr>

					<tr><td>7:57am - 8:45am</td><td>2nd Period</td><td>7:36am - 8:03am</td><td>2nd Period</td></tr>

					<tr class="small"><td>8:45am - 8:49am</td><td>Class Change</td><td>8:03am - 8:07am</td><td>Class Change</td></tr>

					<tr><td>8:49am - 9:43am</td><td>3rd Period</td><td>8:07am - 8:34am</td><td>3rd Period</td></tr>

					<tr class="small"><td>9:43am - 9:47am</td><td>Class Change</td><td>8:34am - 8:38am</td><td>Class Change</td></tr>

					<tr><td>9:47am - 10:35am</td><td>4th Period</td><td>8:38am - 9:05am</td><td>4th Period</td></tr>

					<tr class="small"><td>10:35am - 10:39am</td><td>Class Change</td><td>9:05am - 9:09am</td><td>Class Change</td></tr>

					<tr><td>10:39am - 11:27am</td><td>5th Period</td><td>9:09am - 9:36am</td><td>5th Period</td></tr>

					<tr class="small"><td>11:27am - 11:31am</td><td>Class Change</td><td>9:36am - 9:40am</td><td>Class Change</td></tr>

					<tr><td>11:31am - 12:43am</td><td>6th Period</td><td>9:40am - 10:07am</td><td>6th Period</td></tr>
					
					<tr class="small"><td class="bold" colspan="2">"A" Lunch - 3rd Floor (except Raulerson & Talley)</td><td>10:07am - 10:11am</td><td>Class Change</td></tr>

					<tr><td class="small">11:31am - 11:51am</td><td class="small">Lunch</td><td>10:11am - 10:38am</td><td>7th Period</td></tr>

					<tr><td class="small">11:51am - 12:43am</td><td class="small">Class</td><td class="bold" colspan="2">Lunch</td></tr>
					
					<tr><td class="small bold" colspan="2">"B" Lunch - 1st & 2nd Floors, Raulerson, & Talley</td><td>10:42am - 11:12am</td><td>Lunch</td></tr>
					
					<tr><td>11:31am - 12:23am</td><td>Class</td><td>11:12am</td><td>Student Dismissal</td></tr>

					<tr class="small"><td>12:23am - 12:43am</td><td>Lunch</td><td></td></tr>
					
					<tr class="small"><td>12:43am - 12:47am</td><td class="small">Class Change</td><td></td></tr>

					<tr><td>12:47am - 1:35am</td><td>7th Period</td><td></td></tr>

					<tr><td>1:35pm</td><td>Student Dismissal</td><td></td></tr>

				</table>



			</div>

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