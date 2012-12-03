<?php
	session_start();
	include 'dbstuff.php';
	require 'nav.php';
	echo "<br />";
	echo "New Patient<br />";
	require 'newpatient.htm';
	require 
	echo "<br />";
	
	if (!con) 
	{
		die ('could not connect');
	}
	else
	{
		if ($_SESSION['user'] >0)
		{
			echo "Patient: <br />";
			mysql_select_db($dbuser,$con);
			$IDUSER = $_SESSION['user'];
			$query = mysql_query("SELECT * FROM patient WHERE IDUSER = '$IDUSER'",$con) or die(mysql_error());
			echo "<form method='post' action='patpick.php'>"; 
			$rowsize = mysql_num_rows($query);
			echo "<select name='listbox' size='$rowsize'>";
			while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
			{
				echo "<option value='" . $row["IDPATIENT"] . "'>" . $row["FNamePat"] . " " . $row["LNamePat"] . "</option>";
			}
			echo "</select>";
			echo "<input type='submit' name='submit' value='Submit' /></form>";
			$qstatus = $_POST['listbox'];
			$_SESSION['Patient'] = $_POST['listbox'];
			$patient = $_SESSION['Patient'];

			echo "<br />Patient: " . $patient . "<br />";
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
			$query = mysql_query("SELECT * FROM status WHERE IDuser = '$IDUSER' and IDPatent = '$qstatus'",$con) or die(mysql_error());
//			echo "<br />qstatus " . $qstatus;
			while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
			{
				echo $row["Status"] . "<br />";
			}
			require "patinfo.htm";
			require "status.htm";
		}
		else
		{
			header("Location: index.php");
		}
	}	
	





?>