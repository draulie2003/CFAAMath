<?php
	// Inialize session
	session_start();
	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];
	$role = $_SESSION['role'];
	
	$failed = $_GET["login"];

	include "config.inc";

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
		<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('input[type="text"]').addClass("idleField");
				$('input[type="text"]').focus(function() {
					$(this).removeClass("idleField").addClass("focusField");
					if (this.value == this.defaultValue){ 
						this.value = '';
					}
					if(this.value != this.defaultValue){
						this.select();
					}
				});
				$('input[type="text"]').blur(function() {
					$(this).removeClass("focusField").addClass("idleField");
					if ($.trim(this.value) == ''){
						this.value = (this.defaultValue ? this.defaultValue : '');
					}
				});

				$('input[type="password"]').addClass("idleField");
				$('input[type="password"]').focus(function() {
					$(this).removeClass("idleField").addClass("focusField");
					if (this.value == this.defaultValue){ 
						this.value = '';
					}
					if(this.value != this.defaultValue){
						this.select();
					}
				});
				$('input[type="password"]').blur(function() {
					$(this).removeClass("focusField").addClass("idleField");
					if ($.trim(this.value) == ''){
						this.value = (this.defaultValue ? this.defaultValue : '');
					}
				});
			});			
		</script>
		<style type="text/css">				
			input{
				width:50%;
				min-width: 500px;
				padding:10px;
				height:42px;
				outline:none;
				font-size: 24px;
				margin-bottom: 10px;
			}
			.focusField{
				border:solid 2px #C10D02;
				background:#333;
				color:#FFF;
			}
			.idleField{
				background:#EEE;
				color: #6F6F6F;
				border: solid 2px #DFDFDF;
			}		
		</style>
		<title>CFAA Math | Classes</title>

	</head>
	<body>
		<div id="header-container">
			<div id="header">
				<h1 class="title" >CFAA Math</h1>
				<div id="nav">
					<ul>
						<li><a href="../">home</a></li>
						<li class="selected" ><a class="selected" href="../classes.php">classes</a></li>	
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
<?php
				if (isset($_SESSION['firstname'])) 
				{	
				
				
					if ($role == 'student')
					{	
						$result = mysql_query("SELECT subject1, subject2, subject3 FROM login_info WHERE firstname='" . $fname ."' and lastname='" . $lname . "'",$db); 
						
						$subject1 = mysql_result($result, 0, "subject1");
						$subject2 = mysql_result($result, 0, "subject2");
						$subject3 = mysql_result($result, 0, "subject3");
						
						$subject1 = explode(" ", $subject1);
						$subject2 = explode(" ", $subject2);
						$subject3 = explode(" ", $subject3);
						
						$period1 = $subject1[1];
						$subject1 = $subject1[0];
						
						$period2 = $subject2[1];
						$subject2 = $subject2[0];
						
						$period3 = $subject3[1];
						$subject3 = $subject3[0];
						
						
						
						
						echo "<h3 class='sname'>Hi " . $fname . ", here are your class(es):";
						echo "<a class='subject_link' href='../classes/" . $subject1 . ".php?period=" . $period1 . "'><h1 class='subject_title'>" . $subject1 . "</h1></a>";
						
						if ($subject2 != null)
							echo "<a class='subject_link' href='../classes/" . $subject2 . ".php?period=" . $period2 . "'><h1 class='subject_title'>" . $subject2 . "</h1></a>";
						
						if ($subject3 != null)
							echo "<a class='subject_link' href='../classes/" . $subject3 . ".php?period=" . $period3 . "'><h1 class='subject_title'>" . $subject3 . "</h1></a>";
						
					}
					
					else if ($role == 'admin')
					{
						echo "<h3 class='sname'>Hi " . $fname . ", please select a subject below:";
						echo "<a class='subject_link' href='../classes/algebra1.php'><h1 class='subject_title'>algebra 1</h1></a>";
						echo "<a class='subject_link' href='../classes/algebra1im.php'><h1 class='subject_title'>algebra 1 IM</h1></a>";
						echo "<a class='subject_link' href='../classes/geometry.php'><h1 class='subject_title'>geometry</h1></a>";
						echo "<a class='subject_link' href='../classes/algebra2.php'><h1 class='subject_title'>algebra 2</h1></a>";
						echo "<a class='subject_link' href='../classes/precalculus.php'><h1 class='subject_title'>precalculus</h1></a>";
						echo "<a class='subject_link' href='../classes/apcalculus.php'><h1 class='subject_title'>ap calculus</h1></a>";
						echo "<a class='subject_link' href='../classes/college_readiness.php'><h1 class='subject_title'>college readiness</h1></a>";
						echo "<a class='subject_link' href='../video_stats_new.php'><h1 class='subject_title'>video stats</h1></a>";
						echo "<a class='subject_link' href='../classroster.php'><h1 class='subject_title'>class roster</h1></a>";
						echo "<a class='subject_link' href='../add_edit_student.php'><h1 class='subject_title'>add edit user</h1></a>";
						echo "<a class='subject_link' href='../add_edit_video.php'><h1 class='subject_title'>add edit video / unit</h1></a>";
					}
				}

				else
				{
					if ($failed != 'failed')
					echo "<h3 class='class'>Please login to view your class(es).<h3>";
					else
					echo "<h3 class='class'>Please enter a vaild username and password.<h3>";
					echo "<form method='post' action='../loginproc.php' name='loginForm'>";
					echo "<h3 class='class'>Username</h3>";
					echo "<center><input type='text' name='name' /></center>";
					echo "<h3 class='class'>Password</h3>";
					echo "<center><input type='password' name='password' /></center>";
					echo "<center><input class='button' type='submit' value='Login'></center>";
					echo "<input type='HIDDEN' name='Message' value='True'>";
					echo "</form>";
				}
?>

			</div>
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