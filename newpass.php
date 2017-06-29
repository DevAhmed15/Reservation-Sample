<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>TURKISH AIRLINES</title>
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
<!--
<div  id="top" class="callbacks_container">
<ul class="rslides" id="slider3">
<li>
<div class="head-info">
<h1>TURKISH AIRLINES</span></h1>
<p>THIS IS THE FORMAL WEBSITE OF TURKISH AIRLINES</p>
</div>
</li>
<li>
<div class="head-info">
<h1> TURKISH AIRLINES </span></h1>
<p>WIDEN YOUR WORLD</p>
</div>
</li>
<li>
<div class="head-info">
<h1>TURKISH AIRLINES</span></h1>
<p>TRAVEL AROUND THE WORLD WITH TURKUSH AIRLINES</p>
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

<h4><label> Please enter new password (must be at least 6 characters). </label> </h4><br>

<div class='container padding-top-10'>
<div class='panel panel-default'>
<div class='panel-heading'>
<label>Recover Account</label>
</div>
<div class='panel-body'>

<form action = "newpass.php" method = "POST" class = "form-horizontal">
<div class = "row">
<div class = "col-xs-5">
<label> New Password: </label> <br>
<input type = "hidden" name = "email" value = "<?php echo $_GET['email'] ?>">
<input type = "password" name = "password" class = "form-control" placeholder = "New Password" required title = "New Password"> <br>

<input type = "submit" name = "submit" value = "Change Password" class = "btn btn-default">
</div> </div> <br>
</form>
</div></div></div>

<?php

$email  = $_POST['email'];
$pass   = $_POST['password'];
$submit = $_POST['submit'];

$con = mysqli_connect("localhost","root","")
or die("Failed to connect to the server: " . mysqli_error());

mysqli_select_db($con,"airlines")
or die("Failed to connect to the database: " . mysqli_error());

if($submit)
{
if(strlen($pass) < 6)
{
echo "<label><p>Short Password: it must be at least 6 characters. </p><label><br><br>";
}
else
{
$update = mysqli_query($con, "update customers set password = '$pass' where email = '$email'");

if($update)
echo "<label><p>New password has been set successfully.</p></label><br><br>";

else
echo "<label><p>Error occurred during setting a new password .. try again !! </p></label><br><br>";
}
}
?>

<h3>TOP DESTINATIONS</h3><br>
<p>If you are travelling for a tourism tour, these cities are recommend for you !!</p>
</div>
<div class="top-grids">
<div class="top-grid">
<img src="images/6.jpg" alt="" />
<div class="top-grid-info">
<h3>Vestibulum auctor</h3>
<p>Morbi id felis porttitor tellus viverra pulvinar. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices .</p>
</div>
</div>
<div class="top-grid">
<img src="images/3.jpg" alt="" />
<div class="top-grid-info">
<h3>Vestibulum auctor</h3>
<p>Morbi id felis porttitor tellus viverra pulvinar. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices .</p>
</div>
</div>
<div class="top-grid">
<img src="images/2.jpg" alt="" />
<div class="top-grid-info">
<h3>Vestibulum auctor</h3>
<p>Morbi id felis porttitor tellus viverra pulvinar. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices .</p>
</div>
</div>
<div class="top-grid">
<img src="images/4.jpg" alt="" />
<div class="top-grid-info">
<h3>Vestibulum auctor</h3>
<p>Morbi id felis porttitor tellus viverra pulvinar. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices .</p>
</div>
</div>
<div class="clearfix"> </div>
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
<p>copyright@<a href="http://www.turkishairlines.com">Turkish Airlines</a> All Rights Reserved</p>
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