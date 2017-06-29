<?php
if(!isset($_COOKIE['email']))
{

echo "<script> 
alert('Your session has timed out ... login again');
window.location.href='logout.php';
 </script>";
}
?>
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
<h3>AVAILABLE FLIGHTS</h3>
</div>
<div class="map">
</div>
<div class="mail-info-grids">
<div class="col-md-6 mail-info-grid">

<?php

$con = mysql_connect("localhost","root","")
or die("Failed to connnect to the server: " . mysql_error());

mysql_select_db("airlines")
or die("Failed to connect to the database:" . mysql_error());
if(@$_POST['submit']){
$departure   = strtoupper(strip_tags($_POST['departure']));
$destination = strtoupper(strip_tags($_POST['destination']));
$date        =strip_tags($_POST['date']);
$class       =strip_tags($_POST['class']);
$submit      = $_POST['submit'];


$email = $_COOKIE['email'];

$search_id = mysql_query("select * from customers where email = '$email'");
while($search = mysql_fetch_assoc($search_id))
{
$customer_id = $search['id'];
}

if($submit)
{
$fNum=mysql_query("select flight_no from flights where source='$departure' and destination='$destination' and flight_date='$date' and status='PENDING'");
while($search2 = mysql_fetch_assoc($fNum))
{
$nofly = $search2['flight_no'];
}

if(@$nofly && (mysql_num_rows(mysql_query("select * from reservations where customer_id='$customer_id' AND flight_no='$nofly'")) > 0))
{
echo "<script> 
alert('You Reserve Here Previously , please Cancel Old Reservation');
window.location.href='index.php';
 </script>";
}

if($departure and $destination and $date and $class)
{
$sql = "select * from flights where source = '$departure' and destination = '$destination' and flight_date = '$date' and status = 'PENDING'";

$query = mysql_query($sql);

$numrows = mysql_num_rows($query);

if($numrows > 0)
{
echo "<label><p>Found (" . $numrows . ") result(s):</p></label><br><br>";
echo "<table class = 'table table-striped table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th> Source </th>";
echo "<th> Destination </th>";
echo "<th> Flight_no </th>";
echo "<th> Flight_date </th>";
echo "<th> Departure </th>";
echo "<th> Arrival</th>";
echo "<th> Status </th>";
echo "<th> Business Seats </th>";
echo "<th> Business Ticket Price </th>";
echo "<th> Tourist Seats </th>";
echo "<th> Tourist Ticket Price </th>";
echo "<th> Reserve Menu </th>";
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
$db_arrival     = $result['arrival'];
$db_status      = $result['status'];
$db_business    = $result['business'];
$db_tourist     = $result['tourist'];
$db_bus_ticket  = $result['bus_ticket'];
$db_tour_ticket = $result['tour_ticket'];

echo "<tr>";
echo "<td>" . $db_source . "</td>";	
echo "<td>" . $db_destination . "</td>";	
echo "<td>" . $db_flightno . "</td>";	
echo "<td>" . $db_flightdate . "</td>";	
echo "<td>" . $db_departure . "</td>";	
echo "<td>" . $db_arrival . "</td>";		
echo "<td>" . $db_status . "</td>";	
echo "<td>" . $db_business . "</td>";	
echo "<td>$" . $db_bus_ticket . "</td>";	
echo "<td>" . $db_tourist . "</td>";	
echo "<td>$" . $db_tour_ticket . "</td>";
echo "<td>";
echo "<form action = 'fill_data.php' method = 'POST'>
<input type = 'hidden' name = 'db_id' value = '$db_id'>
<input type = 'hidden' name = 'db_flightno' value = '$db_flightno'>
<input type = 'hidden' name = 'db_business' value = '$db_business'>
<input type = 'hidden' name = 'db_tourist' value = '$db_tourist'>
<input type = 'hidden' name = 'db_class' value = '$class'>
<button type = 'submit' class = 'btn btn-info'>Reserve Now</button>
</form>";
echo "</td>";
}
echo "</tbody> </table> <br>";
}
else
{
echo "<label><p>Sorry, no available flights at this moment.</p></label><br><br>";
echo "<b><p><a href = 'new_req.php' style='color:brown;'> Request New Flight </a></p> </b>";
}
}
else
{
echo "<b>Please fill in all fields. </b><br><br>";	
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
<p>copyright &copy; <a href="https://www.vanilla-air.com/en/">Vanilla Airlines</a> All Rights Reserved</p>
</div>
<div class="footer-right">
<div class="footer-nav">
<ul>
<li><a href="index.php">HOME</a></li>
<li><a href="about.php">ABOUT</a></li>  
<li><a href="reserve.php">RESERVE FLIGHT</a></li>   
<li><a href="contact.php">CONTACT US</a></li>  
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