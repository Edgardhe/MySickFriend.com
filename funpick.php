<?php
	
	function funstatus()
	{
		require 'dbstuff.php';
		mysql_select_db($dbuser,$con);		
		session_start();		
		echo "<br /> funstatusr<br />";
		$patient = $_SESSION['Patient'];
		$IDUSER = $_SESSION['user'];
		echo "<br />Patient: " . $patient . "<br />User: " . $IDUSER;
		$query = mysql_query("SELECT * FROM status WHERE IDuser = '$IDUSER' and IDPatient = '$patient'",$con) or die(mysql_error());
//			echo "<br />qstatus " . $qstatus;
		while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
		{
			echo $row["Status"] . "<br />";
		}		
		mysql_close($con);
	}

	
	function funpickpat()
	{
		session_start();

		
	}

	function funinfo()
	{
		session_start();
		require 'dbstuff.php';
		mysql_select_db($dbuser,$con);
		$patient = $_SESSION['Patient'];
		echo "------------> " . $patient . "<br />";
//		break;
//		echo "<br />Patient: " . $patient . "<br />";
		$query = mysql_query("SELECT * FROM patient WHERE IDPATIENT = '$patient'",$con) or die(mysql_error());
		while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
		{
			echo $row["FNamePat"] . " " . $row ["LNamePat"] . "<br />" .
				"Facility " . $row["Location"] . "<br />" . 
				"Room Number " . $row["RoomNumber"] . "<br />" .
				"Street " . $row["LocationStreet"] . "<br />" .
				"City " . $row["LocationCity"] . "<br />" .
				"State " . $row["LocationState"] . "<br />" .
				"Zip " . $row["LocationZip"] . "<br />";
		}
		$_SESSION['Patient'] = $patient;
		mysql_close($con);
	}
?>