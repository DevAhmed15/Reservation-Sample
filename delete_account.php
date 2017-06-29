<?php

$connection = mysqli_connect("localhost","root","")
or die("Failed to connect to the server: " . mysqli_error());

mysqli_select_db($connection, "airlines")
or die("Failed to connect to the database: " . mysqli_error());

$password = $_POST['password'];
$confpass = $_POST['confpass'];
$submit2  = $_POST['submit2'];
$email    = $_POSt['email'];

if($submit2)
{
if($password == $confpass)
{
$check = mysqli_query($connection, "select * from customers where email = '$email' and password = '$password'");

$rows = mysqli_num_rows($check);

if($rows == 1)
{
while($data = mysqli_fetch_array($check))
{
$id = $data['id'];
}
$check2 = mysqli_query($connection, "select * from reservations where customer_id = '$id'");

$rows2 = mysqli_num_rows($check2);

if($rows2 > 0)
{
echo "<label><p>Warning: you have reservations in your profile .. please commit to them first then later you can delete your account. </p></label>";
}

else if($rows2 == 0)
{
mysqli_query($connection, "delete from customers where id = '$id' and email = '$email' and password = '$password'");

mysqli_query($connection, "delete from waiting where customer_id = '$id'");

require("logout.php");

echo "<label><p> Your account has been deleted successfully, you are not more registered in this site. </p> <label>";
}

}
else
echo "<label><p>Password is not correct .. try again !! </p> </label>";
}
else
echo "<label><p>Password and confirm password are not matching. </p></label>";
}

?>