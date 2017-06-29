<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Vanilla Air</title>
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
<li><a href="register.php">CREATE ACCOUNT</a></li>
<li><a href="check_flight.php">CHECK FLIGHT</a></li>
<li><a href="staff2.php">STAFF MEMEBERS</a></li>
<li><a href="contact.php">CONTACT US</a></li>  
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
<div  id="top" class="callbacks_container">
<ul class="rslides" id="slider3">
<li>
<div class="head-info">
<h1>Vanilla AIR</span></h1>
<p>THIS IS THE FORMAL WEBSITE OF Vanilla AIRLINES</p>
</div>
</li>
<li>
<div class="head-info">
<h1> Vanilla AIRLINES </span></h1>
<p>WIDEN YOUR WORLD</p>
</div>
</li>
<li>
<div class="head-info">
<h1>Vanilla AIRLINES</span></h1>
<p>TRAVEL AROUND THE WORLD WITH Vanilla AIRLINES</p>
</div>
</li>
</ul>
</div>

</div>
<!-- container -->
</div>
<!-- //header -->
<!-- banner-grids -->
<div class="banner-grids">
<!-- container -->
<div class="container">
<div class="banner-grid-info">

<?php

$con = mysql_connect("localhost","root","")
or die("Failed to connect to the server: " . mysql_error());

mysql_select_db("airlines")
or die("Failed to connect to the database: " . mysql_error());

if(@$_POST['register']){
$fname = strip_tags($_POST['firstname']);
$lname = strip_tags($_POST['lastname']);
$email = strip_tags($_POST['email']);
$pass  = strip_tags($_POST['password']);
$conf  = strip_tags($_POST['confpass']);
$register = $_POST['register'];
$check = mysql_query("select email from customers where email = '$email'");

$checkrows = mysql_num_rows($check);
if($checkrows == 1)
{
die("<br><br><p>Email address exists, please type another one.</p>");
}

if($register)
{

if($fname and $lname and $email and $pass and $con)
{
if($pass == $conf)
{
if(strlen($pass) >= 6)
{
$sql = "insert into customers values(
'','$fname','$lname','$email','$pass')";

$query = mysql_query($sql);
if($query)
	echo "<script> 
alert('Registered successfully >> You Can Login NOW');
window.location.href='index.php';
 </script>";
else
echo "<script> alert('Error'); </script>";
}
else
{
	echo "<script> 
alert('Short Password: password must be at least 6 characters');
 </script>";
}
}
else
{
echo "<br><br><p>Password and confirm password are not matching. </p>";	
}
}
else
{
echo "<br><br><p> Please fill in all fields. </p>";	
}
}
}
?>

<label> <p>You must create an account so that you can reserve flight. </p></label>
<br><br>
<div class="container padding-top-10">
<div class="panel panel-default">
<div class="panel-heading">
<b>Create Account</b>
</div>
<div class="panel-body">
<form action = "register.php" method = "POST">

<label class="control-label">(*)Full Name:</label>
<div class="row">
<div class="col-md-6 padding-top-10">
<input type="text" name = "firstname" class="form-control" placeholder="First Name" required title="First Name" autocomplete = "off"/>
</div>
<div class="col-md-6 padding-top-10">
<input type="text" name = "lastname" class="form-control" placeholder="Last Name" required title = "Last Name" autocomplete = "off"/>
</div>
</div>
<br>

<label class="control-label padding-top-10">(*)Email:</label>
<div class="row padding-top-10">
<div class="col-md-12">
<input type="email" name = "email" class="form-control" autocomplete = "off" required title = "Email Address" placeholder="Email Address"/>							
</div>
</div>
<br>

<div class="row">
<div class="col-md-6 padding-top-10">
<label class="control-label">(*)Password:</label>
<input type="password" name = "password" class="form-control" autocomplete = "off" placeholder="Password" required title = "Password"/>
</div>

