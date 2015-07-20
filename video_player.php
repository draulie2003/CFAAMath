<?php
	// Inialize session
	session_start();
	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];
	
	$period = $GET['period'];

	include "config.inc";
	
	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['firstname'])) {
		header('Location: classes.php');
	}
	
	else if (isset($_SESSION['name'])) {
		$db = mysql_connect($hostname, $username, $password) or die(mysql_error());
		mysql_select_db($dbname,$db) or die(mysql_error());
		
		$unit = $_GET["unit"];
		$subject = $_GET["subject"];
		date_default_timezone_set("America/New_York");
		$date = date("Y/m/d h:i:s a");
		
		$watched = mysql_query("SELECT * FROM videos_watched WHERE (name = '" . $name . "') and (subject = '" . $subject . "') and (video = '" . $unit . "')");
		
		if (mysql_num_rows($watched) == 0)
			mysql_query("INSERT INTO `videos_watched` (`name`, `subject`, `period`, `video`, `first_date_watched`, `last_date_watched`, `times_watched`, `times_more_practice_watched`) VALUES ('$name', '$subject', '$period', '$unit', '$date', '$date', 1, 0)",$db);
			
		else if (mysql_num_rows($watched) == 1)
			mysql_query("UPDATE `videos_watched` SET last_date_watched = '$date', times_watched = times_watched + 1 WHERE (name = '" . $name . "') and (subject = '" . $subject . "')and (video = '" . $unit . "')",$db);
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
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="../js/flowplayer.min.js"></script>
		 
		<title>CFAA Math | Video Player</title>
		
		<style type="text/css">
		   body {
			font: 12px "Myriad Pro", "Lucida Grande", sans-serif;
			text-align: center;
			padding-top: 10px;
			}
			
		   .flowplayer {

			width:1000px;
			}
		</style>
		<script>
			flowplayer.conf.embed = false;
		</script>
		
	</head>



	<body>

		<!-- the player -->
		<div id="is-finished" class="flowplayer color-light first-frame" data-engine="html5" data-swf="flowplayer.swf" data-ratio="0.5625" >
			<video preload=auto>
				<source type="video/webm" src="../<?= $_GET["subject"]?>/videos/<?=$_GET["unit"]?>/<?=$_GET["unit"]?>.webm">
				<source type="video/mp4" src="../<?= $_GET["subject"]?>/videos/<?=$_GET["unit"]?>/<?=$_GET["unit"]?>.mp4">
				<source type="video/ogv" src="../<?= $_GET["subject"]?>/videos/<?=$_GET["unit"]?>/<?=$_GET["unit"]?>.ogv">
			</video>
			
			<div class="when-video-ends">
			  <h3>Unit <?=$_GET["unit"]?> Video Finished</h3>
			  <h4>Don't forget to bring your Ticket In The Door to class tomorrow.</h4>

<!--			  <a class="button" href="../video_player_more_practice.php?unit=<?=$_GET["unit"]?>&subject=<?= $_GET["subject"]?>">More Practice</a> -->

			  <a class="button" href="javascript:location.reload(true);">replay video</a>
			 
			  
		   </div>
			
		</div>

	</body>
</html>