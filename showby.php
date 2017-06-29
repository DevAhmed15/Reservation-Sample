
<!DOCTYPE html>
<html>
<head>
<title>Vanilla AIR</title>
<link rel="shortcut icon" href="t.png">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- web-font -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<!-- web-font -->
<!-- js -->
<script src="js/jquery.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- js -->
<script src="js/modernizr.custom.js"></script>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
$(".scroll").click(function(event){		
event.preventDefault();
$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
});
});
</script>
<!-- start-smoth-scrolling -->
</head>
<body>
<div class="head-bg green">
<!-- container -->
<div class="container">
<div class="head-logo">
<a href="index.php"><img src="images/logo1.png" alt="" /></a>
</div>
<div class="top-nav">
<span class="menu"><img src="images/menu.png" alt=""></span>
<ul class="cl-effect-1">
<li><a href="index.php">HOME</a></li>
<li><a href="about.php">ABOUT</a></li>
<li><a href="flights.php">FLIGHTS TABLE</a></li>
<li><a href="showby.php">VIEW FLIGHTS BY</a></li>
<li><a href="mining.php">STATISTICS</a></li>
<li><a href="refresh.php">REFRESH WAITING LIST</a></li>
<li><a href="logout2.php">LOGOUT</a></li>  
</ul>
<!-- script-for-menu -->
<script>
$( "span.menu" ).click(function() {
$( "ul.cl-effect-1" ).slideToggle( 300, function() {
// Animation complete.
});
});
</script>
<!-- /script-for-menu -->
</div>
<div class="clearfix"> </div>
</div>
<!-- //container -->
</div>
<!-- mail -->
<div class="mail">
<!-- container -->
<div class="container">
<div class="mail-info">
<h3>VIEW FLIGHTS BY</h3>
</div>
<div class="map">
</div>
<div class="mail-info-grids">
<div class="col-md-6 mail-info-grid">




<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","get_choice.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<?php
if(!isset($_COOKIE['staff_id']))
{
die("<p> Your session has timed out ... <a href = 'index.php'> login again </a></p>");	
}
?>



<form class = "form-inline">

<label> <p> SELECT VIEW WAY: </p> </label>
&nbsp; &nbsp;

<select class = "form-control" name="users" onchange="showUser(this.value)">

<option VALUE="NO"> SELECT VIEW WAY </option>
<option value="day"> VIEW DAILY FLIGHTS </option>
<option value="week"> VIEW WEEKLY FLIGHTS </option>
<option value="arrived"> VIEW ARRIVED FLIGHTS </option>
<option value="data"> VIEW PASSENGERS DATA ON SPECIFIC FLIGHTS </option>

</select>

</form>
<br><br>
<div id="txtHint"></div>
<br><br><br>
<?php


$con = mysql_connect("localhost","root","")
or die("Failed to connect to the server: " . mysql_error());

mysql_select_db("Airlines")
or die("Failed to connect to the database: " . mysql_error());

