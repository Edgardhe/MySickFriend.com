<?php
	session_start();
	if (!$_POST['followers'])
	{
		echo "<p>Sorry! There seems to be an error. Click <a href='index.php' />here</a> redirected to the your account.</p>";
		header('Refresh: 10; URL=mainview.php');
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
					$i=0;
					foreach ($allFollowers as &$toValue)
					{			
						$patname = mysql_result($query,0,3) . " " . mysql_result($query,0,4);
						$invitation = mysql_result($query,0,1);
						$to      = $toValue;
						$subject = 'CareAndTell.com Invitation';
						$message = "You have been invited by " . $name . " to follow the health status of " . $patname . " at CareAndTell.com  \r\n " .
										"\r\nCareAndTell.com is a place where you can keep in touch about sick loved ones easily. If you\'ve been a primary care giver, then you know that " .
										"after a long day, its difficult to make all those phone calls to friends and relatives to let them know what happened that day. \r\n" .
										"\r\n CareAndTell.com wases that pressure by allowing you to update all of you friends and family with a simple text message or by " .
										"logging into your CareAndTell.com account and updating on the web. \r\n" .
										"CareAndTell.com then sends out an email or text message to your friends and family. Simple. \r\n" .
										"The process to get started only takes three easy steps: \r\n." .
										"1. Create an account  \r\n " .
										"2. Log into your new account  \r\n " .
										"3 Copy the invitation code from this email and paste it into the form that asks you to paste text from invitaion   \r\n " .
										"Invitation code: ". $invitation . 
										"\r\n \r\n" . 
										"This email is genterated automaticly. Please do no reply to this email. \r\n Thank you.";
						$headers = 'From: info@CareAndTell' . "\r\n" .
							'Reply-To: edgar@hendersonit.net' . "\r\n" .
							'X-Mailer: PHP/' . phpversion();
						ini_set ( "SMTP", "relay-hosting.secureserver.net" ); 
						date_default_timezone_set('America/New_York');
						if (!mail($to, $subject, $message, $headers))
						{
							$fail[$i] = $to;
							$i++;
						}
					}
					if ($i>0)
					{
						$_SESSION['failedInvite'] = $fail;
					}
				}
			mysql_close($con);	
			header("Location:invitethanks.php");
		}
	}
	
?>	