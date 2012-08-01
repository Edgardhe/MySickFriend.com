<html>

<?php

		require 'dbstuff.php';
		date_default_timezone_set('America/New_York');
		mysql_select_db($dbuser,$con);		
		session_start();		
		$patient = $_SESSION['Patient'];
		$IDUSER = $_SESSION['user'];
		$name = $_SESSION['name'];
		if (!$patient)
		{
			header("Location:mainview.php");
		}
		else
		{
			$query = mysql_query("SELECT * FROM permissions WHERE PatIDPERM = '$patient'",$con) or die(mysql_error());
			if (mysql_num_rows($query)>1)
			{
				echo "<div id='follower'><p>";
				while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
				{
					$userid = $row["UserIDPERM"];
					$query2 = mysql_query("SELECT * FROM users WHERE IDUSER = '$userid'",$con) or die(mysql_error());
					$name = mysql_result($query2,0,1) . " " . mysql_result($query2,0,2);
					echo $name . "<br />";
					
				}
				echo "</p><div />";
			}
			else
			{
				echo "No followers yet. Send some invites.";
			}
		}
		mysql_close($con);









?>

</html>