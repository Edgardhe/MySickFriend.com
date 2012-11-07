<?php
	session_start();
	if (!$_SESSION['followers'])
	{
		echo "<p>Sorry! There seems to be an error. Click <a href='index.php' />here</a> redirected to login again.</p>";

	} else 
	{
		include 'dbstuff.php';
		mysql_select_db($dbuser,$con);
		if (!$con) { 
			die(' Could no connect');
		}
		Else {	
			$followers = $_POST['followers'];
			$user = $_SESSION['user'];
			$patient = $_SESSION['Patient'];
			$name = $_SESSION['name'];
			$query = mysql_query("SELECT * FROM patient WHERE IDPATIENT = '$patient'",$con) or die(mysql_error());
			
			$allFollowers = explode(";",$followers);			
			
				if ($query)
				{
					foreach ($allFollowers as &$toValue)
					{			
						$patname = mysql_result($query,0,3) . " " . mysql_result($query,0,4);
						$invitation = mysql_result($query,0,1);
						$to      = $toValue;
						$subject = 'My Sick Friend Invitation';
						$message = 'You have been invited by ' . $name . ' to follow the health status of ' . $patname . ' at MySickFriend.com  \r\n ' .
										'MySickFriend is a place where you can keep track of how blah blah blah  \r\n ' .
										'1. Create an account  \r\n ' .
										'2. Log into your new account  \r\n '.
										'2. Copy the invitation code from this email and paste it into the form that asks you to paste text from invitaion   \r\n ' .
										'Invitation code: '. $invitation;
						$headers = 'From: edgar@hendersonit.net' . "\r\n" .
							'Reply-To: edgar@hendersonit.net' . "\r\n" .
							'X-Mailer: PHP/' . phpversion();
						ini_set ( "SMTP", "relay-hosting.secureserver.net" ); 
						date_default_timezone_set('America/New_York');
						echo "followers ". $to . "<br />user " . $user . "<br/>patient " . $patient . "<br/>name " .$name . "<br/>patname " . $patname . "<br/>invitation " . $invitation . "<br />";

						mail($to, $subject, $message, $headers);	
				
					}
				}
			mysql_close($con);	
	//		header("Location:mainview.php");
		}
	}
	
?>

		

		