<html>

<?php
	session_start();
	include 'dbstuff.php';
	mysql_select_db($dbuser,$con);
	$patient = $_SESSION['Patient'];
	$query = mysql_query("SELECT * FROM patient WHERE IDPATIENT = '$patient'",$con) or die(mysql_error());
	while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
	{
		$fname = $row["FNamePat"];
		$lname = $row ["LNamePat"];
		$location = $row["Location"];
		$rnumber = $row["RoomNumber"];
		$street = $row["LocationStreet"];
		$city = $row["LocationCity"];
		$state =  $row["LocationState"];
		$zip = $row["LocationZip"];
	}

		mysql_close($con);	
		echo"<div id='newpat'> " .
		"<form class='testpat' action='patienteditupdate.php' method='post' enctype='multipart/form-data'>" .	
		"<div id='newpat'><p>" .
		"<label for='FName'>First Name:</label>" .
		"<input type='text' name='FName' id='FName' value='$fname'/> <br />" .
		
		"<label for='LName'>Last Name:</label>" .
		"<input type='text' name='LName' id='Name' value='$lname'/> <br />" .
		
		"<label for='Location'>Location:</label>" .
		"<input type='text' name='Location' id='Location' value='$location'/> <br />" .
		
		"<label for='RoomNumber'>Room Number:</label>" .
		"<input type='text' name='RoomNumber' id='RoomNumber' value='$rnumber'/> <br />" .
		
		"<label for='LocationStreet'>Street:</label>" .
		"<input type='text' name='LocationStreet' id='LocationStreet' value='$street'/> <br />" .
		
		"<label for='LocationCity'>City:</label>" .
		"<input type='text' name='LocationCity' id='LocationCity' value='$city'/> <br />" .
	
		"<label for='LocationState'>State:</label>" .
		"<input type='text' name='LocationState' id='LocationState' value='$state'/> <br />" .

		"<label for='LocationZip'>Zip:</label>" .
		"<input type='text' name='LocationZip' id='LocationZip' value='$zip'/> <br />" .
		
		"<input type='submit' name='submit' value='Update Patient's status' />" .
		"</p></div></div>" .
		"</form><br /><br />" 

		
?>			
</html>



