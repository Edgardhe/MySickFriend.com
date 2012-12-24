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
		$location = mysql_real_escape_string($_POST["Location"]);
		$room = mysql_real_escape_string($_POST["RoomNumber"]);
		$street = mysql_real_escape_string($_POST["LocationStreet"]);
		$city = mysql_real_escape_string($_POST["LocationCity"]);
		$state = mysql_real_escape_string($_POST["LocationState"]);
		$zip = mysql_real_escape_string($_POST["LocationZip"]);
		$primary = $_POST["Primary"];
		echo "first " . $FName . "<br />";
		echo "last " . $LName . "<br />";
		
		mysql_select_db("edgardhe", $con);
		$join = joinname(date("wzsWYsdsmHis"));
		$user = $_SESSION['user'];
		echo "BEFORE QUERY<br />join " . $join . "<br />user " . $user . "<br />"; 
//		break;
//		CHECK IF USER HAS OTHER PATIENTS
//			IF USER HAS NO PATIENTS, SET NEW PATIENT AS PRIMARY
//			ELSE SET AS NOT
		$query = mysql_query("INSERT INTO patient (IDUSER, PatJoin, FNamePat, LNamePat, Location , RoomNumber, LocationStreet, LocationCity, LocationState, LocationZip) 
			VALUES ('$user', '$join', '$FName', '$LName', '$location', '$room', '$street', '$city', '$state', '$zip')",$con) or die(mysql_error());
		if ($query)
		{
			echo "INTO PATIENT<br />";
			$query2 = mysql_query("SELECT * FROM patient WHERE PatJoin = '$join'");
			if ($query2)
			{
				if ($primary === "1")
				{
					mysql_query("UPDATE permissions SET PermType = '0' WHERE UserIDPERM = '$user'") or die (mysql_erroe());
				} else {
					$primary  = "0";
				}
				echo "GET WITH JOIN --> PatID" . mysql_result($query2,0,0);
				$patid  = mysql_result($query2,0,0);
				$query3 = mysql_query("INSERT INTO permissions (UserIDPERM, PatIDPERM, PermType) VALUES ('$user', '$patid', '$primary')",$con) or die(mysql_error());
				if ($query3)
				{
					echo "<br />Patient added ";
					
				}
			mysql_close($con);	
			}
			$_SESSION['patient'] = $patid;
			header("Location:mainview.php");
		}
		 else
		 {
			echo "Not Added";
		}

		
		
		
	}
	
?>