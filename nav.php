<!DOCTYPE html PUBLIC "-W3C//DTD XTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/html">

<http>
	<div id="navleft">
		<img src="images/title.jpg" id ="title" />
		<?php
			session_start();
			if ($_SESSION['name'])
			{
				echo "<h3 class='myname'>" . $_SESSION['name'] . "</h3>";
			}
		?>
	</div> <!-- navleft -->
	
	<div id="navright">
		<ul>
			<li><span class="navlist"><a href='index.php'>HOME</a></span></li>
			<li><span class="navlist"><a href='logout.php'>LOGOUT</a></span></li>
			<li><span class="navlist"><a href='newpatient.htm'>NEW PATIENT</a></span></li>
		</ul>
	</div> <!-- navright -->
	

</http>