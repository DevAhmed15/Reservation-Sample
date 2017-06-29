<?php
session_start();

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
<a href="index.html"><img src="images/logo1.png" alt="" /></a>
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
<!-- mail -->
<div class="mail">
<!-- container -->
<div class="container">
<div class="mail-info">
<h3>Cancel Seat</h3>
</div>
<div class="map">
</div>
<div class="mail-info-grids">
<div class="col-md-6 mail-info-grid">

<form class = "form-horiznotal" action = "cancel.php" method = "POST">
<label> <p> Are you sure that you want to cancel your reservation? </p> </label> <br>
<input type = "submit" name = "submit" value = "YES" class ="btn btn-primary">
</form>
<br>
<form class = "form-horizontal" action = "profile.php" method = "POST">
<input type = "submit" name = "submit2" value = "NO" class ="btn btn-primary">
</form>
<br>

<?php

$con = mysql_connect("localhost","root","")
or die("Failed to connect to the server: " . mysql_error());

mysql_select_db("airlines")
or die("Failed to connect to the database: " . mysql_error());

$db_class=@$_SESSION["Class"];
$db_id=@$_SESSION["resID"];
$db_flightno=@$_SESSION["flight"];

if(@$_POST['submit']){
// if pending add on class type seat and delete reservation
$submit = $_POST['submit'];
$submit2 = @$_POST['submit2'];

$re = mysql_query("select $db_class,status from flights where flight_no = '$db_flightno'");

while($r= mysql_fetch_assoc($re))
{
}
$return = mysql_query("select $db_class,status from flights where flight_no = '$db_flightno'");

while($result = mysql_fetch_assoc($return))
{
$status = @$result['status'];
$seats  = $result[$db_class];
}
	if($status == "PENDING")
	{
	$update = $seats + 1;
	$sql = "delete from reservations where id = '$db_id'";

	$query = mysql_query($sql);

		if($query)
		{
		echo "<label><p>Your reservation has been cancelled successfully.</p></label><br><br>";
		$query2 = mysql_query("update flights set $db_class = '$update' where flight_no = '$db_flightno'");
		if($query2)
			echo "<label><p> Flights table updated.</p></label>";
		else
			echo "<b> Error occurred during updating flights table. </b>";
		}
		else
			echo "<b> Error occurred during deleting reservation. </b>";
	}
	else
	{
		echo "<h3 style = 'color:blue;'>Your ticket has been confirmed, cannot cancel it :( </h3>";
		echo "<b style = 'color:red;'>Warning: if you didn't commit to your flight, you are subject to legal responsibility. </b>";
	}
	/*else if($seat_type == "waiting")
	{
		$sql2 = mysql_query("delete from waiting where id = '$id'");
		if($sql2)
		echo "<b>Your reservation has been cancelled successfully. </b>";
		else
		echo "<b>Error occurred during deleting reservation .. try again !! </b>";
	}*/
}
else if(@$_POST['submit2'])
{
	header('profile.php');
}
//require("refresh.php");
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