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

		<div id="patpik">
			<?php /************************  FOLLOWING **************************************/
				session_start();
				include 'dbstuff.php';
	//			require 'funpick.php';
				
				
				if (!con) 
				{
					die ('could not connect');
				}
				else
				{
					if ($_SESSION['user'] >0)
					{
						mysql_select_db($dbuser,$con);
						$IDUSER = $_SESSION['user'];
						$query = mysql_query("SELECT * FROM permissions  WHERE (UserIDPERM = '$IDUSER')",$con) or die(mysql_error());			
						echo "<form id='frmPatient' method='post' action='mainview.php'>"; 
						echo "<h3>Following</h3>";
						while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
						{
							$patpermid = $row['PatIDPERM'];
							$query2 = mysql_query("SELECT * FROM patient WHERE IDPATIENT = '$patpermid'",$con) or die(mysql_error());
							$row2 = mysql_fetch_array($query2, MYSQL_ASSOC);
							echo "<button class='patBtn' name='listbox' value='" . $row2["IDPATIENT"] . "'>" . $row2["FNamePat"] . " " . $row2["LNamePat"] . " </button>";
						}
						mysql_close($con);
						echo "</form>";
					}
				}	
				?>  		
		</div> <!-- patpick -->
		
		<div id="newpat"></div>
		<div id="patlink"></div>
	</div> <!-- pvleft -->
	
	<div id="mid">


	</div> <!-- mid -->
	
	<div id="right">
	</div> <!-- right -->

	<script type="text/javascript">
//		$('#nav').load('nav.php');
//		$('#patpik').load('patpick.php');
		$('#patlink').load('patlink.htm');
	</script>	
	
	
</body>	
</html>
