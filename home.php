<?php
include('session.php');
?>

<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'hms';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Homepage</title>
<style fprolloverstyle>
	A{color:#00F; text-decoration:none}
	A:hover{color:#F00;}
	</style>

</head>

<body style="background-color:lightblue">

<div align="right"><p><label>WELCOME: </label><b>[ <?php include('session_name.php'); ?> ]</b>&nbsp;&nbsp;[ <a href="logout.php"><b>Logout</b></a> ]&nbsp;&nbsp;[ <a href="change_password.php"><b>Change Password</b></a> ]</p></div>


<br />

<div align="center">

<p><big><big>Old Ningo Health Center Management System</big></big></p>
  <br />
  <br />
  
<form method="POST" action="addnewpatient.php" name="addnewpatient">
  <input name="addnewpatient" value="ADD NEW PATIENT" type="submit">
</form>
<br />
<br />

<form method="POST" action="prescription.php" name="prescription">
  <input name="prescription" value="CREATE PRESCRIPTION" type="submit">
</form>
<br />
<br />

<form method="POST" action="searchforpatient.html" name="searchforpatient">
  <input name="viewpatients" value="SEARCH ENGINE" type="submit">
</form>
<br />
<br />

<form method="POST" action="viewpatients.php" name="viewpatients">
  <input name="viewpatients" value="VIEW PATIENTS DATABASE" type="submit">
</form>
<br />
<br />

</div>

<?php
include ('footer.php')
?>
</body>
</html>
