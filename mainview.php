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
		
		if ($_POST['listbox'])
		{
			$_SESSION['Patient'] = $_POST['listbox'];
		}
			
	?>
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

				<li><span class="navlist"><?php
					session_start();
					include 'dbstuff.php';
					require 'funpick.php';
				
					
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
							echo "<form method='post' style='display:inline;' action='mainview.php'>"; 
							echo "<select name='listbox'>";
							while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
							{
								$patpermid = $row['PatIDPERM'];
								$query2 = mysql_query("SELECT * FROM patient WHERE IDPATIENT = '$patpermid'",$con) or die(mysql_error());
								$row2 = mysql_fetch_array($query2, MYSQL_ASSOC);
								echo "<option value='" . $row2["IDPATIENT"] . "'>" . $row2["FNamePat"] . " " . $row2["LNamePat"] . "</option>";
							}
							echo "</select>";
							mysql_close($con);
							echo "<input class='submit' type='submit' name='submit' value='Submit' /></form>";
						}
					}	
				?></span></li>
				<li><span class="navlist"><a href='index.php'> | HOME |</a></span></li>
				<li><span class="navlist"><a href='logout.php'> LOGOUT |</a></span></li>
				<li><spanclass="navlist"><a  id="btnNewPat" href='newpatient.htm'> NEW PATIENT |</a></span></li>
			</ul>
		</div> <!-- navright -->	
	</div> <!-- nav -->

	<div id="mvsidenav">
		<div id="invite" class="clicked"></div>	
<!--		<button class="sidebutton" type="button">Invite Followers</button><br />
		<button class="sidebutton" type="button">New Patient</button> -->
		<button class="sidebutton" id="butinvite" type="button">Invite Followers</button>
<!--		<button class="sidebutton" id="butswitch" type="button">Switch Patients</button> -->
		<h3>Followed by</h3>
		<div id="follow">
			<?php
		
				require 'dbstuff.php';
				date_default_timezone_set('America/New_York');
				mysql_select_db($dbuser,$con);		
				session_start();		
				$patient = $_SESSION['Patient'];
				$IDUSER = $_SESSION['user'];
				$name = $_SESSION['name'];
				if (!$patient)
				{
					header("Location:mainview.php");
				}
				else
				{
					$query = mysql_query("SELECT * FROM permissions WHERE PatIDPERM = '$patient'",$con) or die(mysql_error());
					if (mysql_num_rows($query)>=1)
					{
						echo "<p>";
						while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
						{
							$userid = $row["UserIDPERM"];
							$query2 = mysql_query("SELECT * FROM users WHERE IDUSER = '$userid'",$con) or die(mysql_error());
							$name = mysql_result($query2,0,1) . " " . mysql_result($query2,0,2);
							echo $name . "<br />";
							
						}
						echo "</p>";
					}
					else
					{
						echo "No followers yet. Send some invites.";
					}
				}
				mysql_close($con);
			?>		
		</div>	<!-- follow -->
	</div> <!-- mvsidenav -->
	
	<div id="mvshowhide">
	</div> <!-- mvshowhide -->
	
	<div id="mvleft">
		<div id="patinfo">
			<?php
				session_start();
				include 'dbstuff.php';
				mysql_select_db($dbuser,$con);
				$patient = $_SESSION['Patient'];
				$query = mysql_query("SELECT * FROM patient WHERE IDPATIENT = '$patient'",$con) or die(mysql_error());
				while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
				{
					echo "<div id='patinfo'><h2>" . $row["FNamePat"] . " " . $row ["LNamePat"] . "</h2>" .
						"<p><span class='vspace'><span class='textlab'>Facility: </span>" . $row["Location"] . "</span><br />" . 
						"<span class='vspace'><span class='textlab'>Room Number: </span>" . $row["RoomNumber"] . "</span><br />" .
						"<span class='vspace'><span class='textlab'>Street: </span>" . $row["LocationStreet"] . "</span><br />" .
						"<span class='vspace'><span class='textlab'>City: </span>" . $row["LocationCity"] . "</span><br />" .
						"<span class='vspace'><span class='textlab'>State: </span>" . $row["LocationState"] . "</span><br />" .
						"<span class='vspace'><span class='textlab'>Zip: </span>" . $row["LocationZip"] . "</span></p></div>";
				}
				mysql_close($con);
			?>		
			<button id="patedit" type="button">Edit Patient</button>
		</div> <!-- patinfo -->
		

	</div> <!-- mvleft -->
	

		

<!--	<div id="newpat" class="clicked"></div> -->
	
	
	<div id="mvright">
	
		<div id="statform"></div>
		<div id="statuses"></div>
	</div> <!-- mvright -->

	<script type="text/javascript">
		$('#invite').load('invite.htm');
//		$('#patinfo').load('patinfo.php');
//		$('#nav').load('nav.php');
//		$('#follow').load('followers.php');
//		$('#patpik').load('patpick-alt2.php');
		$('#statuses').load('statusshow.php');
		$('#statform').load('status.htm');
//		$('#patedit').click(function(){
//							$('#patinfo').empty();
//							$('#patinfo').load('patedit.php');});
//		$('#mvshowhide').hide();
		$('#invite').hide();
		$('#butinvite').click(function(){
			$('#invite').show();});
//		$('#patpik').hide();
//		$('#butswitch').click(function(){
//			$('#mvshowhide').show();
//			$('#patpik').show();});
		$('#btnCancel').click(function(){
			$('#invite').hide();});
	</script>		
	
</body>	
</html>