if(@$_POST['submit'])
{

$date = strip_tags($_POST['date']);
if($date)
{

$sql = "select * from flights where flight_date = '$date'";

$query = mysql_query($sql);

$numrows = mysql_num_rows($query);

if($numrows > 0)
{
echo "<table class = 'table table-striped table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th> ID </th>";
echo "<th> Source </th>";
echo "<th> Destination </th>";
echo "<th> Flight_no </th>";
echo "<th> Flight_date </th>";
echo "<th> Departure </th>";
echo "<th> Actual </th>";
echo "<th> Arrival</th>";
echo "<th> Actual </th>";
echo "<th> Status </th>";
echo "<th> Business Seats </th>";
echo "<th> Business Ticket Price </th>";
echo "<th> Tourist Seats </th>";
echo "<th> Tourist Ticket Price </th>";
echo "<th> Edit Flight </th>";
echo "<th> Delete Flight </th>";
echo "</tr> </thead>";
echo "<tbody>";

while($result = mysql_fetch_assoc($query))
{
$db_id          = $result['id'];
$db_source      = $result['source'];
$db_destination = $result['destination'];
$db_flightno    = $result['flight_no'];
$db_flightdate  = $result['flight_date'];
$db_departure   = $result['departure'];
$db_actual_dep  = $result['actual_dep'];
$db_arrival     = $result['arrival'];
$db_actual_arr  = $result['actual_arr'];
$db_status      = $result['status'];
$db_business    = $result['business'];
$db_tourist     = $result['tourist'];
$db_bus_ticket  = $result['bus_ticket'];
$db_tour_ticket = $result['tour_ticket'];

echo "<tr>";
echo "<td>" . $db_id . "</td>";	
echo "<td>" . $db_source . "</td>";	
echo "<td>" . $db_destination . "</td>";	
echo "<td>" . $db_flightno . "</td>";	
echo "<td>" . $db_flightdate . "</td>";	
echo "<td>" . $db_departure . "</td>";	
echo "<td>" . $db_actual_dep . "</td>";	
echo "<td>" . $db_arrival . "</td>";	
echo "<td>" . $db_actual_arr . "</td>";	
echo "<td>" . $db_status . "</td>";	
echo "<td>" . $db_business . "</td>";	
echo "<td>$" . $db_bus_ticket . "</td>";	
echo "<td>" . $db_tourist . "</td>";	
echo "<td>$" . $db_tour_ticket . "</td>";
echo "<td>";
echo "<form action = 'edit_flight.php' method = 'POST'>
<input type = 'hidden' name = 'db_id' value = '$db_id'>
<input type = 'hidden' name = 'db_source' value = '$db_source'>
<input type = 'hidden' name = 'db_destination' value = '$db_destination'>
<input type = 'hidden' name = 'db_flightno' value = '$db_flightno'>
<input type = 'hidden' name = 'db_flightdate' value = '$db_flightdate'>
<input type = 'hidden' name = 'db_departure' value = '$db_departure'>
<input type = 'hidden' name = 'db_actual_dep' value = '$db_actual_dep'>
<input type = 'hidden' name = 'db_arrival' value = '$db_arrival'>
<input type = 'hidden' name = 'db_actual_arr' value = '$db_actual_arr'>
<input type = 'hidden' name = 'db_status' value = '$db_status'>
<input type = 'hidden' name = 'db_business' value = '$db_business'>
<input type = 'hidden' name = 'db_tourist' value = '$db_tourist'>
<input type = 'hidden' name = 'db_bus_ticket' value = '$db_bus_ticket'>
<input type = 'hidden' name = 'db_tour_ticket' value = '$db_tour_ticket'>
<button type = 'submit' class = 'btn btn-info'>Edit</button>
</form>";
echo "</td>";
echo "<td>";
echo " <form action = 'delete_flight.php' method = 'POST'>
<input type = 'hidden' name = 'db_id' value = '$db_id'>
<button type = 'submit' class = 'btn btn-danger'>Delete</button>
</form>";
echo "</td>";
echo "</tr>";	
}

echo "</tbody> </table> <br>";
}
else
{
echo "<p>No flights in that day. </p><br>";
}
}
else
echo "<p> Please type a date !! </p><br>";
}

?>