<div class="row">
<div class="col-md-5 padding-top-10">
<label class="contorl-label"> (*)Confirm Password: </label>
<input type = "password" name = "confpass" class = "form-control" required title = "Confirm Password" placeholder = "Confirm Password">
</div>
</div>
<br><br>

<div class="row">
<div class="col-md-2">
&nbsp; &nbsp; &nbsp; &nbsp;<input type = "submit" name = "register" value = "Register" class="btn btn-primary">
</div>
</div>
<br>
</form>
</div>
</div>
</div>
      
<br><br><br>

<h3>Top Definations</h3><br>
<p>If you are travelling for a tourism tour, these cities are recommend for you </p>
</div>
<div class="top-grids">
<div class="top-grid">
<img src="images/6.jpg" alt="" />
<div class="top-grid-info">
<h3>Vestibulum auctor</h3>
<p>This Friday I went to the Salt Lake City with 3 friends. There were 2 Chinese girls and 1 American. This is the first time I went to the city since I arrived in Utah. We spent 45 minutes taking the 811 bus to Sandy and then transferring to the Delta train. It was very interesting; I had never taken a train in America. .</p>
</div>
</div>
<div class="top-grid">
<img src="images/3.jpg" alt="" />
<div class="top-grid-info">
<h3>The Tower</h3>
<p>We visited Temple Square first. The temple was so huge and magnificent! There were many different language tour guides. We joined the Chinese group so that we could listen to the explanations clearly. It was easy for us to understand what the sister explained about the history. After visiting the temple, we got free tickets to go to see the new Church film .</p>
</div>
</div>
<div class="top-grid">
<img src="images/2.jpg" alt="" />
<div class="top-grid-info">
<h3>Hotel</h3>
<p>The movie name was The Testaments; it described the life of Jesus and his kind behaviors. I loved this movie, although I couldn’t understand all the details; some sentences were difficult for me to understand. We went to a big mall to eat fast food for our lunch. You know that ordering the food was a little difficult for me.</p>
</div>
</div>
<div class="top-grid">
<img src="images/4.jpg" alt="" />
<div class="top-grid-info">
<h3>View</h3>
<p>I was nervous, so I chose an easy way to get my food. I ordered a special meal and got a whole meal of food for myself. There was the main dish, dessert, and a cup of drink. I enjoyed this small trip; it gave me a good memory .</p>
</div>
</div>

<div class="clearfix"> </div>
</div>
<div class="top-grid">
<img src="images/11 (2).jpg" alt="" />
<div class="top-grid-info">
<h3>Vanilla Villa</h3>
<p>The human being is a sociable being and almost never to be alone. Also there is a popular expression that said ìthe together we are stringerî. Everything in this world has been done working in group.</p>
</div>
</div>
<div class="top-grid" style="padding-right: 15px;">
<img src="images/22.jpg" alt="" />
<div class="top-grid-info">
<h3>How I Spend My Time</h3>
<p>I prefer spending my time with my friends. These friends are good, because itís very fun with my friends. I can practice different sports. I can achieve better results in my work. I can get many thins cheaper for my apartment. I can go dancing. Also I can get to know many new experiences and receive much advice .</p>
</div>
</div>
<div class="top-grid">
<img src="images/33.jpg" alt="" />
<div class="top-grid-info">
<h3>Vestibulum auctor</h3>
<p>I have many beautiful experiences with my Peruvian friends. For example Camping, when we have traveled to others cities, Conference of the church, championship of Basketball and Volleyball, visit to museums, speak with my friends of the ward, when we go to the beach, and when we go to cinema.</p>
</div>
</div>

</div>
<!-- //container -->
</div>
<!-- //banner-grids -->
<!-- before -->
<div class="before">
<!-- container -->
<div class="container">
<h2> The best pilots in our company: </h2>
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
<li><a href="register.php">CREATE ACCOUNT</a></li>  
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