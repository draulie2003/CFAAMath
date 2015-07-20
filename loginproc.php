<?php

	// Inialize session
	session_start();

	// Include database connection settings
	include('config.inc');
	

	$Message = $_POST['Message'];
	$name = $_POST['name'];

	$lowerName = strtolower($name);
	$name = ucwords($lowerName);
	
	$name = explode(".",$name);
	$fname = $name[0];
	$lname = $name[1];

	if($Message)
	{
		// Retrieve username and password from database according to user's input
		$login = mysql_query("SELECT * FROM login_info WHERE (firstname = '" . mysql_real_escape_string($fname) . "' and lastname = '" . mysql_real_escape_string($lname) . "') and (password = '" . mysql_real_escape_string($_POST['password']) . "')");

		// Check username and password match
		if (mysql_num_rows($login) == 1) {	
		$fname = mysql_result($login, 0, "firstname");		
		$lname = mysql_result($login, 0, "lastname");
		$role = mysql_result($login, 0, "role");
		
		
		// Set username session variable
		$_SESSION['firstname'] = $fname;		
		$_SESSION['lastname'] = $lname;		
		$_SESSION['role'] = $role;
		
		date_default_timezone_set("America/New_York");
		$date = date("Y/m/d");
		
		$db = mysql_connect($hostname, $username, $password) or die(mysql_error());
		mysql_select_db($dbname,$db) or die(mysql_error());
		
		mysql_query("UPDATE `login_info` SET last_login = '$date', times_logged_in = times_logged_in + 1 WHERE (firstname='" . $fname ."' and lastname='" . $lname . "')",$db);
		
		header('Location: ../classes.php');
		}
		else 
			header('Location: ../classes.php?login=failed');

	}

?>
