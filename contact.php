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
<!-- mail -->
<div class="mail">
<!-- container -->
<div class="container">
<div class="mail-info">
<h3>OUR LOCATION</h3>
</div>
<div class="map">

<iframe src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=City+of+Westminster,+United+Kingdom&amp;aq=0&amp;oq=westmi&amp;sll=51.50917,-0.245132&amp;sspn=0.311545,0.837021&amp;ie=UTF8&amp;hq=&amp;hnear=City+of+Westminster,+Greater+London,+United+Kingdom&amp;ll=51.483521,-0.082054&amp;spn=0.155803,0.41851&amp;t=m&amp;z=12&amp;output=embed"></iframe>
</div>
<div class="mail-info-grids">
<div class="col-md-6 mail-info-grid">
<h3>Contact Information</h3>
<p>
IF you have any suggesstions or complaints we would love to contact us, please help us to improve our service.
</p>
<h6>Vanilla AIR.
<span>EUROPE Airport,</span>
CD-Road,M 07 435.
</h6>
<p>Telephone: 01118158720
<span>FAX: +1 234 567 9871</span>
E-mail: <a href="mailto:info@example.com">ahmed.fcih1@gmail.Com</a>
</p>
</div>
<div class="col-md-6 contact-form">
<form action = "contact.php" method = "POST">
<input type="text" name = "name" autocomplete = "off" placeholder="Name:" required title="Your Name">

<input type="text" name = "email" autocomplete = "off" placeholder="Email:" required title="Email Address">

<input type="text" name = "subject" autocomplete = "off" placeholder="Subject:" required title="Subject">

<textarea placeholder="Message:" name = "message" autocomplete = "off" required title="Your Message"></textarea>

<input type="submit" name = "submit" value="SEND">
</form>

<br>

<?php

$con = mysqli_connect("localhost","root","")
or die("Failed to connect to the server: " . mysqli_error());

mysqli_select_db($con, "airlines")
or die("Failed to connect to the database: " . mysqli_error());

if(@$_POST['submit']){
$name    = strip_tags($_POST['name']);
$email   = strip_tags($_POST['email']);
$subject = strip_tags($_POST['subject']);
$message = nl2br(strip_tags($_POST['message']));
$submit  = $_POST['submit'];

if($submit)
{
$query = mysqli_query($con, "insert into contact values('','$name','$email','$subject','$message','0')");

if($query)
echo "<label>Your message has been sent succeessfully, thanks for contacting us. </label>";

else
echo "<label><p>Error occurred during sending your message .. try again !! </p></label>";
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
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About</a></li>
<li><a href="contact.php">Contact Us</a></li>   
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