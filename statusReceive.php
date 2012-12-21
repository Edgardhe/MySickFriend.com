<?php

	session_start();
	include 'dbstuff.php';
	include 'NexmoMessage.php';
	include 'TextMsgSecure.php';
	
	
     $sms = new NexmoMessage($nexmo_key, $nexmo_secret);
     if ($sms->inboundText()) {
         $sms->reply('You said: ' . $sms->text);
    
     
     $nexmo_sms = new NexmoMessage($nexmo_key, $nexmo_secret);
     $info = $nexmo_sms->sendText('+17169391781', "+17162474334", "hello");
 	}
?>