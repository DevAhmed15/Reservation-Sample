
<!DOCTYPE html>
<html>
<head>
<title>Vanilla Air</title>
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
<form class = "form-horizontal" action = "add_flight.php" method = "POST">

<label> Source </label> <br>
<input type = "text" name = "source" autocomplete = "off" class = "form-control" required title = "Flight Departure"> <br>

<label> Destination </label> <br>
<input type = "text" name = "destination" autocomplete = "off" class = "form-control" required title = "Flight Destination"> <br>

<label> Flight Number </label> <br>
<input type = "number" min = "0" name = "flightno" class ="form-control" required title = "Flight Number"> <br>

<label> Flight Date </label> <br>
<input type = "date" name = "flightdate" class = "form-control" required title = "Flight Date"> <br>

<label> Flight Departure </label>
<input type = "time" name = "departure" class = "form-control" required title = "Takeoff Time"> <br>

<label> Flight Arrival </label> <br>
<input type = "time" name = "arrival" class = "form-control" required title = "Arrival Time"> <br>

<label> Business Seats </label> <br>
<input type = "number" min = "0" name = "business" class = "form-control" required title = "Number Of Business Class Seats"> <br>

<label> Tourist Seats </label> <br>
<input type = "number" min = "0" name = "tourist" class = "form-control" required title = "Number Of Tourist Class Seats"> <br>

<label> Business Ticket </label> <br>
<input type = "number" min = "0" name = "bus_ticket" class = "form-control" required title = "Business Class Ticket Price"> <br>

<label> Tourist Ticket </label> <br>
<input type = "number" min = "0" name = "tour_ticket" class = "form-control" required title = "Tourist Class Ticket Price"> <br> <br>

<input type = "submit" name = "submit" class = "btn btn-primary" value = "Add Flight">

</form>
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
if(@$_POST['submit']){
$source      = strtoupper(strip_tags($_POST['source']));
$destination = strtoupper(strip_tags($_POST['destination']));
$flightno    = strip_tags($_POST['flightno']);
$flightdate  = strip_tags($_POST['flightdate']);
$departure   = strip_tags($_POST['departure']);
$arrival     = strip_tags($_POST['arrival']);
$business    = strip_tags($_POST['business']);
$tourist     = strip_tags($_POST['tourist']);
$bus_ticket  = strip_tags($_POST['bus_ticket']);
$tour_ticket = strip_tags($_POST['tour_ticket']);
$submit      = $_POST['submit'];

$check = mysql_query("select flight_no from flights where flight_no = '$flightno'");
$numrows = mysql_num_rows($check);
if($numrows == 1)
{
echo "<script> 
alert('Flight number is already exists please enter another one.');
window.location.href='flights.php';
 </script>";	
}

if($submit)
{

if($source and $destination and $flightno and $flightdate and $departure and $arrival and $business and $tourist and $bus_ticket and $tour_ticket)
{
$sql = "insert into flights values ('','$source','$destination','$flightno','$flightdate','$departure','00:00:00','$arrival','00:00:00','PENDING','$business','$tourist','$bus_ticket','$tour_ticket')";

$query = mysql_query($sql);

if($query)
	echo "<script> 
alert('Flight has been added successfully.');
window.location.href='flights.php';
 </script>";
else
	echo "<script> alert(' Error occurred during adding a new flight, try again.'); </script>";
}

}}
?>


</div>
<div class="clearfix"> </div>
</div>
</div>
<!-- //container -->
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