<?php
if(@$_POST['submit1']) {
$date0 = strip_tags($_POST['date0']);

if($date0)
{
$sql2 = "select * from flights where status = 'ARRIVED' and flight_date = '$date0'";

$query2 = mysql_query($sql2);

$numrows2 = mysql_num_rows($query2);

if($numrows2 > 0)
{
echo "<table class = 'table table-striped table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th> ID </th>";
echo "<th> Source </th>";
echo "<th> Destination </th>";
echo "<th> Flight_no </th>";
echo "<th> Flight_date </th>";
echo "<th> Departure </th>";
echo "<th> Actual </th>";
echo "<th> Arrival</th>";
echo "<th> Actual </th>";
echo "<th> Status </th>";
echo "<th> Business Seats </th>";
echo "<th> Business Ticket Price </th>";
echo "<th> Tourist Seats </th>";
echo "<th> Tourist Ticket Price </th>";
echo "<th> Edit Flight </th>";
echo "<th> Delete Flight </th>";
echo "</tr> </thead>";
echo "<tbody>";

while($result2 = mysql_fetch_assoc($query2))
{
$db_id          = $result2['id'];
$db_source      = $result2['source'];
$db_destination = $result2['destination'];
$db_flightno    = $result2['flight_no'];
$db_flightdate  = $result2['flight_date'];
$db_departure   = $result2['departure'];
$db_actual_dep  = $result2['actual_dep'];
$db_arrival     = $result2['arrival'];
$db_actual_arr  = $result2['actual_arr'];
$db_status      = $result2['status'];
$db_business    = $result2['business'];
$db_tourist     = $result2['tourist'];
$db_bus_ticket  = $result2['bus_ticket'];
$db_tour_ticket = $result2['tour_ticket'];

echo "<tr>";
echo "<td>" . $db_id . "</td>";	
echo "<td>" . $db_source . "</td>";	
echo "<td>" . $db_destination . "</td>";	
echo "<td>" . $db_flightno . "</td>";	
echo "<td>" . $db_flightdate . "</td>";	
echo "<td>" . $db_departure . "</td>";	
echo "<td>" . $db_actual_dep . "</td>";	
echo "<td>" . $db_arrival . "</td>";	
echo "<td>" . $db_actual_arr . "</td>";	
echo "<td>" . $db_status . "</td>";	
echo "<td>" . $db_business . "</td>";	
echo "<td>$" . $db_bus_ticket . "</td>";	
echo "<td>" . $db_tourist . "</td>";	
echo "<td>$" . $db_tour_ticket . "</td>";
echo "<td>";
echo "<form action = 'edit_flight.php' method = 'POST'>
<input type = 'hidden' name = 'db_id' value = '$db_id'>
<input type = 'hidden' name = 'db_source' value = '$db_source'>
<input type = 'hidden' name = 'db_destination' value = '$db_destination'>
<input type = 'hidden' name = 'db_flightno' value = '$db_flightno'>
<input type = 'hidden' name = 'db_flightdate' value = '$db_flightdate'>
<input type = 'hidden' name = 'db_departure' value = '$db_departure'>
<input type = 'hidden' name = 'db_actual_dep' value = '$db_actual_dep'>
<input type = 'hidden' name = 'db_arrival' value = '$db_arrival'>
<input type = 'hidden' name = 'db_actual_arr' value = '$db_actual_arr'>
<input type = 'hidden' name = 'db_status' value = '$db_status'>
<input type = 'hidden' name = 'db_business' value = '$db_business'>
<input type = 'hidden' name = 'db_tourist' value = '$db_tourist'>
<input type = 'hidden' name = 'db_bus_ticket' value = '$db_bus_ticket'>
<input type = 'hidden' name = 'db_tour_ticket' value = '$db_tour_ticket'>
<button type = 'submit' class = 'btn btn-info'>Edit</button>
</form>";
echo "</td>";
echo "<td>";
echo " <form action = 'delete_flight.php' method = 'POST'>
<input type = 'hidden' name = 'db_id' value = '$db_id'>
<button type = 'submit' class = 'btn btn-danger'>Delete</button>
</form>";
echo "</td>";
echo "</tr>";	
}

echo "</tbody> </table> <br>";	
}
else
{
echo "<p> No arrived flights at this moment. </p><br>";	
}	
}
else
echo "<p>Please type a date !! </p> <br>";	
}
?>

<?php

