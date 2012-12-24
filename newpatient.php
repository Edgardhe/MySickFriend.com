<!DOCTYPE html PUBLIC "-W3C//DTD XTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/html">


<head>
	<script type="text/javascript" src="Jquery.js"></script>	

	
	<link rel="stylesheet" type-"text/css"
		href="style.css" media="screen" />

</head>
<body>
 
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
				echo  "<h3 class='myname'>" . $_SESSION['name'] . "</h3>";
			}
		?>
 
      <h2>Add an new Patient</h2> 
      <div id="newpat"> 
        <form enctype="multipart/form-data" method="post" action="newpatientP.php" class="testpat"> 
          <div id="newpat">
            <p> <label for="FName">First Name</label> 
            <input id="FName" name="FName" type="text" /> <br /> 
            <label for="LName">Last Name</label> 
            <input id="LName" name="LName" type="text" /> <br /> 
            <label for="Location">Location</label> 
            <input id="Location" name="Location" type="text" /> <br /> 
            <label for="RoomNumber">Room Number</label> 
            <input id="RoomNumber" name="RoomNumber" type="text" /> <br /> 
            <label for="LocationStreet">Street</label> 
            <input id="LocationStreet" name="LocationStreet" type="text" /> <br /> 
            <label for="LocationCity">City</label> 
            <input id="LocationCity" name="LocationCity" type="text" /> <br /> 
            <label for="LocationState">State</label> 
            <input id="LocationState" name="LocationState" type="text" /> <br /> 
            <label for="LocationZip">Zip:</label> 
            <input id="LocationZip" name="LocationZip" type="text" /> <br />
            <label for="Primary">Primary Patient?</label>
            <input id="Primary" name="Primary" type="checkbox" value="1" /> <br />
            <input class="submit" value="Submit" name="submit" type="submit" /> </p>
          </div>
        </form>
      </div> 
    </div> <!-- newpat --> <!-- left --> 
    <div id="mid"> </div> <!-- mid --> 
    <div id="right"> </div> <!--right --> 
    
    <script type="text/javascript">
//		$('#invite').load('invite.htm');
//		$('#patinfo').load('patinfo.php');
//		$('#follow').load('followers.php');
//		$('#patpik').load('patpick.php');
//		$('#statuses').load('statusshow.php');
//		$('#statform').load('status.htm');

	</script> 
  </body>	
</html>