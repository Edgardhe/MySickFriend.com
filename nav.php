<http>
	<img src="images/title.jpg" id ="title" />
	<ul>
		<li><a href='index.php'>home</a></li>
		<li><a href='logout.php'>logout</a></li>
	</ul>
	<?php
		session_start();
		if ($_SESSION['name'])
		{
			echo "<h3 class='myname'>" . $_SESSION['name'] . "</h3>";
		}
	?>
</http>