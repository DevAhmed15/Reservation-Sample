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
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About</a></li> 
<li><a href="contact.php">Contact Us</a></li>
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
<!-- about -->
<div class="about">
<!-- container -->
<div class="container">
<div class="about-info">
<h4 style="text-align: center;">
This is the formal website of the Vanilla airlines.
</h4>
<hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 1px;" />
<p style="text-align: center;color: red">
Vanilla Airlines is a company ... Managed by Japanise government. <br>
Vanilla Airlines ia a company working at AIR Travel. <br>
Vanilla Airlines covers more than 100 countries around the world. <br>
Address: Vanilla Airport. <br>
Number of employees working: 3000 <br>
Current Manager: Recep Tayyip Erdogan <br>
Phone Number: 01118158720 <br>
Email Address: ahmed.fcih1@Gmail.Com <br>
</p>
</div>
</div>
<!-- //container -->
</div>
<!-- about -->
<!-- about-banner -->
<div class="about-banner">
<div class="banner-bg">
<h3> WE OFFER !! </h3>
<div class="read-more">
<a href = "index.php"> TAKE A TOUR </a>
</div>
</div>
</div>
<!-- about-banner -->
<!-- team -->
<div class="team">
<!-- container -->
<div class="container">
<div class="team-info">
<h3>DEVELOPMENT TEAM</h3>
</div>
<div class="team-grids">
<div class="team-grid">
<img src="images/7.jpg" alt="" />
<div class="team-grid-info">
<h4>Nada Salah</h4>
<p>Name: Nada Mohamed Salah
ID: 201-200-3 <br>
Department: IS <br>
</p>
</div>
</div>
<div class="team-grid">
<img src="images/8.jpg" alt="" />
<div class="team-grid-info">
<h4>MOHAMMED SAMIR</h4>
<p>Name: Mohamed Samir Abdelgelil <br>
ID: 201-200-33 <br>
Department: IT <br>
</p>
</div>
</div>
<div class="team-grid">
<img src="images/9.jpg" alt="" />
<div class="team-grid-info">
<h4>Mona Hisham</h4>
<p>Name: Mona Hisham Fouad <br>
ID: 201-200-31 <br>
Department: BI <br>
</p>
</div>
</div>
<div class="team-grid">
<img src="images/10.jpg" alt="" />
<div class="team-grid-info">
<h4>Youssef Saber</h4>
<p>Name: Youssef Saber Hanfy <br>
ID: 201-200-30 <br>
Department: CS <br>
</p>
</div>
</div>
<div class="clearfix"> </div>
</div>
</div>
<!-- container -->
</div>
<!-- //team -->
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
containerHoverID: 'toTopHover', //fading element hover id
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