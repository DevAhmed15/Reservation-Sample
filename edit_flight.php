<?php

$id             = @$_POST['db_id'];
$db_source      = strip_tags(strtoupper(@$_POST['db_source']));
$db_destination = strip_tags(strtoupper(@$_POST['db_destination']));
$db_flightno    = @$_POST['db_flightno'];
$db_flightdate  = @$_POST['db_flightdate'];
$db_departure   = @$_POST['db_departure'];
$db_actual_dep  = @$_POST['db_actual_dep'];
$db_arrival     = @$_POST['db_arrival'];
$db_actual_arr  = @$_POST['db_actual_arr'];
$db_status      = strip_tags(strtoupper(@$_POST['db_status']));
$db_business    = @$_POST['db_business'];
$db_tourist     = @$_POST['db_tourist'];
$db_bus_ticket  = @$_POST['db_bus_ticket'];
$db_tour_ticket = @$_POST['db_tour_ticket'];

?>

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
<form class = "form-horizontal" action = "edit_flight.php" method = "POST">

<input type = "hidden" name = "id" value = "<?php echo "$id" ?>">
<input type = 'hidden' name = "value" value = "<?php echo "$db_flightno"?>">
<label> Source: </label> <br>
<input type = "text" name = "source" autocomplete = "off" class = "form-control" value = "<?php echo "$db_source" ?>" requierd title = "Flight Departure"> <br>

<label> Destination: </label> <br>
<input type = "text" name = "destination" autocomplete = "off" class = "form-control" value = "<?php echo "$db_destination" ?>" required title = "Flight Destination"> <br>

<label> Flight Number: </label> <br>
<input type = "number" min = "0" name = "flightno" class ="form-control" value = "<?php echo "$db_flightno" ?>" required title = "Flight Number"> <br>

<label> Flight Date: </label> <br>
<input type = "date" name = "flightdate" class = "form-control" value = "<?php echo "$db_flightdate" ?>" required title = "Flight Date"> <br>

<label> Flight Departure: </label>
<input type = "time" name = "departure" class = "form-control" value = "<?php echo "$db_departure" ?>" required title = "Flight Takeoff"> <br>

<label> Actual Departure: </label> <br>
<input type = "time" name = "actual_dep" class = "form-control" value = "<?php echo "$db_actual_dep" ?>" required title = "Actual Takeoff"> <br>

<label> Flight Arrival: </label> <br>
<input type = "time" name = "arrival" class = "form-control" value = "<?php echo "$db_arrival" ?>" required title = "Flight Arrival"> <br>

<label> Actual Arrival: </label> <br>
<input type = "time" name = "actual_arr" class = "form-control" value = "<?php echo "$db_actual_arr" ?>" required title = "Actual Arrival"> <br>

<label> Flight Status: </label>
<select name = "status" value = "<?php echo "$db_status" ?>" required title = "Flight Status">
<option value = "Took Off"> Took Off </option>
<option value = "Arrived"> Arrived </option>
<option value = "Pending"> Pending </option>
<option value = "Confirmed"> Confirmed </option>
<option value = "Cancelled"> Cancelled </option>
</select> <br> <br>

<label> Business Seats: </label> <br>
<input type = "number" min = "0" name = "business" class = "form-control" value = "<?php echo "$db_business" ?>" required title = "Business Seats"> <br>

<label> Tourist Seats: </label> <br>
<input type = "number" min = "0" name = "tourist" class = "form-control" value = "<?php echo "$db_tourist" ?>" required title = "Tourist Seats"> <br>

<label> Business Ticket: </label> <br>
<input type = "number" min = "0" name = "bus_ticket" class = "form-control" value = "<?php echo "$db_bus_ticket"?>" required title = "Business Ticket"> <br>

<label> Tourist Ticket: </label> <br>
<input type = "number" min = "0" name = "tour_ticket" class = "form-control" value = "<?php echo "$db_tour_ticket" ?>" required title = "Tourist Ticket"> <br>

<!--
<input type = "checkbox" name = "new">
<b style="color:green;"> Edit as new flight. </b><br> <br>

-->

<input type = "submit" name = "submit" class = "btn btn-primary" value = "Save Changes">

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
$ID          = strip_tags($_POST['id']);
$source      = strtoupper(strip_tags($_POST['source']));
$destination = strtoupper(strip_tags($_POST['destination']));
$flightno    = strip_tags($_POST['flightno']);
$flightdate  = strip_tags($_POST['flightdate']);
$departure   = strip_tags($_POST['departure']);
$actual_dep  = strip_tags($_POST['actual_dep']);
$arrival     = strip_tags($_POST['arrival']);
$actual_arr  = strip_tags($_POST['actual_arr']);
$status      = strtoupper(strip_tags($_POST['status']));
$business    = strip_tags($_POST['business']);
$tourist     = strip_tags($_POST['tourist']);
$bus_ticket  = strip_tags($_POST['bus_ticket']);
$tour_ticket = strip_tags($_POST['tour_ticket']);

if($status == "ARRIVED")
{

	
$sql2 = "delete from flights where id='$ID' and flight_no='$flightno'";

$query2 = mysql_query($sql2);


$sql3 = "insert into mining values ('','$source','$destination','$flightdate','$bus_ticket','$tour_ticket')";

$query3 = mysql_query($sql3);

if($query2 && $query3)
{
		echo "<script> 
alert('Arrived flight has been added to statistics table.');
window.location.href='flights.php';
 </script>";
}
else{		echo "<script> 
alert('Error occurred during adding arrived flight to statistics table.');
window.location.href='flights.php';
 </script>";
}

}
}

/*
if(@$_POST['new'])
{
echo $ID;
	$sql = "insert into flights values ('','$source','$destination','$flightno','$flightdate','$departure','00:00:00','$arrival','00:00:00','$status','$business','$tourist','$bus_ticket','$tour_ticket')";

$query = mysql_query($sql);

if($query)
{
echo "<script> 
alert('Flight data has been Added successfully.');
window.location.href='flights.php';
 </script>";
}
else
echo "<script> 
alert('Error occurred during updating flight data, try again.');
window.location.href='flights.php';
 </script>";

}
*/
if(@$_POST['submit'])
{
if($ID and $source and $destination and $flightno and $flightdate and $departure and $actual_dep and $arrival and $actual_arr and $status and $business and $tourist and $bus_ticket and $tour_ticket)
{

$sql2 = "select flight_no from flights where flight_no = '$flightno'";
$query2 = mysql_query($sql2);
while($row = mysql_fetch_assoc($query2))
{
$check = $row['flight_no'];
}

if($check == $flightno and $check != $value)
{
	echo "<script> 
alert('Flight number is already exists, please select another one.');
window.location.href='flights.php';
 </script>";
}

$sql = "update flights set source = '$source', destination = '$destination', flight_no = '$flightno', flight_date = '$flightdate', departure = '$departure', actual_dep = '$actual_dep', arrival = '$arrival', actual_arr = '$actual_arr', status = '$status', business = '$business', tourist = '$tourist', bus_ticket = '$bus_ticket', tour_ticket = '$tour_ticket' where id = '$ID'";

$query = mysql_query($sql);

if($query)
{
echo "<script> 
alert('Flight data has been updated successfully.');
window.location.href='flights.php';
 </script>";
}
else
echo "<script> 
alert('Error occurred during updating flight data, try again.');
window.location.href='flights.php';
 </script>";

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