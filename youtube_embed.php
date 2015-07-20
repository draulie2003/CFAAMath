<?php
	// Inialize session
	session_start();
	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];
	
	$period = $_GET['period'];

	include('config.inc');
	
	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['firstname'])) {
		header('Location: classes.php');
	}
	
	else if (isset($_SESSION['firstname'])) {
		$db = mysql_connect($hostname, $username, $password) or die(mysql_error());
		mysql_select_db($dbname,$db) or die(mysql_error());
		
		$unit = $_GET["unit"];
		$subject = $_GET["subject"];
		date_default_timezone_set("America/New_York");
		$date = date("Y/m/d h:i:s a");
		$period = $_GET["period"];
		
		$watched = mysql_query("SELECT * FROM videos_watched WHERE (firstname='" . $fname ."' and lastname='" . $lname . "') and (subject = '" . $subject . "') and (video = '" . $unit . "')");
		
		if (mysql_num_rows($watched) == 0)
			mysql_query("INSERT INTO `videos_watched` (`firstname`, `lastname`, `subject`, `period`, `video`, `first_watched`, `last_watched`, `times_watched`) VALUES ('$fname', '$lname', '$subject', '$period', '$unit', '$date', '$date', 1)",$db);
			
		else if (mysql_num_rows($watched) == 1)
			mysql_query("UPDATE `videos_watched` SET last_watched = '$date', times_watched = times_watched + 1 WHERE (firstname='" . $fname ."' and lastname='" . $lname . "') and (subject = '" . $subject . "')and (video = '" . $unit . "')",$db);
	}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css" />  
		<link rel="stylesheet" type="text/css" href="../css/fonts.css" />
		<link rel="stylesheet" type="text/css" href="../css/finish.css" />
		<link rel="stylesheet" type="text/css" href="../skin/functional.css">
		<link href="http://fonts.googleapis.com/css?family=Terminal+Dosis&subset=latin" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="../images/favicon.ico" />
		<script src="../js/gplus-youtubeembed.js"></script>
		 
		<title>CFAA Math | Youtube Embed</title>
		
		<style type="text/css">
			iframe {
				position: absolute;
				float: left;
				margin-top: 10px;
				margin-left: -426.5px;
				left: 50%;
			}
		</style>
	</head>



	<body>

		<iframe width="853" height="480" src="http://www.youtube.com/embed/<?= $_GET["path"]?>?rel=0" frameborder="0" allowfullscreen></iframe>

	<script type="text/javascript">optimizeYouTubeEmbeds()</script>
	</body>
	
</html>