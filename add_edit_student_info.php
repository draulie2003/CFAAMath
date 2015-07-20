<?php
	// Inialize session
	session_start();
	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];
	$role = $_SESSION['role'];

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['firstname'])) {
		header('Location: classes.php');
	}
	
	if ($role != 'admin')
		header('Location: classes.php');
		
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
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.2.1/pure-min.css">
		<link rel="shortcut icon" href="../images/favicon.ico" />
		 
		<title>CFAA Math | Video Stats</title>
		
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
		
		<style>
			.pure-button-display {
            background: #D10C02;
        }
		</style>
		
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
				
					<h3 class="sections">add / edit user</h3>
					
					<div id="info_container">
						<form method='post' action='../add_edit_student_confirmed.php' name='add_edit_student' class="pure-form pure-form-aligned">
							<fieldset>
								
<?php
								$Student = $_POST['student'];
								
								if ($Student == 'new')
								{
									echo "<div class='pure-control-group'>";
										echo "<label for='firstname'>First Name</label>";
										echo "<input name='firstname' type='text' placeholder='First Name'> New <input name='new' type='checkbox' value='Yes' checked>";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='lastname'>Last Name</label>";
										echo "<input name='lastname' type='text' placeholder='Last Name'>";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='password'>Password</label>";
										echo "<input name='password' type='text' placeholder='Password'>";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='subject1'>Subject 1</label>";
										echo "<input name='subject1' type='text' placeholder='Subject 1'>";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='subject2'>Subject 2</label>";
										echo "<input name='subject2' type='text' placeholder='Subject 2'>";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='subject3'>Subject 3</label>";
										echo "<input name='subject3' type='text' placeholder='Subject 3'>";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='role'>Role</label>";
										echo "<select name='role'>";
											echo "<option value='student'>Student</option>";
											echo "<option value='admin'>Admin</option>";
										echo "</select>";
									echo "</div>";

								}
								
								else if ($Student != 'new' && $Student != 'select')
								{
								
									$name = explode(",",$Student);
									$lname = trim($name[0], " ");
									$fname = trim($name[1], " ");
								
									$data = mysql_query("SELECT * FROM login_info WHERE (firstname='" . $fname ."' and lastname='" . $lname . "')");
									
									echo "<div class='pure-control-group'>";
										echo "<label for='firstname'>First Name</label>";
										echo "<input name='firstname' type='text' value='" . mysql_result($data, 0, "firstname") ."'>";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='lastname'>Last Name</label>";
										echo "<input name='lastname' type='text' value='" . mysql_result($data, 0, "lastname") ."'>";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='password'>Password</label>";
										echo "<input name='password' type='text' value='" . mysql_result($data, 0, "password") ."'>";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='subject1'>Subject 1</label>";
										echo "<input name='subject1' type='text' value='" . mysql_result($data, 0, "subject1") ."'>";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='subject2'>Subject 2</label>";
										echo "<input name='subject2' type='text' value='" . mysql_result($data, 0, "subject2") ."'>";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='subject3'>Subject 3</label>";
										echo "<input name='subject3' type='text' value='" . mysql_result($data, 0, "subject3") ."'>";
									echo "</div>";
									
									echo "<div class='pure-control-group'>";
										echo "<label for='role'>Role</label>";
										echo "<input name='role' type='text' value='" . mysql_result($data, 0, "role") ."'>";
									echo "</div>";
								}	
									echo "<div class='pure-controls'>";
										echo "<input type='hidden' name='completed' value='True'>";
										echo "<input type='hidden' name='oldname' value='" . $Student . "'>";
										echo "<button type='submit' class='pure-button pure-button-display'>Add / Update User</button>";
									echo "</div>";	
								
?>

							</fieldset>
						</form>
					</div>
					
				</div>
				
			
				<div class='clear'></div>

			</div>
			<div class='clear'></div>
			<a href="#" class="scrollup">Scroll</a>
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