<http>
	
	<style type="text/css">
		body {width: 100%;}
		
		li {display: inline;
			width: 100%;
			border-left: 1px solid black;
			border-right: 1px solid black;
		}
		
		a {color: white;}
		
		.navlist {padding: 3px 5px 3px 5px;}
	</style>
	<body>
	<img src="images/title.jpg" id ="title" />
	<ul>
		<li><span class="navlist"><a href='index.php'>HOME</a></span></li>
		<li><span class="navlist"><a href='logout.php'>LOGOUT</a></span></li>
		<li><span class="navlist"><a href='newpatient.htm'>NEW PATIENT</a></span></li>
	</ul>
	<?php
		session_start();
		if ($_SESSION['name'])
		{
			echo "<h3 class='myname'>" . $_SESSION['name'] . "</h3>";
		}
	?>
	</body>
</http>