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
		session_start();
		if ($_SESSION['user'] || ($_COOKIE['login'] == "1"))
		{
			header("Location:picker.php");
		}
	?>
	<div id="nav"></div>	
	<div id="left">
		<div id="mainnewuser"></div>
	</div> <!-- left -->


	<div id="across">
			<h2>Welcome to My Sick Friend</h2>			
			<div class="notp">
				<p>My Sick friend is a place where you can keep in touch with family and friends about the health status of a person who is sick.</P>
				<p>Often it's difficult for a primary care providor to update friends and family of the health of a sick person. My Sick Friend assists everyone in 
					keeping in touch with interested friends and family in a personal and private way.</p>
					<p>As a primary contact, set up an account and add a sick friend. We will assist you in sending invitation emails to whe people you want
						to see, and update information about your sick friend or family member.</p>
					<p>As a non-primary contact, create an account and enter the invite code from your email and you will be allowd to see the status 
						of your friend or family member and add posts.</p>
					<p>In the near future, We will add text messaing services that will allow you to text updates about from any cell phone with a texting plan.</p>
			</div>	<!-- notp -->
	</div> <!-- across -->

	<script type="text/javascript">
		$('#nav').load('indexnav.php');
		$('#mainnewuser').load('newuser.htm');
	</script>
</body>


</html>