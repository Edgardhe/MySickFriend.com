<!DOCTYPE html PUBLIC "-W3C//DTD XTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/html">

<html>
<head>
	<script type="text/javascript" src="Jquery.js"></script>
<link rel="stylesheet" type-"text/css"
	href="style.css" media="screen" />

</head>
<body>
	<?php
		if  (!$_COOKIE["login"] == "1")
		{
			header("Location:login.htm");
		}
	?>
	
	<div id="nav"></div>
	
	<div id="left">


		<div id="patpik"></div>
		<div id="newpat"></div>
	</div>
	<div id="mid">
		<div id="patlink"></div>

	</div>
	<div id="right">
	</div>

	<script type="text/javascript">
		$('#nav').load('nav.php');
		$('#patpik').load('patpick.php');
		$('#patlink').load('patlink.htm');
		$('#newpat').load('newpatient.htm');
	</script>	
	
	
</body>	
</html>
