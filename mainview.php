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


				<li><span class="navlist"><a href='index.php'> | HOME |</a></span></li>
				<li><span class="navlist"><a href='logout.php'> LOGOUT |</a></span></li>
				<li><spanclass="navlist"><a  id="btnNewPat" href='newpatient.htm'> NEW PATIENT |</a></span></li>
			</ul>
		</div> <!-- navright -->	
	</div> <!-- nav -->

	<div id="mvsidenav">
		<button class="sidebutton" type="button">Invite Followers</button><br />
		<button class="sidebutton" type="button">New Patient</button>
		<button class="sidebutton" id="butinvite" type="button">Invite Followers</button>
		<button class="sidebutton" id="butswitch" type="button">Switch Patients</button>
		<div id="follow"></div>	
	</div> <!-- mvsidenav -->
	
	<div id="mvshowhide">
		<div id="patpik"></div> <!-- patpick -->

		<div id="invite" class="clicked"></div>	
	</div> <!-- mvshowhide -->
	
	<div id="mvleft">
		<div id="patinfo"></div>
		<button id="patedit" type="button">Edit Patient</button>

	</div> <!-- mvleft -->
	

		

<!--	<div id="newpat" class="clicked"></div> -->
	
	
	<div id="mvright">
	
		<div id="statform"></div>
		<div id="statuses"></div>
	</div> <!-- mvright -->

	<script type="text/javascript">
		$('#invite').load('invite.htm');
		$('#patinfo').load('patinfo.php');
//		$('#nav').load('nav.php');
		$('#follow').load('followers.php');
		$('#patpik').load('patpick.php');
		$('#statuses').load('statusshow.php');
		$('#statform').load('status.htm');
		$('#patedit').click(function(){
							$('#patinfo').empty();
							$('#patinfo').load('patedit.php');});
		$('#mvshowhide').hide();
		$('#invite').hide();
		$('#butinvite').click(function(){
			$('#mvshowhide').show();
			$('#invite').show();});
		$('#patpik').hide();
		$('#butswitch').click(function(){
			$('#mvshowhide').show();
			$('#patpik').show();});
	</script>		
	
</body>	
</html>

