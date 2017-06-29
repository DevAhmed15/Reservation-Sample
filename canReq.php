<?php
if(!isset($_COOKIE['email']))
{

echo "<script> 
alert('Your session has timed out ... login again');
window.location.href='logout.php';
 </script>";	
}
$id       = @$_POST['id'];
?>

<?php
if(@$_POST['submit']){

$con = mysql_connect("localhost","root","")
or die("Failed to connect to the server: " . mysql_error());

mysql_select_db("airlines")
or die("Failed to connect to the database: " . mysql_error());



	$sql = "delete from requests where id = '$id'";

$query = mysql_query($sql);

if($query)
{
	echo "<script> 
alert('Request has been deleted successfully.');
window.location.href='index.php';
 </script>";

}
else
{
	echo "<script> 
alert('Error occurred during deleting request, try again.');
window.location.href='index.php';
 </script>";		
}
}

?>