if(@$_POST['submit2'])
{

$date1 = strip_tags($_POST['date1']);
$date2 = strip_tags($_POST['date2']);
if($date1 and $date2)
{
$sql3 = "select * from flights where flight_date between '$date1' and '$date2'";

$query3 = mysql_query($sql3);

$numrows3 = mysql_num_rows($query3);

if($numrows3 > 0)
{
echo "<table class = 'table table-striped table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th> ID </th>";
echo "<th> Source </th>";
echo "<th> Destination </th>";
echo "<th> Flight_no </th>";
echo "<th> Flight_date </th>";
echo "<th> Departure </th>";
echo "<th> Actual </th>";
echo "<th> Arrival</th>";
echo "<th> Actual </th>";
echo "<th> Status </th>";
echo "<th> Business Seats </th>";
echo "<th> Business Ticket Price </th>";
echo "<th> Tourist Seats </th>";
echo "<th> Tourist Ticket Price </th>";
echo "<th> Edit Flight </th>";
echo "<th> Delete Flight </th>";
echo "</tr> </thead>";
echo "<tbody>";

while($result3 = mysql_fetch_assoc($query3))
{
$db_id          = $result3['id'];
$db_source      = $result3['source'];
$db_destination = $result3['destination'];
$db_flightno    = $result3['flight_no'];
$db_flightdate  = $result3['flight_date'];
$db_departure   = $result3['departure'];
$db_actual_dep  = $result3['actual_dep'];
$db_arrival     = $result3['arrival'];
$db_actual_arr  = $result3['actual_arr'];
$db_status      = $result3['status'];
$db_business    = $result3['business'];
$db_tourist     = $result3['tourist'];
$db_bus_ticket  = $result3['bus_ticket'];
$db_tour_ticket = $result3['tour_ticket'];

echo "<tr>";
echo "<td>" . $db_id . "</td>";	
echo "<td>" . $db_source . "</td>";	
echo "<td>" . $db_destination . "</td>";	
echo "<td>" . $db_flightno . "</td>";	
echo "<td>" . $db_flightdate . "</td>";	
echo "<td>" . $db_departure . "</td>";	
echo "<td>" . $db_actual_dep . "</td>";	
echo "<td>" . $db_arrival . "</td>";	
echo "<td>" . $db_actual_arr . "</td>";	
echo "<td>" . $db_status . "</td>";	
echo "<td>" . $db_business . "</td>";	
echo "<td>$" . $db_bus_ticket . "</td>";	
echo "<td>" . $db_tourist . "</td>";	
echo "<td>$" . $db_tour_ticket . "</td>";
echo "<td>";
echo "<form action = 'edit_flight.php' method = 'POST'>
<input type = 'hidden' name = 'db_id' value = '$db_id'>
<input type = 'hidden' name = 'db_source' value = '$db_source'>
<input type = 'hidden' name = 'db_destination' value = '$db_destination'>
<input type = 'hidden' name = 'db_flightno' value = '$db_flightno'>
<input type = 'hidden' name = 'db_flightdate' value = '$db_flightdate'>
<input type = 'hidden' name = 'db_departure' value = '$db_departure'>
<input type = 'hidden' name = 'db_actual_dep' value = '$db_actual_dep'>
<input type = 'hidden' name = 'db_arrival' value = '$db_arrival'>
<input type = 'hidden' name = 'db_actual_arr' value = '$db_actual_arr'>
<input type = 'hidden' name = 'db_status' value = '$db_status'>
<input type = 'hidden' name = 'db_business' value = '$db_business'>
<input type = 'hidden' name = 'db_tourist' value = '$db_tourist'>
<input type = 'hidden' name = 'db_bus_ticket' value = '$db_bus_ticket'>
<input type = 'hidden' name = 'db_tour_ticket' value = '$db_tour_ticket'>
<button type = 'submit' class = 'btn btn-info'>Edit</button>
</form>";
echo "</td>";
echo "<td>";
echo " <form action = 'delete_flight.php' method = 'POST'>
<input type = 'hidden' name = 'db_id' value = '$db_id'>
<button type = 'submit' class = 'btn btn-danger'>Delete</button>
</form>";
echo "</td>";
echo "</tr>";	
}

echo "</tbody> </table> <br>";
}
else
echo "<p>No current flights at this interval. </p>";
}
else
echo "<p> Please type flights interval. </p><br>";
}

?>

<?php


