
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
<a href="index.html"><img src="images/logo1.png" alt="" /></a>
</div>
<div class="top-nav">
<span class="menu"><img src="images/menu.png" alt=""></span>
<ul class="cl-effect-1">
<li><a href="index.php">HOME</a></li>                             
<li><a href="about.php">ABOUT</a></li>
<li><a href="reserve.php">RESERVE FLIGHT</a></li>
<li><a href="profile.php">MY FILGHTS</a></li>
<li><a href="change_pass.php">EDIT PROFILE</a></li> 
<li><a href="contact.php">CONTACT US</a></li>
<li><a href="logout.php">LOGOUT</a></li> 
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
<h3>SHOW FLIGHT</h3>
</div>
<div class="map">
</div>
<div class="mail-info-grids">
<div class="col-md-6 mail-info-grid">

<?php

$con = mysql_connect("localhost","root","")
or die("Failed to connect to the server: " . mysql_error());

mysql_select_db("airlines")
or die("Failed to connect to the database: " . mysql_error());

$flightno = $_POST['db_flightno'];

$sql = "select * from flights where flight_no = '$flightno'";

$query = mysql_query($sql);

echo "<table class = 'table table-striped table-bordered'>";

while($result = mysql_fetch_assoc($query))
{
$db_source      = $result['source'];
$db_destination = $result['destination'];
$db_flightdate  = $result['flight_date'];
$db_departure   = $result['departure'];
$db_arrival     = $result['arrival'];
$db_status      = $result['status'];
$db_business    = $result['business'];
$db_tourist     = $result['tourist'];
$db_bus_ticket  = $result['bus_ticket'];
$db_tour_ticket = $result['tour_ticket'];

echo "<tr>";
echo "<td><h1>Name</h1></td>";
echo "<td><h1>Value</h1></td>";
echo "</tr>";

echo "<tr>";
echo "<td>Departure</td>";
echo "<td>" . $db_source . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Destination</td>";
echo "<td>" . $db_destination . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Flight Number</td>";
echo "<td>" . $flightno . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Flight Date</td>";
echo "<td>" . $db_flightdate . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Takeoff Time</td>";
echo "<td>" . $db_departure . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Arrival Time</td>";
echo "<td>" . $db_arrival . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Flight Status</td>";
echo "<td>" . $db_status . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Available Business Seats</td>";
echo "<td>" . $db_business. "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Business Ticket</td>";
echo "<td>$" . $db_bus_ticket . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Available Tourist Seats</td>";
echo "<td>" . $db_tourist . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Tourist Ticket</td>";
echo "<td>$" . $db_tour_ticket . "</td>";
echo "</tr>";
}

echo "</table>";

?>

</div>
<div class="clearfix"> </div>
</div>
</div>
<!-- //container -->
<a href="profile.php" style="padding-left:220px;text-decoration: underline;color: #D90 ">Back To List</a>
</div>

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
<li><a href="reserve.php">RESERVE FLIGHT</a></li>   
<li><a href="mail.html">CONTACT US</a></li>  
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