<!DOCTYPE html PUBLIC "-W3C//DTD XTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/html">
		
	<head>
		<script type="text/javascript" src="Jquery.js"></script>
		<link rel="stylesheet" type-"text/css"
			href="style.css" media="screen" />
		
	</head>
	<body>
		<div id="nav">
			<div id="navleft">
				<img src="images/title.jpg" id ="title" />
			</div> <!-- navleft -->
			
			<div id="navright">
				<ul>
					<li><span class="navlist"><a href='index.php'> | HOME |</a></span></li>
					<li><span class="navlist"><a href='logout.php'> LOGOUT |</a></span></li>
					<li><spanclass="navlist"><a  id="btnNewPat" href='newpatient.htm'> NEW PATIENT |</a></span></li>
				</ul>
			</div> <!-- navright -->	
		
		</div> <!-- nav -->
		
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
		//			require "nav.php";
					echo "<h4>Sorry, The email address you entered is already in use. Pleas login or click on gome to create a new account.</h4>";
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
	</body>
</html>