<?php
	include 'dbstuff.php';
	if (!$con) { 
		die(' Could no connect');
	}
	Else {
	
		echo "connected";
		$FName = mysql_real_escape_string($_POST["FName"]);
		$LName = mysql_real_escape_string($_POST["LName"]);
		session_start();
		echo "session ID " . session_id() . "<br />";
		$User = $_SESSION['user'];
		echo "first " . $FName . "<br />";
		echo "last " . $LName . "<br />";
		echo "<br />user after start " . $User . "<r /.";
		
		mysql_select_db("edgardhe", $con);
		$query = "INSERT INTO patient (IDUSER, FNamePat, LNamePat) VALUES ('$User', '$FName', '$LName')";
		if (!mysql_query($query,$con))
		{
			die('Error: ' . mysql_error());
		}
		
		echo "1 record added";

		mysql_close($con);
		
		
	}
	
?>