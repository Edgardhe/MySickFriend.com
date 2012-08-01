<?php
	session_start();
	include 'dbstuff.php';
	mysql_select_db($dbuser,$con);
	$patient = $_SESSION['Patient'];
	$query = mysql_query("SELECT * FROM patient WHERE IDPATIENT = '$patient'",$con) or die(mysql_error());
	while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
	{
		echo "<div id='patinfo'><h2>" . $row["FNamePat"] . " " . $row ["LNamePat"] . "</h2>" .
			"<p><span class='vspace'><span class='textlab'>Facility: </span>" . $row["Location"] . "</span><br />" . 
			"<span class='vspace'><span class='textlab'>Room Number: </span>" . $row["RoomNumber"] . "</span><br />" .
			"<span class='vspace'><span class='textlab'>Street: </span>" . $row["LocationStreet"] . "</span><br />" .
			"<span class='vspace'><span class='textlab'>City: </span>" . $row["LocationCity"] . "</span><br />" .
			"<span class='vspace'><span class='textlab'>State: </span>" . $row["LocationState"] . "</span><br />" .
			"<span class='vspace'><span class='textlab'>Zip: </span>" . $row["LocationZip"] . "</span></p></div>";
	}
	mysql_close($con);
?>
