
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
<h3>FLIGHTS TABLE</h3>
</div>
<div class="map">
</div>
<div class="mail-info-grids">
<div class="col-md-6 mail-info-grid">

<?php

if(!isset($_COOKIE['staff_id']))
{

echo "<script> 
alert('Your session has timed out ... login again');
window.location.href='logout.php';
 </script>";	
}

$con = mysql_connect("localhost","root","")
or die("Failed to connect to the server: " . mysql_error());

mysql_select_db("airlines")
or die("Failed to connect to the database: " . mysql_error());

$sql = "select * from flights";

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
echo "<td>"  . $db_id . "</td>";	
echo "<td>"  . $db_source . "</td>";	
echo "<td>"  . $db_destination . "</td>";	
echo "<td>"  . $db_flightno . "</td>";	
echo "<td>"  . $db_flightdate . "</td>";	
echo "<td>"  . $db_departure . "</td>";	
echo "<td>"  . $db_actual_dep . "</td>";	
echo "<td>"  . $db_arrival . "</td>";	
echo "<td>"  . $db_actual_arr . "</td>";	
echo "<td>"  . $db_status . "</td>";	
echo "<td>"  . $db_business . "</td>";	
echo "<td>$" . $db_bus_ticket . "</td>";	
echo "<td>"  . $db_tourist . "</td>";	
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
<input type = 'hidden' name = 'db_flightno' value = '$db_flightno'>
<button type = 'submit' class = 'btn btn-danger'>Delete</button>
</form>";
echo "</td>";
echo "</tr>";	
}

echo "</tbody> </table> <br>";
}
else
{
echo "<h3> NO CURRENT FLIGHTS AVAILABLE </h3>";	
}


?>
<b><p><a href = "add_flight.php" style="color:brown;"> ADD NEW FLIGHT </a></p> </b>
</div>
<div class="clearfix"> </div>
</div>
</div>
<!-- //container -->
</div>
			<div class="about-banner">
				<div class="banner-bg">
                </div>
			</div>
            <br><br>
<!-- //mail -->
<!-- footer -->
<div class="footer">
<!-- container -->
<div class="container">
<div class="footer-left">
<p>copyright &copy; <a href="https://www.vanilla-air.com/en/">Vanilla Airlines</a> All Rights Reserved</p>
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