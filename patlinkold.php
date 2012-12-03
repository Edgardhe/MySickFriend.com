<?php
	require 'dbstuff.php';

	if (!$con) { 
		die(' Could no connect');
	}
	Else {	
		
		$linktext = $_POST["LinkText"];
echo "what the fuck!!<br />";
		$query = mysql_query("SELECT * FROM patient",$con) or die(mysql_error());
//		$query = mysql_query("SELECT * FROM patient WHERE PatJoin = '$linktext'",$con) or die(mysql_error());
//		$query = mysql_query("SELECT * FROM patient WHERE IDPATIENT = '$patient'",$con) or die(mysql_error());
		if ($query)
		{ 
			$patid = $_SESSION['user'];
			$patid = mysql_result($query,0,0);
			$query2 = mysql_query("INSERT INTO permissions (UserIDPERM, PatIDPERM, PermType) 
				VALUES ('$user', '$patid','2')",$con) or die(mysql_error());
			if ($query2)
			{
				header("Location:mainview.php");
			}
		}
	}

?>