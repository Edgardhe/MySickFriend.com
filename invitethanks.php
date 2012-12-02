<html>	
<head>

	
<link rel="stylesheet" type-"text/css"
	href="style.css" media="screen" />

</head>	
<body>	
	<div id="nav">
		<div id="navleft">
			<h3 class='myname'><img src="images/title.jpg" id ="title" />
		<?php
			session_start();
			if ($_SESSION['name'])
			{
				echo  $_SESSION['name'] . "</h3>";
			}
		?>
		</div> <!-- navleft -->
		
		<div id="navright">
		<ul>

				<li><span class="navlist"><a href='index.php'> | HOME |</a></span></li>
				<li><span class="navlist"><a href='logout.php'> LOGOUT |</a></span></li>
				<li><spanclass="navlist"><a  id="btnNewPat" href='newpatient.htm'> NEW PATIENT |</a></span></li>
			</ul>
		</div> <!-- navright -->	
	</div> <!-- nav -->
	<div id="mcleft">
		<h3>Thanks!</h3>
		<p>Your invitations have been sent!</p>
	</div> <!-- mvleft -->
	<div id="mvright">
		<?php
			session_start();
			if (array_key_exists('failedInvite',$_SESSION) && !empty($_SESSION['failedInvite']))
			{
				echo "<div name='fail'><h3>OOPS</h3><p>Some of the emails didn't go through!</p><br />";
				echo "<p>emails to:</p>";
				foreach ($_SESSION['failedInvite'] as $key=>$value)
				{
					echo "<p>" . $value . "</p>";
				}
				echo "<p>Were not sent. Please check the address(es) and send again.Thank you.</p>";
				unset($_SESSION['failedInvite']);
			}
				
		?>
	</div> <!-- mvright -->
	<button class='submit' onClick="location.href='mainview.php'">back</button>
</body>	


</html>