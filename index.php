<?php
session_start();
?>

<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'hms';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(! $conn )
{
  die('Could not connect: ' . mysqli_error());
}

if (count($_POST) > 0){	
mysqli_select_db($conn, $dbname);
$username=$_POST['username'];
$password=$_POST['password'];

$_SESSION['username'] = $username;

$sql="SELECT * FROM users WHERE username='$username' and password='$password'";

$result=mysqli_query($conn, $sql);

$count=mysqli_num_rows($result);

if($count<1){ $message = "<p style=color:red;text-decoration:blink>Wrong Username or Password</p>";}
else
	{
		$_SESSION['user']=$username;
		header("location:home.php");
	}}

ob_end_flush();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" id="_moz_html_fragment" content="text/html; charset=utf-8" />
<title>Login</title>
<style fprolloverstyle>
	A:hover{color:green;font-style:italic}
	</style>
</head>

<body style="background-color:lightblue">
<div style="text-align: center">
<br /><br /><br /><br />

<big><big>HOSPITAL&nbsp; MANAGEMENT&nbsp; SYSTEM<br />
</big></big>

<div class="message"><table border="0" align="center" width="400px" height="70px"><th><?php if(isset($message)) { echo $message; } ?></th></table></div>
<form method="POST" action="">
<table width="300px" border="0" cellspacing="3" cellpadding="3" align="center">
<tbody>
	<tr>
		<td style="text-align: left"><label>USERNAME :</label></td>
		<td><input name="username" placeholder="'Enter Username'" type="text" autofocus="autofocus" required="required" /></td>
	</tr>
	
    <tr>
		<td style="text-align: left"><label>PASSWORD :</label></td>
		<td><input name="password" placeholder="'Enter Password'" type="password" required="required" /></td>
	</tr>
</tbody>
</table>
<br />

<input value="LOGIN" name="submit" type="submit" />&nbsp; &nbsp; <input name="clear" value="CLEAR" type="reset" /><br />
</form>
<br />

<a href="register.php" style="text-decoration:none"><input value="&nbsp; SIGN UP ! &nbsp;" name="newuser" type="submit" /></a>

<br /><br /><br />

<?php
include ('footer.php')
?>
</div>
</body>
</html>
