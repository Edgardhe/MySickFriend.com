<?php

	session_start();
	include 'dbstuff.php';
	include 'Services/Twilio.php';
	include 'TxtMsgSecure.php';
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
		
			// Step 3: instantiate a new Twilio Rest Client
			$client = new Services_Twilio($AccountSid, $AuthToken);
			
			
			while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
			{
				$userid = $row["UserIDPERM"];
				$query2 = mysql_query("SELECT * FROM users WHERE IDUSER = '$userid'",$con) or die(mysql_error());
				$message = $_SESSION['name'] . " posted about " . $patname . "-" . $status;
				$to = mysql_result($query2,0,3);				
						$headers = 'From: info@CareAndTell.com' . "\r\n" .
							'Reply-To: info@CareAndTell.com' . "\r\n" .
							'X-Mailer: PHP/' . phpversion();							
				$maxmessage = 160;
				$emailtimes = 0;
				if (strlen($message) > $maxmessage)
				{
					$i = 0;
					
					$emailtimes = (floor(strlen($message) / $maxmessage));
					$chunkmessage = str_split($message,$maxmessage);					
					while ($i <= $emailtimes)
					{
				        $sms = $client->account->sms_messages->create("716-261-3316",$to,$chunkmessage[$i]);

//						mail($to, "update", $chunkmessage[$i], $headers);
						$i++;
					}
				}	
				else
				{
					$sms = $client->account->sms_messages->create($TwilioNumber,$to,$message);
//					mail("edgarhenderson@gmail.com", "update", $message, $headers);
//					echo $to . "<br />" . $message . "<br />" . $headers . "<br />";
				}			
				
			}
		}
		

		
		mysql_close($con);	
		header("Location:mainview.php");
	}

 
 
    // Step 4: make an array of people we know, to send them a message. 
    // Feel free to change/add your own phone number and name here.
//    $people = array(
//        "+14158675309" => "Curious George",
//        "+14158675310" => "Boots",
//        "+14158675311" => "Virgil",
//    );
 
    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
//    foreach ($people as $number => $name) {
 
//        $sms = $client->account->sms_messages->create("716-261-3316",$number,"Hey" . $name . ", Monkey Party at 6PM. Bring Bananas!");
 
        // Step 6: Change the 'From' number below to be a valid Twilio number 
        // that you've purchased, or the (deprecated) Sandbox number
             
 
            // the number we are sending to - Any phone number
            
 
            // the sms body
            
        
 
        // Display a confirmation message on the screen
 //       echo "Sent message to $name";
 //   }	
?>

