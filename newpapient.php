<?php
	session_start();
	require 'dbstuff.php';
	require 'secure.php';
	if (!$con) { 
		die(' Could no connect');
	}
	Else {
	
		echo "connected";
		$FName = mysql_real_escape_string($_POST["FName"]);
		$LName = mysql_real_escape_string($_POST["LName"]);
		
		echo "first " . $FName . "<br />";
		echo "last " . $LName . "<br />";
		
		mysql_select_db("edgardhe", $con);
		$join = date('u');
		$user = $_SESSION['user'];
		echo "BEFORE QUERY<br />join " . $join . "<br />user " . $user . "<br />";
		$query = mysql_query("INSERT INTO patient (IDUSER, PatJoin, FNamePat, LNamePat) VALUES ('$user, '$join', '$FName', '$LName')",$con) or die(mysql_error));
		if ($query)
		{
			echo "INTO PATIENT<br />";
			$query2 = mysql_query("SELECT * FROM patient WHERE PatJoin = '$join'");
			if ($query2)
			{
				echo "GET WITH JOIN --> PatID" . mysql_result($query2,0,0);
				$patid  = mysql_result($query2,0,0);
				$query3 = mysql_query("INSERT INTO permission (UserIDPERM, PatIDPERM, PERMType) VALUES ('$USER', '$patid', '1')",$con) or die(mysql_error));
				if ($query3)
				{
					echo "Patient added";
				}
				
			}
		}
		 else
		 {
			echo "Not Added";
		}

		mysql_close($con);
		
		
	}
	
?>