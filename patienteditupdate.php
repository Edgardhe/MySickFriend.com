<?php
	session_start();
	require 'dbstuff.php';
	require 'secure.php';
	if (!$con) { 
		die(' Could no connect');
	}
	Else {
	
		$FName = mysql_real_escape_string($_POST["FName"]);
		$LName = mysql_real_escape_string($_POST["LName"]);
		$location = mysql_real_escape_string($_POST["Location"]);
		$room = mysql_real_escape_string($_POST["RoomNumber"]);
		$street = mysql_real_escape_string($_POST["LocationStreet"]);
		$city = mysql_real_escape_string($_POST["LocationCity"]);
		$state = mysql_real_escape_string($_POST["LocationState"]);
		$zip = mysql_real_escape_string($_POST["LocationZip"]);
		$patient = $_SESSION['Patient'];
		
		mysql_select_db("edgardhe", $con);
		$join = joinname(date("wzsWYsdsmHis"));
		$user = $_SESSION['user'];
		echo "BEFORE QUERY<br />join " . $join . "<br />user " . $user . "<br />"; 
//		break;
		$query = mysql_query("UPDATE patient SET IDUSER='$user', PatJoin='$join', FNamePat='$FName', LNamePat='$LName', Location='$location',
			RoomNumber='$room', LocationStreet='$street', LocationCity='$city', LocationState='$state', LocationZip='$zip' 
			WHERE IDPATIENT='$patient'",$con) or die(mysql_error());
		if ($query)
		{
			header("Location:mainview.php");
		}
		 else
		 {
			echo "Not Added";
		}

		mysql_close($con);
		
		
	}
	
?>