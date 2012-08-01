<?php
		require 'dbstuff.php';
		date_default_timezone_set('America/New_York');
		mysql_select_db($dbuser,$con);		
		session_start();		
		$patient = $_SESSION['Patient'];
		$IDUSER = $_SESSION['user'];
		if (!$patient)
		{
			header("Location:mainview.php");
		}
		else
		{
			$query2 = mysql_query("SELECT * FROM status WHERE IDPatient = '$patient' ORDER BY DateCreate DESC",$con) or die(mysql_error());
			while ($row = mysql_fetch_array($query2, MYSQL_ASSOC))
			{
				$create = $row['DateCreate'];
				echo  "<div id='status'><p><span id='name'>" . $row["STATUSname"] . "</span><span id='date'> " . date('D M y g:ia T', strtotime($create) + 3 * 3600) . "</span></p>";
				echo "<div id='message'><p>" . $row["Status"] . "</p></div></div>";
			}
		}
		mysql_close($con);


?>