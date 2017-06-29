<?php

$con = mysql_connect("localhost","root","")
or die("Failed to connect to the server: " . mysql_error());

mysql_select_db("airlines")
or die("Failed to connect to the database: " . mysql_error());

if(@$_POST['submit'])
{
$email    = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * from customers where email = '$email' and password = '$password'";

$query = mysql_query($sql);

$numrows = mysql_num_rows($query);

if($numrows > 0)
{
while($result = mysql_fetch_assoc($query))
{
$db_fname = $result['firstname'];
$db_lname = $result['lastname'];
$db_email = $result['email'];
$db_pass  = $result['password'];	
}
if($email == $db_email and $password = $db_pass)
{
if(!isset($_COOKIE['email']))
{
setcookie("email",$email,time()+60*3000);
}
header("location: main.php");	
}
else
{
header("location: login3.php");
}
	
}
else
{
header("location: login3.php");	
}
}
else
{
header("location: login2.php");
}

?>