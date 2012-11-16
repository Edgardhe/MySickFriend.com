<?php
	session_start();
	include 'dbstuff.php';
	require 'funpick.php';

	
	if (!con) 
	{
		die ('could not connect');
	}
	else
	{
		if ($_SESSION['user'] >0)
		{
			mysql_select_db($dbuser,$con);
			$IDUSER = $_SESSION['user'];
//			$query = mysql_query("SELECT * FROM patient WHERE IDUSER = '$IDUSER'",$con) or die(mysql_error());
			$query = mysql_query("SELECT * FROM permissions  WHERE (UserIDPERM = '$IDUSER')",$con) or die(mysql_error());			
			echo "<h3>Patient</h3>";
			echo "<form method='post' action='mainview.php'>"; 
			$rowsize = mysql_num_rows($query);
			
			echo "<select name='listbox' size='$rowsize'>";
			while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
			{
				$patpermid = $row['PatIDPERM'];
				$query2 = mysql_query("SELECT * FROM patient WHERE IDPATIENT = '$patpermid'",$con) or die(mysql_error());
				$row2 = mysql_fetch_array($query2, MYSQL_ASSOC);
				echo "<option value='" . $row2["IDPATIENT"] . "'>" . $row2["FNamePat"] . " " . $row2["LNamePat"] . "</option>";
			}
			echo "</select>";
			mysql_close($con);
			echo "<input class='submit' type='submit' name='submit' value='Submit' /></form></div>";
		}
		else
		{
			header("Location: login.php");
		}
	}	
	





?>