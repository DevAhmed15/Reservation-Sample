<?php

$con = mysql_connect("localhost","root","")
or die("Failed to connect to the server: " . mysql_error());

mysql_select_db("airlines")
or die("Failed to connect to the database: " . mysql_error());

$sql = "select * from waiting_list";

$query = mysql_query($sql);

$numrows = mysql_num_rows($query);

if($numrows > 0)
{
while($result = mysql_fetch_assoc($query))
{
$id         = $result['id'];
$fname      = $result['fname'];
$lname      = $result['lname'];
$sex        = $result['sex'];
$birth      = $result['birth_date'];
$address    = $result['address'];
$city       = $result['city'];
$state      = $result['state'];
$zipcode    = $result['zip_code'];
$phoneno    = $result['phone_no'];
$class      = $result['class'];
$flightno   = $result['flight_no'];
$customerid = $result['customer_id'];

$sql2 = "select $class from flights where flight_no = '$flightno'";
$query2 = mysql_query($sql2);
while($result2 = mysql_fetch_assoc($query2))
{
$seats = $result2[$class];
}

if($seats > 0)
{
$update = $seats - 1;
$sql3 = mysql_query("delete from waiting where id = '$id'");
$sql4 = mysql_query("insert into reservations values ('','$fname','$lname','$sex','$birth','$address','$city','$state','$zipcode','$phoneno','$class','$flightno','$customerid')");
$sql5 = mysql_query("update flights set $class = '$update' where flight_no = '$flightno'");

if($sql3 and $sql4 and $sql5)
$value = 1;
else
$value = 2;

}
}
}
/*else
header("location: main2.php?id=3");*/

?>