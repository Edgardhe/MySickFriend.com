<?php

	session_start();
	include 'dbstuff.php';
	include 'NexmoMessage.php';
	include 'TextMsgSecure.php';
	date_default_timezone_set('America/New_York');
	mysql_select_db($dbuser,$con);	
	
    $sms = new NexmoMessage($nexmo_key, $nexmo_secret);
    if ($sms->inboundText())
    {
		$phone = substr($sms->from,-10);
		$status = $sms->text;
		
		// UPDATE THE STATUS IN THE STATUS TABLE
		$query = mysql_query("SELECT * FROM users WHERE PhoneNum = '$phone'") or die(mysql_error());
		$user = mysql_result($query,0,0);
		$name = mysql_result($query,0,1) . " " . mysql_result($query,0,2);
		$query2 = mysql_query("SELECT * from permissions WHERE UserIDPERM = '$user' and PermType ='1'") or die(mysql_error());
		$patient = mysql_result($query2,0,2);
		mysql_query("INSERT INTO status (IDuser, IDPatient, Status, STATUSname) VALUES ('$user', '$patient', '$status', '$name')") or die(mysql_error());
		
		
		//SEND OUT THE STATUS TO FOLLOWERS
		$query = mysql_query("SELECT * FROM permissions WHERE PatIDPERM = '$patient'",$con) or die(mysql_error());
		if (mysql_num_rows($query)>=1)
		{
			$query3 = mysql_query("SELECT * FROM patient WHERE IDPATIENT ='$patient'",$con) or die(mysql_error());
			$patname = mysql_result($query3,0,3) . " " . mysql_result($query3,0,4);
		
			$nexmo_sms = new NexmoMessage($nexmo_key, $nexmo_secret);
			
			while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
			{
				$userid = $row["UserIDPERM"];
				$query2 = mysql_query("SELECT * FROM users WHERE IDUSER = '$userid'",$con) or die(mysql_error());
				$message = $name . " posted about " . $patname . "-" . $status;
				$to = "+1" . mysql_result($query2,0,3);											

					$info = $nexmo_sms->sendText($to, "+17162474334", $message);
			
				
			}
		}	
	
	
	
	
	
	}
 
 
 	
?>