<?php
	include 'dbstuff.php';
	require 'secure.php';
	if (!$con) { 
		die(' Could no connect');
	}
	Else {
//		CLEAN AND RENAME $_POST VALUES FROM NEWUSER.HTM	
		$FName = mysql_real_escape_string($_POST["FName"]);
		$LName = mysql_real_escape_string($_POST["LName"]);
		$PhoneNum = mysql_real_escape_string($_POST["PhoneNum"]);
		$EMail = mysql_real_escape_string($_POST["EMail"]);
		$password = mysql_real_escape_string($_POST["Password"]);
		$carrier = mysql_real_escape_string($_POST["Carrier"]);
		  
//		ENCRYPT PASSWORD FOR STORAGE		
		$password = scramble($password);
//		echo "first " . $FName . "<br />";
//		echo "last " . $LName . "<br />";
//		echo "email " . $EMail . "<br />";
//		echo "password " . $password . "<br />";

//		CHECK IF USER NAME / EMAIL IS ALREADY USED		
		mysql_select_db($dbuser, $con);
		$query = mysql_query("SELECT * from users WHERE email = '$EMail'",$con) or die(mysql_error());
		if (mysql_num_rows($query) > 0)
		{
			// SHOW TO LOGIN FORM
			require "nav.php";
			echo "Account already exists.";
			echo "<br />Login<br />";
			require "login.htm";
		}
		else
		{
			// PUT THE NEW USER INTO DATABASE
			$query = "INSERT INTO users (FirstName, LastName, PhoneNum, Carrier, email, password) VALUES ('$FName', '$LName', '$PhoneNum', '$carrier', '$EMail', '$password')";
			if (!mysql_query($query,$con))
			{
				die('Error: ' . mysql_error());
			}
			else
			{
				$query = mysql_query("SELECT * from users WHERE email = '$EMail'",$con) or die(mysql_error());
				// SET $_SESSION[USER]
				$_SESSION['user'] = mysql_result($query,0);
//				echo "userID " . $_SESSION['user'];
//				$user = $_SESSION['user'];
			}
//			echo "1 record added";
			mysql_close($con);		
			header("Location:login.htm");
		}
		
	}
	
?>