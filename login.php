<?php
	session_start();
	require 'dbstuff.php';
	require 'secure.php';
	require 'nav.php';
	echo "Please Log into your account.";
	require "login.htm";	
	if (!$con) { 
		die(' Could no connect');
	}
	else {
		if ($_SESSION['user'] == null)
		{
			$EMail = mysql_real_escape_string($_POST["EMail"]);
			$password = mysql_real_escape_string($_POST["Password"]);
			$password = scramble($password);
			mysql_select_db($dbuser, $con);
			$query = mysql_query("SELECT * FROM users WHERE email = '$EMail' and password = '$password'",$con) or die(mysql_error());
			if (mysql_num_rows($query) > 0) 
			{
				echo mysql_result($query,0,1) . " " . mysql_result($query,0,2) . " is logged in!<br />";
				
				$_SESSION['user'] = mysql_result($query,0,0);
				$_SESSION['name'] = mysql_result($query,0,1) . " " . mysql_result($query,0,2);
				mysql_close($con);
				header("Location:picker.php");
			}
		}
		else
		{
			header("Location:picker.php");
		}
	}
?>