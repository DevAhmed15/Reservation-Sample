<!DOCTYPE html>
<html>
<head>
<title>Vanilla AIRLINES</title>
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

<label> <p>Please enter your email address, we will send you a confirmation message to set a new password: </p></label><br><br>

<div class='container padding-top-10'>
<div class='panel panel-default'>
<div class='panel-heading'>
<label>Forget Password</label>
</div>
<div class='panel-body'>

<form action = "forget_pass.php" method = "POST" class = "form-horizontal">
<div class = "row">
<div class = "col-xs-5">
<label> Email Address: </label> <br>
<input type = "email" name = "email" class = "form-control" autocomplete = "off" placeholder = "Email Address" required title = "Email Address"> <br>

<input type = "submit" name = "submit" value = "Recover Account" class = "btn btn-success">
<br><br>
</div> </div>
</form>

</div></div></div>

<?php 

$con = mysqli_connect("localhost","root","")
or die("Failed to connect to the server: " . mysqli_error());

mysqli_select_db($con,"airlines")
or die("Failed to connect to the database: " . mysqli_error());

if(@$_POST['submit']){
$email = strip_tags(strtoupper($_POST['email']));
$submit = $_POST['submit'];

if($submit)
{
$recover = mysqli_query($con,"select * from customers where email='$email'");

$num = mysqli_num_rows($recover);

if($num == 1)
{
$message = "You can set a new password from <a href='newpass.php?email=".$email."'>here</a>";
$headers = 'From: webmaster@example.com' . "\r\n";

$mail = mail($email, "Forget Password: Vanilla AIR", $message,$headers);

if($mail)
//echo $message;
echo "<label><p>A confirmation message has been sent to your email .. check it. </label></p>";

else
echo "<label><p>Error occurred during sending a confirmation message to your email address .. try again !! </p></label>";
}
else
echo "<label> <p>There is no account with that email .. try again !! </label></p>";
echo "<br><br>";
}
}
?>

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
<div class="top-grid">
<img src="images/44.jpg" alt="" />
<div class="top-grid-info">
<h3>Boat View</h3>
<p>Have many friends is very important for me, but there are some things that I need to do for myself, such as to study some courses for a test.</p>
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
<h3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Best Pilots in our Company  </h3>
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