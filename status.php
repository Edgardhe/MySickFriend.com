<?php

	session_start();
	include 'dbstuff.php';
	mysql_select_db($dbuser,$con);
	if (!$con) { 
		die(' Could no connect');
	}
	Else {	

		$user = $_SESSION['user'];
		$patient = $_SESSION['Patient'];
		$status = mysql_real_escape_string($_POST["status"]); 
		$name = $_SESSION['name'];
		$query = "INSERT INTO status (IDuser, IDPatient, Status, STATUSname) VALUES ('$user', '$patient', '$status', '$name')";
		if (!mysql_query($query,$con))
		{
			die('Error: ' . mysql_error());
		}
		mysql_close($con);	
		header("Location:mainview.php");
	}
	
	
?>

