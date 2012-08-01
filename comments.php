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
			$query = mysql_query("SELECT * FROM comments WHERE IDPatient = '$patient' ORDER BY DateCreate DESC",$con) or die(mysql_error());
			if (mysqk_num_rows($query)>0)
			{
				while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
				{
					$create = $row['DateCreate'];
					echo  "<div id='comment'><p><span id='name'>" . $row["Name"] . "</span><span id='date'> " . date('D M y g:ia T', strtotime($create) + 3 * 3600) . "</span></p>";
					echo "<div id='message'><p>" . $row["Comment"] . "</p></div></div>";
				}
			}
		}
		mysql_close($con);









?>

</html>