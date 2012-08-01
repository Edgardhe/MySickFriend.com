<?php
	session_start();
	require 'dbstuff.php';
	require 'secure.php';
	
	if (!$con) { 
		die(' Could no connect');
	}
	else {

			mysql_select_db($dbuser, $con);
			$link = $_POST['Linkup'];
			$user = $_SESSION['user'];
			$query = mysql_query("SELECT * FROM patient WHERE PatJoin = '$link'",$con) or die(mysql_error());
			if (mysql_num_rows($query) > 0) 
			{
				$patient = mysql_result($query,0,0);
				$query = mysql_query("INSERT INTO permissions (UserIDPERM, PatIDPERM, PERMType) VALUES ('$user', '$patient', '2')",$con) or die(mysql_error());
				header("Location:picker.php");
			}
		else
		{
			echo "It didn't work";
			header("Location:picker.php");
		}
	}
?>