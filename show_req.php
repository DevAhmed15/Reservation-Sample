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
<h3>VIEW MESSAGE</h3>
</div>
<div class="map">
</div>
<div class="mail-info-grids">
<div class="col-md-6 mail-info-grid">

<?php
$con = mysqli_connect("localhost","root","")
or die("Failed to connect to the server: " . mysqli_error());

mysqli_select_db($con, "airlines")
or die("Failed to connect to the database: " . mysqli_error());

$id = $_POST['id'];

$query = mysqli_query($con,"UPDATE requests SET Checked = 1 WHERE id='$id'");

$source = $_POST['source'];
$destination = $_POST['destination'];
$importance = $_POST['importance'];
$flight_date = $_POST['flight_date'];
$class = $_POST['class'];
$customer_id = $_POST['customer_id'];

//echo "<div style='border: 1px solid black'>";
echo "<table class = 'table table-striped table-bordered'>";

echo "<tr>";
echo "<td> Source : </td>";
echo "<td>" . $source . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td> Destination : </td>";
echo "<td>" . $destination . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td> Flight Date: </td>";
echo "<td>" . $flight_date . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td> Class : </td>";
echo "<td>" . $class . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td> Priority : </td>";
if($importance == 3) echo "<td>" . 'High' . "</td>";
else if($importance == 2) echo "<td>" . 'Normal' . "</td>";
else echo "<td>" . 'Entertainment' . "</td>";
echo "</tr>";

echo "</table>";
//echo "</div>";

?>
<h3><a href="requests.php">Back</a></h3>
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