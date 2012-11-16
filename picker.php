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
	
	<div id="left">
		<?php
			session_start();
			if ($_SESSION['name'])
			{
				echo "<h3 class='myname'>" . $_SESSION['name'] . "</h3>";
			}
		?>

		<div id="patpik"></div>
		<div id="newpat"></div>
	</div> <!-- left -->
	
	<div id="mid">
		<div id="patlink"></div>

	</div> <!-- mid -->
	
	<div id="right">
	</div> <!-- right -->

	<script type="text/javascript">
//		$('#nav').load('nav.php');
		$('#patpik').load('patpick.php');
		$('#patlink').load('patlink.htm');
	</script>	
	
	
</body>	
</html>
