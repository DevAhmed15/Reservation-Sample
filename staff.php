<?php

$con = mysql_connect("localhost","root","")
or die("Failed to connect to the server: " . mysql_error());

mysql_select_db("airlines")
or die("Failed to connect to the database: " . mysql_error());

if(isset($_POST['id']) and $_POST['password'])
{
$id       = strtoupper(strip_tags($_POST['id']));
$password = strtoupper(strip_tags($_POST['password']));

$sql = "SELECT * from brokers where
staff_id = '$id' and password = '$password'";

$query = mysql_query($sql);

$numrows = mysql_num_rows($query);

if($numrows > 0)
{
while($result = mysql_fetch_assoc($query))
{
$db_id    = $result['staff_id'];
$db_pass  = $result['password'];
$type = $result['IsAdm'];	
}
if($id == $db_id and $password = $db_pass)
{
if(!isset($_COOKIE['staff_id']))
{
    setcookie("staff_id",$id,time()+60*30);
    setcookie("adm",$type,time()+60*30);
}
if($type == 1)
header("location: main3.php");	
else
header("location: main2.php");	
}
else
{
echo "<script> 
alert('Wrong Staff ID or password ... try again !!');
window.location.href='logout.php';
 </script>";
}
	
}
else
{
echo "<script> 
alert('Wrong staff_id or password ... try again !!');
window.location.href='staff2.php';
 </script>";	
}
}
else
{
header("location: staff2.php");
}

?>