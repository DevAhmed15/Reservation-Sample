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




<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/basic-template.css" rel="Stylesheet" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
</div>
<div class="collapse navbar-collapse" id="navbar-container">
<form class="navbar-form navbar-left" role="form" action="login.php" method="POST">
<b"><a href = "index.php">
<img src = "t.png" href = "index.php">
</a></b>
<b style="color:#C30;">Vanilla AIR</b>
&nbsp; &nbsp; &nbsp; &nbsp;
<b style="color:#039;"> Wrong username or password !!</b>
&nbsp;&nbsp; &nbsp; &nbsp;
<div class="input-group">
<span class="input-group-addon">
<span class="glyphicon glyphicon-user"></span>
</span>
<input type="email" name="email" class="form-control input-sm" placeholder="Email Address" required title = "Email Address" autocomplete = "off"/>
</div>
<div class="input-group">
<span class="input-group-addon">
<span class="glyphicon glyphicon-lock"></span>
</span>
<input type="password" class="form-control input-sm" placeholder="Password" name="password" required title="Password"/>
</div>
<input type="submit" name="submit" class="btn btn-primary" value="Login">
&nbsp; &nbsp;
<a href = "forget_pass.php" style="color:red;">forget your password?</a>
</form>
</div>
</div>
</nav>


<a href="index.php"><img src="images/logo1.png" alt="" /></a>
</div>
<div class="top-nav">
<span class="menu"><img src="images/menu.png" alt=""></span>
<ul class="cl-effect-1">
<li><a href="index.php">HOME</a></li>                                    
<li><a href="about.php">ABOUT</a></li>
<li><a href="register.php">CREATE ACCOUNT</a></li>
<li><a href="check_flight.php">CHECK FLIGHT</a></li> 
<li><a href="staff2.php">STAFF MEMBERS</a></li> 
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