<!DOCTYPE html PUBLIC "-W3C//DTD XTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/html">

<html>
<head>
	<script type="text/javascript" src="Jquery.js"></script>	
	<script type="text/javascript">
		$(document).ready(function(){			
		});
	</script>
	
<link rel="stylesheet" type-"text/css"
	href="style.css" media="screen" />
	<?php
		session_start();
		echo "<br />";	
		
		if ($_POST['listbox'])
		{
			$_SESSION['Patient'] = $_POST['listbox'];
		}
			
	?>
</head>
<body>
	<div id="left">
		<div id="nav"></div>
		<h3>choose patient</h3>
		<div id="patpik"></div>
		<h3 class="clicker">add a new patient</h3>
		<div id="newpatient" class="clicked"></div>
		<h3 class="clicker">link to an existing patient</h3>
		<div id="patlink" class="clicked"></div>
	</div>
	<div id="mid">
		<div id="patinfo"></div>
		<button id="patedit" type="button">Edit Patient</button>
		<h3>Followed by</h3>
		<div id="follow"></div>
		<h3 class="clicker">Invite followers</h3>
		<div id="invite" class="clicked"></div>
	</div>
	<div id="right">
		<div id="statform"></div>
		<div id="statuses"></div>
	</div>

	<script type="text/javascript">
		$('#invite').load('invite.htm');
		$('#patinfo').load('patinfo.php');
		$('#nav').load('nav.php');
		$('#follow').load('followers.php');
		$('#patpik').load('patpick.php');
		$('#statuses').load('statusshow.php');
		$('#statform').load('status.htm');
		$('#patlink').load('patlink.htm');
		$('#newpatient').load('newpatient.htm');
		
//		$('.clicked').hide();
//		$('.clicker').click(function(){$(this).next().toggle("slow");});
		
		$('#patedit').click(function(){$('#patinfo').load('patedit.php'); $('#patedit').hide();});
	</script>		
	
</body>	
</html>
