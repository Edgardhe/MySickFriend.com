<?php

	session_start();
	include 'dbstuff.php';
	mysql_select_db($dbuser,$con);
	if (!$con) { 
		die(' Could no connect');
	}
	Else {	

		$user = $_SESSION['user'];
		$patient = $_SESSION['Patient'];
		$status = mysql_real_escape_string($_POST["status"]); 
		$name = $_SESSION['name'];
		$query = "INSERT INTO status (IDuser, IDPatient, Status, STATUSname) VALUES ('$user', '$patient', '$status', '$name')";
		if (!mysql_query($query,$con))
		{
			die('Error: ' . mysql_error());
		}
		

		$query = mysql_query("SELECT * FROM permissions WHERE PatIDPERM = '$patient'",$con) or die(mysql_error());
		if (mysql_num_rows($query)>=1)
		{
			$query3 = mysql_query("SELECT * FROM patient WHERE IDPATIENT ='$patient'",$con) or die(mysql_error());
			$patname = mysql_result($query3,0,3) . " " . mysql_result($query3,0,4);
			while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
			{
				$userid = $row["UserIDPERM"];
				$query2 = mysql_query("SELECT * FROM users WHERE IDUSER = '$userid'",$con) or die(mysql_error());
				$message = $_SESSION['name'] . " posted about " . $patname . "-" . $status;
				$to = mysql_result($query2,0,3) . "@" . mysql_result($query2,0,4);				
				$headers = 'From: info@CareAndTell.com';								
				$maxmessage = 120;
				$emailtimes = 0;
				if (strlen($message) > $maxmessage)
				{
					$i = 0;
					
					$emailtimes = (floor(strlen($message) / $maxmessage));
					$chunkmessage = str_split($message,$maxmessage);					
					while ($i <= $emailtimes)
					{
						mail($to, $subject, $chunkmessage[$i], $headers);
						$i++;
					}
				}	
				else
				{
					mail($to, $subject, $message, $headers);
//					echo $to . "<br />" . $message . "<br />" . $headers . "<br />";
				}			
				
			}
		}
		
		
		
		mysql_close($con);	
		header("Location:mainview.php");
	}
	
	
?>

