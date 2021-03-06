
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

<!-- container -->
</div>
<!-- //header -->
<!-- banner-grids -->
<div class="banner-grids">
<!-- container -->
<div class="container">
<div class="banner-grid-info">

<label> <p>Please enter the number of the flight you want to check: </p></label><br><br>

<div class='container padding-top-10'>
<div class='panel panel-default'>
<div class='panel-heading'>
<label>Check Flight</label>
</div>
<div class='panel-body'>

<form action="check_flight.php" method="POST" class="form-horizontal">
<div class = "row">
<div class = "col-xs-5">
<label> Flight Number: </label> <br>
<input type = "number" name = "flight" min = "0" class = "form-control" autocomplete = "off" placeholder = "Flight Number" required title = "Flight Number"> 
<br>
<input type="submit" name="submit" value="Flight Search" class="btn btn-success">
<br><br><br>
</div> </div>
</form>

<?php 

if(@$_POST['submit']){
$con = mysqli_connect("localhost","root","")
or die("Failed to connect to the server: " . mysqli_error());

mysqli_select_db($con,"airlines")
or die("Failed to connect to the database: " . mysqli_error());

$flight = strip_tags($_POST['flight']);

$query = mysqli_query($con,"select*from flights where flight_no ='$flight'");

$rows = mysqli_num_rows($query);

if($rows == 1)
{
echo "<label><p>Flight Details: </p></label><br><br>";

while($data = mysqli_fetch_array($query))
{
$source = $data['source'];
$destination = $data['destination'];
$flightno    = $data['flight_no'];
$flightdate  = $data['flight_date'];
$departure   = $data['departure'];
$actual_dep  = $data['actual_dep'];
$arrival     = $data['arrival'];
$actual_arr  = $data['actual_arr'];
$status      = $data['status'];
$business    = $data['business'];
$tourist     = $data['tourist'];
$bus_ticket  = $data['bus_ticket'];
$tour_ticket = $data['tour_ticket'];
}

echo "<table class = 'table table-striped table-bordered'>";

echo "<tr>";
echo "<td><h1>Name</h1></td>";
echo "<td><h1>Value</h1></td>";
echo "</tr>";

echo "<tr>";
echo "<td>From</td>";
echo "<td>" . $source . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>To</td>";
echo "<td>" . $destination . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Flight Number</td>";
echo "<td>" . $flightno . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Flight Date</td>";
echo "<td>" . $flightdate . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Takeoff Time</td>";
echo "<td>" . $departure . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Actual Takeoff</td>";
echo "<td>" . $actual_dep . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Arrival Time</td>";
echo "<td>" . $arrival . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Actual Arrival</td>";
echo "<td>" . $actual_arr . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Flight Status</td>";
echo "<td>" . $status . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Available Business Seats</td>";
echo "<td>" . $business. "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Available Tourist Seats</td>";
echo "<td>" . $tourist . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Business Ticket Price</td>";
echo "<td>$" . $bus_ticket . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Tourist Ticket Price</td>";
echo "<td>$" . $tour_ticket . "</td>";
echo "</tr>";

echo "</table>";

}
else if($rows == 0)
{
echo "<label><p>Sorry, The flight number you have entered is not exists. </p></label><br><br>";
}
}

?>

</div></div></div>
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
<hr>
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
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About</a></li>  
<li><a href="register.php">Create Account</a></li>  
<li><a href="login2.php">login</a></li> 
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
										
$().UItoTop({ easingType: 'easeOutQuart' });
										
});
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- content-Get-in-touch -->
</body>
</html>