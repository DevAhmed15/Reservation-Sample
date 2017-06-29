<?php
session_start();
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
<h3>CURRENT FLIGHTS</h3>
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

$email = $_COOKIE['email'];

$search_id = mysql_query("select id from customers where email = '$email'");
while($search = mysql_fetch_assoc($search_id))
{
$customer_id = $search['id'];
}

$sql = "select * from reservations where customer_id = '$customer_id'";

$query = mysql_query($sql);

$numrows = mysql_num_rows($query);

echo "<label><p>Flights on the reservations list (" . $numrows . ")</p></label><br><br>";

if($numrows > 0)
{
echo "<table class = 'table table-striped table-bordered'>";
echo "<thead>";
echo "<tr  class='success'>";
echo "<th>Full Name</th>";
echo "<th>Flight_no</th>";
echo "<th>Class</th>";
echo "<th>Address</th>";
echo "<th>City/State</th>";
echo "<th>Flight Details</th>";
echo "<th>Cancel</th>";
echo "</tr></thead>";
echo "<tbody>";	
while($result = mysql_fetch_assoc($query))
{
$db_id       = $result['id'];
$db_fname    = $result['fname'];
$db_lname    = $result['lname'];
$db_address  = $result['address'];
$db_city     = $result['city'];
$db_state    = $result['state'];
$db_flightno = $result['flight_no'];
$db_class    = $result['class'];

echo "<tr class='info' >";
echo "<td style='padding:20px;margin:20px'>" . $db_fname . " " . $db_lname ."</td>";	
echo "<td style='padding:20px;margin:20px'>" . $db_flightno . "</td>";	
echo "<td style='padding:20px;margin:20px'>" . $db_class . "</td>";
echo "<td style='padding:20px;margin:20px'>" . $db_address . "</td>";
echo "<td style='padding:20px;margin:20px'>" . $db_city . "/" . $db_state . "</td>";
echo "<td>";
echo "<form action = 'show_flight.php' method = 'POST'>
<input type = 'hidden' name = 'db_flightno' value = '$db_flightno'>
<input type = 'submit' value = 'View Flight' class = 'btn btn-success'> </form></td>
";
echo "<td>";
echo "<form action = 'cancel.php' method = 'POST'>
<input type = 'hidden' name = 'db_id' value = '$db_id'>
<input type = 'hidden' name = 'db_class' value = '$db_class'>
<input type = 'hidden' name = 'db_flightno' value = '$db_flightno'>
<input type = 'hidden' name = 'seat_type' value = 'reservation'>
<input type = 'submit' value = 'Cancel' class = 'btn btn-danger'> </form> </td>";
/*echo "<td>";
echo "<form action = 'update.php' method = 'POST'>
<input type = 'hidden' name = 'db_id' value = '$db_id'>
<input type = 'hidden' name = 'db_fname' value = '$db_fname'>
<input type = 'hidden' name = 'db_lname' value = '$db_lname'>
<input type = 'hidden' name = 'db_address' value = '$db_address'>
<input type = 'hidden' name = 'db_city' value = '$db_city'>
<input type = 'hidden' name = 'db_state' value = '$db_state'>
<input type = 'hidden' name = 'db_flightno' value = '$db_flightno'>
<input type = 'hidden' name = 'db_class' value = '$db_class'>
<input type = 'hidden' name = 'db_seattype' value = 'reservation'></form></td>";	
*/
}
echo "</tbody> </table> <br>";
}

$sql2 = "select * from waiting_list where customer_id = '$customer_id'";
$query2=mysql_query($sql2);
$numrwos2 =  mysql_num_rows($query2);
if($numrwos2 > 0)
{

echo "<label><p>Flights on the waiting list (" . $numrwos2 . ")</p></label><br><br>";


echo "<table class = 'table table-striped table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th>Full Name</th>";
echo "<th>Flight_no</th>";
echo "<th>Class</th>";
echo "<th>Address</th>";
echo "<th>City/State</th>";
echo "<th>Flight Details</th>";
echo "<th>Cancel</th>";
echo "<th>Update</th>";
echo "</tr></thead>";
echo "<tbody>";	
while($result2 = mysql_fetch_assoc($query2))
{
$db_id      = $result2['id'];
$db_fname    = $result2['fname'];
$db_lname    = $result2['lname'];
$db_address  = $result2['address'];
$db_city     = $result2['city'];
$db_state    = $result2['state'];
$db_flightno = $result2['flight_no'];
$db_class    = $result2['class'];
$db_phoneno  = $result2['phone_no'];
$db_date     = $result2['birth_date'];

echo "<tr>";
echo "<td>" . $db_fname . " " . $db_lname ."</td>";	
echo "<td>" . $db_flightno . "</td>";	
echo "<td>" . $db_class . "</td>";
echo "<td>" . $db_address . "</td>";
echo "<td>" . $db_city . "/" . $db_state . "</td>";
echo "<td>";
echo "<form action = 'show_flight.php' method = 'POST'>
<input type = 'hidden' name = 'db_flightno' value = '$db_flightno'>
<input type = 'submit' value = 'Show Flight' class = 'btn btn-success'> </form></td>
";
echo "<td>";
echo "<form action = 'cancel.php' method = 'POST'>
<input type = 'hidden' name = 'db_id' value = '$db_id'>
<input type = 'hidden' name = 'db_class' value = '$db_class'>
<input type = 'hidden' name = 'db_flightno' value = '$db_flightno'>
<input type = 'hidden' name = 'seat_type' value = 'waiting'>
<input type = 'submit' value = 'Cancel' class = 'btn btn-danger'> </form> </td>";
echo "<td>";
echo "<form action = 'update.php' method = 'POST'>
<input type = 'hidden' name = 'db_id' value = '$db_id'>
<input type = 'hidden' name = 'db_fname' value = '$db_fname'>
<input type = 'hidden' name = 'db_lname' value = '$db_lname'>
<input type = 'hidden' name = 'db_address' value = '$db_address'>
<input type = 'hidden' name = 'db_city' value = '$db_city'>
<input type = 'hidden' name = 'db_state' value = '$db_state'>
<input type = 'hidden' name = 'db_flightno' value = '$db_flightno'>
<input type = 'hidden' name = 'db_class' value = '$db_class'>
<input type = 'hidden' name = 'db_phoneno' value = '$db_phoneno'>
<input type = 'hidden' name = 'db_seattype' value = 'waiting'>
<input type = 'submit' value = 'Update' class = 'btn btn-info'> </form></td>";	
}
echo "</tbody> </table> <br>";
}
@$_SESSION["flight"] = $db_flightno;
@$_SESSION["resID"] =$db_id;
@$_SESSION["Class"]=$db_class;
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