<?php
session_start();
$con = mysql_connect("localhost","root","")
or die("Failed to connect to the server: " . mysql_error());

mysql_select_db("airlines")
or die("Failed to connect to the database: " . mysql_error());

if(!isset($_COOKIE['email']))
{

echo "<script> 
alert('Your session has timed out ... login again');
window.location.href='logout.php';
 </script>";	
}

$email = $_COOKIE['email'];

$FN =$_SESSION["flight"] ;

$query = mysql_query("select id from customers where email = '$email'");
while($row = mysql_fetch_assoc($query))
{
$customer_id = $row['id'];
}

$query2 = mysql_query("select * from flights,reservations WHERE reservations.flight_no=flights.flight_no AND reservations.customer_id='$customer_id'");
while($row2 = mysql_fetch_assoc($query2))
{
	$source=$row2['source'];
	$destination=$row2['destination'];
	$flight_date=$row2['flight_date'];
	$class=$row2['class'];
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
<link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
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
<!-- header -->
<div class="header">
<div class="head-bg">
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
<!-- container -->
<div class="container">
<!-- banner Slider starts Here -->
<script src="js/responsiveslides.min.js"></script>
<script>
// You can also use "$(window).load(function() {"
$(function () {
// Slideshow 4
$("#slider3").responsiveSlides({
auto: true,
pager: false,
nav: false,
speed: 500,
namespace: "callbacks",
before: function () {
$('.events').append("<li>before event fired.</li>");
},
after: function () {
 $('.events').append("<li>after event fired.</li>");
}
});
});
</script>
<!--//End-slider-script -->

<!-- container -->
</div>
<!-- //header -->
<!-- banner-grids -->
<div class="banner-grids">
<!-- container -->
<div class="container">
<div class="mail-info">
<h3> Update Reservation</h3>
</div>
<div class="banner-grid-info">


<br>
<div class="container padding-top-10">
<div class="panel panel-default">
<div class="panel-heading">
<b>Reservation Data</b>
</div>
<div class="panel-body">
<form action ="update.php" method = "POST">
<div class="online_reservation">
<div class="b_room">
<div class="booking_room">
<div class="reservation">
<ul>		
<li  class="span1_of_1 left">
<h5>From</h5>
<div class="book_date">
<input type="text" name = "departure" placeholder="Type Depature City" required title = "Departure City" id = "departure" class = "form-control" 
value="<?php echo $source ?>">

</div>					
</li>
<li  class="span1_of_1 left">
<h5>To</h5>
<div class="book_date">

<input type="text" name = "destination" placeholder="Type Destination City" required title = "Destination City" class = "form-control" id = "destination"
value="<?php echo $destination ?>">

</div>
</li>
<li  class="span1_of_1 left">
<h5>DATE</h5>
<div class="book_date">

<input type = "date" required title = "Flight Date" name = "date" class = "form-control" value="<?php echo $flight_date ?>">

</div>					
</li>

<li class="span1_of_1">
<h5>Class</h5>
<div class="section_room">

<select id="country" onchange="change_country(this.value)" class="form-control" name = "class" required>
<option><?php echo $class ?></option>
<option value="Business">Business</option>
<option value="Tourist">Tourist</option>
</select>

</div>	
</li>
<li class="span1_of_3">
<div class="date_btn">

<input type="submit" value="Find Update Flight" name = "submit" class = "btn btn-warning" style = "height:35px; width:150px; font-size:15px;"/>
</form>
<br>
</div>
</li>
<div class="clearfix"></div>
</ul>
</div>
</form>
</div>
</div>
</div>
</div>


<?php
if(@$_POST['submit']) {
$departure   = strtoupper(strip_tags($_POST['departure']));
$destination = strtoupper(strip_tags($_POST['destination']));
$date        =strip_tags($_POST['date']);
$class2       =strip_tags($_POST['class']);

if($departure and $destination and $date and $class)
{
$sql = "select * from flights where source = '$departure' and destination = '$destination' and flight_date = '$date' and status = 'PENDING'";
$query = mysql_query($sql);
$numrows = mysql_num_rows($query);

//echo $date . "    ";

while($row = mysql_fetch_assoc($query))
{
 echo $row['source'];
//if($row['source'] == $departure and $row['destination'] == $destination and $row['flight_date'] == $date and $class == $class2)
//echo "<script> alert('Data Not Changed , Try again');window.location.href='index.php';</script>";
//else
//	header('location:res.php');
}

}
}

/*
if($submit)
{
if($id and $fname and $lname and $sex and $date and $address and $city and $state and $phoneno and $flightno and $class and $baseclass and $seat)
{

$check = mysql_query("select status from flights where flight_no = '$flightno'");

while($rows = mysql_fetch_assoc($check))
{
$flight_status = $rows['status'];
}

if($flight_status != "PENDING")
{
echo $flightno;
echo "select status from flights where flight_no = '$flightno'";

die("<label><p>Your flight has been confirmed, cannot update it.</p></label>
<br> <br><h3 style = 'color:red;'>Warning: if you didn't commit to your flight, you will be subject to legal resposibility. </h3> <br>
<label> <a style = 'color:green;' href = 'profile.php'> MAIN PAGE </a> </label>
");
}

if($seat == "reservation")
{
if($class == $baseclass)
{
$sql = mysql_query("update reservations set fname = '$fname', lname = '$lname', sex = '$sex', birth_date = '$date', address = '$address', city = '$city', state = '$state', phone_no = '$phoneno' where id = '$id' and flight_no = '$flightno'");

if($sql)
echo "<label><p>Your reservation has been updated successfully.</p></label>";
}

else
{
$sql2 = mysql_query("select $baseclass, $class from flights where flight_no = '$flightno'");

while($result = mysql_fetch_assoc($sql2))
{
$old = $result[$baseclass];
$new = $result[$class];
}

$update_old = $old + 1;

if($new == 0)
{
$sql5 = mysql_query("delete from reservations where id = '$id'");
$sql6 = mysql_query("insert into waiting values('','$fname','$lname','$sex','$date','$address','$city','$state','','$phoneno','$class','$flightno', '$customer_id')");
$sql7 = mysql_query("update flights set $baseclass = '$update_old' where flight_no = '$flightno'");
if($sql5 and $sql6 and $sql7)
{
echo "<label><p>Your reservation is put on the waiting list because there is not available seats on selected class. </p></label><br>";
echo "<label><p>Flights tabel updated. </p></label>";
}
else
echo "<label><p>Error occurred during updating reservation, try again !!</p></label>";
}
else if($new != 0)
{
$update_new = $new - 1;
$sql3 = mysql_query("update reservations set fname = '$fname', lname = '$lname', sex = '$sex', birth_date = '$date', address = '$address', city = '$city', state = '$state', phone_no = '$phoneno', class = '$class' where id = '$id' and flight_no = '$flightno'");
$sql4 = mysql_query("update flights set $class = '$update_new', $baseclass = '$update_old' where flight_no = '$flightno'");

if($sql3 and $sql4)
{
echo "<label><p>Your reservation has been updated successfully.</p></label><br>";
echo "<label><p>Flights table updated.</p></label>";
}
else
echo "<label><p>Error occurred during updating reservation .. try again !!</p></label>";
}

}

}
else
{
$sql8 = mysql_query("select $class,$baseclass from flights where flight_no = '$flightno'");

while($result2 = mysql_fetch_assoc($sql8))
{
$old_class = $result2[$baseclass];
$new_class = $result2[$class];
}
$update1 = $old_class + 1;
$update2 = $new_class - 1;

if($new_class == 0)
{
$sql9 = mysql_query("update waiting set fname = '$fname', lname = '$lname', sex = '$sex', birth_date = '$date', address = '$address', city = '$city', state = '$state', phone_no = '$phoneno', class = '$class' where flight_no = '$flightno' and id = '$id'");
//$sql10 = mysql_query("update flights set $baseclass = '$update1' where flight_no = '$flightno'");

if($sql9)
{
echo "<label><p>Your reservation has been updated successfully. </p></label><br>";
echo "<label><p>Note: Still at the waiting list. </p></label>";
//echo "<label><p>Flights table updated. </p></label>";	
}
else
echo "<label><p>Error occurred during updating your reservatino .. try again !1 </p></label>";
}

else
{
$sql11 = mysql_query("delete from waiting where id = '$id'");
$sql12 = mysql_query("update flights set $class = '$update2' where flight_no = '$flightno'");
$sql13 = mysql_query("insert into reservations values('','$fname','$lname','$sex','$date','$address','$city','$state','','$phoneno','$class','$flightno','$customer_id')");

if($sql11 and $sql12 and $sql13)
{
echo "<label><p>Your reservation has been updated successfully.</p></label><br>";
echo "<label><p>Note: moved from the waiting list :) </p> </label><br>";
echo "<label><p>Flights table updated.</p></label>";	
}
else
echo "<label><p>Error occurred during updating reservation .. try agian !! </p></label>";
}

}

}
else
echo "<label><p>Please fill in all fields.</p></label>";	
}

require("refresh.php");
*/
?>

<!-- //container -->
</div>
<!-- //banner-grids -->
<!-- before -->
<div class="before">
<!-- container -->
<div class="container">
<h2> Best Pilots in Our Company </h2>
<div class="before-grids">
<div class="before-grid">
<?php
require("pilots.php");
?>
</div>
<div class="clearfix"> </div>
<div class="search">
</div>
</div>
</div>
<!-- //container -->
</div>
<!-- //before -->
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