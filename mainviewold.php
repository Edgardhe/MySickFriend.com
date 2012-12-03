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
//		require "patinfo.php";
//		require "statusshow.php";
//		require "status.htm";
?>