if(@$_POST['submit3'])
{


$flight_pss = $_POST['flight_pss'];
$choice     = $_POST['choice'];

if($flight_pss and $choice)
{

if($choice == "reservation")
{
echo "<label><p>Reservations List Selected.</p></label><br>";
$sql4 = "select * from reservations where flight_no = '$flight_pss'";

$query4 = mysql_query($sql4);

$numrows4 = mysql_num_rows($query4);

if($numrows4 > 0)
{
echo "<label><p>Found (" . $numrows4 . ") passenger(s) on this flight.</p></label><br><br>";

echo "<table class = 'table table-striped table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th> Full Name </th>";
echo "<th> Sex </th>";
echo "<th> Birth Date </th>";
echo "<th> Address </th>";
echo "<th> City </th>";
echo "<th> State </th>";
echo "<th> Zip Code </th>";
echo "<th> Phone Number</th>";
echo "<th> Class </th>";
echo "<th> Control </th>";
echo "</tr> </thead>";
echo "<tbody>";

while($result4 = mysql_fetch_assoc($query4))
{
$id      = $result4['id'];
$fname   = $result4['fname'];
$lname   = $result4['lname'];
$sex     = $result4['sex'];
$birth   = $result4['birth_date'];
$address = $result4['address'];
$city    = $result4['city'];
$state   = $result4['state'];
$zipcode = $result4['zip_code'];
$phoneno = $result4['phone_no'];
$class   = $result4['class'];

echo "<tr>";
echo "<td>" . $fname . " " . $lname . "</td>";	
echo "<td>" . $sex . "</td>";	
echo "<td>" . $birth . "</td>";	
echo "<td>" . $address . "</td>";	
echo "<td>" . $city . "</td>";	
echo "<td>" . $state . "</td>";	
echo "<td>" . $zipcode . "</td>";	
echo "<td>" . $phoneno . "</td>";	
echo "<td>" . $class . "</td>";
echo "<td>";
echo "<form action = 'delete_customer.php' method = 'POST'>
<input type = 'hidden' name = 'id' value = '$id'>
<input type = 'hidden' name = 'message' value = 'reservation'>
<input type = 'hidden' name = 'class' value = '$class'>
<input type = 'hidden' name = 'flight' value = '$flight_pss'>
<input type = 'submit' name = 'submit' value = 'Remove' class = 'btn btn-info'> </form>";
echo "</td>";
echo "</tr>";
}
echo "</tbody> </table> <br>";
}
else
echo "<label><p>Sorry no passengers on this flight or maybe it's not exists.</p></label>";

}

else if($choice == "waiting")
{
echo "<label><p>Waiting List Selected. </p></label><br>";

$sql5 = "select * from waiting where flight_no = '$flight_pss'";

$query5 = mysql_query($sql5);

$numrows5 = mysql_num_rows($query5);

if($numrows5 > 0)
{
echo "<label><p>Found (" . $numrows5 . ") passenger(s) at the waiting list for this flight. </p></label> <br><br>";

echo "<table class = 'table table-striped'>";
echo "<thead>";
echo "<tr>";
echo "<th> Full Name </th>";
echo "<th> Sex </th>";
echo "<th> Birth Date </th>";
echo "<th> Address </th>";
echo "<th> City </th>";
echo "<th> State </th>";
echo "<th> Zip Code </th>";
echo "<th> Phone Number</th>";
echo "<th> Class </th>";
echo "<th> Control </th>";
echo "</tr> </thead>";
echo "<tbody>";

while($result5 = mysql_fetch_assoc($query5))
{
$id2      = $result5['id'];
$fname2   = $result5['fname'];
$lname2   = $result5['lname'];
$sex2     = $result5['sex'];
$birth2   = $result5['birth_date'];
$address2 = $result5['address'];
$city2    = $result5['city'];
$state2   = $result5['state'];
$zipcode2 = $result5['zip_code'];
$phoneno2 = $result5['phone_no'];
$class2   = $result5['class'];

echo "<tr>";
echo "<td>" . $fname2 . " " . $lname2 . "</td>";	
echo "<td>" . $sex2 . "</td>";	
echo "<td>" . $birth2 . "</td>";	
echo "<td>" . $address2 . "</td>";	
echo "<td>" . $city2 . "</td>";	
echo "<td>" . $state2 . "</td>";	
echo "<td>" . $zipcode2 . "</td>";	
echo "<td>" . $phoneno2 . "</td>";	
echo "<td>" . $class2 . "</td>";
echo "<td>";
echo "<form action = 'delete_customer.php' method='POST'>
<input type = 'hidden' name = 'id' value = '$id2'>
<input type = 'hidden' name = 'message' value = 'waiting'>
<input type = 'submit' name = 'submit' value = 'Remove' class = 'btn btn-link'>
</form></td>";	
echo "</tr>";
}
echo "</tbody> </table> <br>";
}
else
echo "<label><p>Sorry no passengers at the waiting list for this flight or maybe flight is not exists. </p></label>";
}
}
}

?>

</div>
<div class="clearfix"> </div>
</div>
</div>
<!-- //container -->
</div>
<!-- //mail -->
<!-- footer -->

			<div class="about-banner">
				<div class="banner-bg">
                </div>
			</div>
            <br><br>

<div class="footer">
<!-- container -->
<div class="container">
<div class="footer-left">
<p>copyright@<a href="http://www.turkishairlines.com">Turkish Airlines</a> All Rights Reserved</p>
</div>
<div class="footer-right">
<div class="footer-nav">
<ul>
<li><a href="index.php">HOME</a></li>
<li><a href="about.php">ABOUT</a></li>  
<li><a href="flights.php">FLIGHTS TABLE</a></li>
<li><a href="showby.php">VIEW FLIGHTS BY</a></li>  
<li><a href="logout2.php">LOGOUT</a></li>  
</ul>
</div>
</div>
<div class="clearfix"> </div>
</div>
<!-- //container -->
</div>
<!-- //footer -->
<script type="text/javascript">
$(document).ready(function() {
/*
var defaults = {
containerID: 'toTop', // fading element id
containerHoverID: 'toTopHover', // fading element hover id
scrollSpeed: 1200,
easingType: 'linear' 
};
*/
$().UItoTop({ easingType: 'easeOutQuart' });	
});
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- content-Get-in-touch -->
</body>
</html>