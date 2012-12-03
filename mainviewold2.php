<!DOCTYPE html PUBLIC "-W3C//DTD XTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/html">

<html>
<head>
	<script src="jquery.js"></script>
	<script type="text/javascript">
			$('#pat').load('nav.php');
	</script>
	
</head>
<body>
	<?php
		session_start();
		require 'nav.php';
		echo "<br />";	
		
		if ($_POST['listbox'] < 1)
		{
			echo "Please pick a patient";
		}
			$_SESSION['Patient'] = $_POST['listbox'];	

	//		echo "New Patient<br />";
	//		require 'newpatient.htm';
		//	require 'patpick.php';
	//		require_once "patinfo.php";
	//		require "statusshow.php";
	//		require "status.htm";

	?>	

	<div id="pat">
	</div>
</body>	
</html>
