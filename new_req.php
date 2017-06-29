<?php
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

$search_id = mysql_query("select * from customers where email = '$email'");
while($search = mysql_fetch_assoc($search_id))
{
$customer_id = $search['id'];
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
</div>
<div class="banner-grid-info">


<div class="container padding-top-10">
<div class="panel panel-default">
<div class="panel-heading">
<b>Reserve Flight</b>
</div>
<div class="panel-body">
<form class = "form-horizontal" action = "new_req.php" method = "POST">


<label> Source: </label> <br>
<input type = "text" name = "source" autocomplete = "off" class = "form-control" requierd title = "Flight Departure"> <br>

<label> Destination: </label> <br>
<input type = "text" name = "destination" autocomplete = "off" class = "form-control" required title = "Flight Destination"> <br>

<label> Flight Date: </label> <br>
<input type = "date" name = "flight_date" class = "form-control" required title = "Flight Date"> <br>
<label> Class: </label> <br>
<select id="country" onchange="change_country(this.value)" class="form-control" name = "class" required>
<option value="Business">Business</option>
<option value="Tourist">Tourist</option>
</select>
<br><br>
<input type = "hidden" name = "customer_id" value = "<?php echo "$customer_id" ?>">

<label> Flight Importance ( For Priority ) </label>
<select name = "importance" required title = "Flight Status">
<option value = "3"> High </option>
<option value = "2"> Normal </option>
<option value = "1"> low </option>
</select> <br> <br>
<br><br>
<input type = "submit" name = "submit" class = "btn btn-primary" value = "Add Request">


</form>
<?php


if(@$_POST['submit']){
$source      = strtoupper(strip_tags($_POST['source']));
$destination = strtoupper(strip_tags($_POST['destination']));
$flightdate  =$_POST['flight_date'];
$class   = strip_tags($_POST['class']);
$importance     = strip_tags($_POST['importance']);

$check = mysql_query("select * from flights where flight_date = '$flightdate' && source ='$source' && destination = '$destination'");
$numrows = mysql_num_rows($check);
if($numrows == 1)
{
echo "<script> 
alert('Flight number is already exists please enter another one.');
window.location.href='index.php';
 </script>";	
}

if($source and $destination and $flightdate and $class and $importance)
{
$sql = "insert into requests values ('','$source','$destination','$flightdate','$class','$customer_id','$importance','0')";

$query = mysql_query($sql);

if($query)
	echo "<script> 
alert('Request has been added successfully.');
window.location.href='profile.php';
 </script>";
else
	echo "<script> alert(' Error occurred during adding a new request, try again.'); </script>";
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