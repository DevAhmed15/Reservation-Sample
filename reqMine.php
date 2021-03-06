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
<h3>Requests</h3>
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

$query = mysqli_query($con,"select * from requests order by id DESC");

$numrwos = mysqli_num_rows($query);

if($numrwos > 0)
{
echo "<table class = 'table table-striped table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th> ID </th>";
echo "<th> Source </th>";
echo "<th> Destination </th>";
echo "<th> Date </th>";
echo "<th> Class </th>";
echo "<th> Priority </th>";
echo "<th> Status </th>";
echo "<th> Cancel </th>";
echo "</tr> </thead>";
echo "<tbody>";

while($result = mysqli_fetch_array($query))
{
$id = $result['id'];
$source = $result['source'];
$destination = $result['destination'];
$importance = $result['importance'];
$flight_date = $result['flight_date'];
$class = $result['class'];
$customer_id = $result['customer_id'];
$stat=$result['Checked'];

$msg="";
if($importance == 3) 
    $msg="High";
else if($importance == 2) 
   $msg="Normal"; 
else $msg="Entertainment";

$st ="";
if($stat == 0) 
    $st="Not Checked";
else $st="Checked and Put ON Probation ";

echo "<tr>";
echo "<td>"  . $id . "</td>";	
echo "<td>"  . $source . "</td>";	
echo "<td>"  . $destination . "</td>";	
echo "<td>"  . $flight_date . "</td>";	
echo "<td>"  . $class . "</td>";	
echo "<td>"  . $msg . "</td>";
echo "<td>"  . $st . "</td>";

echo "<td>";
echo "
<form action = 'canReq.php' method = 'POST'>
<input type = 'hidden' name = 'id' value = '$id'>
<input type = 'hidden' name = 'source' value = '$source'>
<input type = 'hidden' name = 'destination' value = '$destination'>
<input type = 'hidden' name = 'importance' value = '$importance'>
<input type = 'hidden' name = 'flight_date' value = '$flight_date'>
<input type = 'hidden' name = 'class' value = '$class'>
<input type = 'hidden' name = 'customer_id' value = '$customer_id'>
<input type = 'submit' name='submit' value = 'Cancel' class = 'btn btn-info'>
</form>
";
echo "</td>";
echo "</tr>";
}
echo "</tbody> </table> <br>";
}
?>
<h3><a href="index.php">Back</a></h3>
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