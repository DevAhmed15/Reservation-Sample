<?php
$con = mysql_connect("localhost","root","")
or die("Failed to connect to the server: " . mysql_error());

mysql_select_db("airlines")
or die("Failed to connect to the database: " . mysql_error());

if(!isset($_COOKIE['email']))
{

echo "<script> 
alert('Your session has timed out ... login again');
window.location.href='logout.php';
 </script>";	
}

$email = $_COOKIE['email'];

$search_id = mysql_query("select * from customers where email = '$email'");
while($search = mysql_fetch_assoc($search_id))
{
$customer_id = $search['id'];
$fname = @$search['fname'];
$lname = @$search['lname'];
}

$flight_no =@$_POST['db_flightno'];
$class     =@$_POST['db_class'];
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

<!-- container -->
</div>
<!-- //header -->
<!-- banner-grids -->
<div class="banner-grids">
<!-- container -->
<div class="container">
<div class="mail-info">
</div>
<div class="banner-grid-info">


<div class="container padding-top-10">
<div class="panel panel-default">
<div class="panel-heading">
<b>Reserve Flight</b>
</div>
<div class="panel-body">
<form action = "fill_data.php" method = "POST">

<label class="control-label">(*)Full Name:</label>
<div class="row">
<div class="col-md-6 padding-top-10">
<input type="text" name = "fname" class="form-control" value="<?php  echo $fname;?>" required title="First Name" readonly />
</div>
<div class="col-md-6 padding-top-10">
<input type="text" name = "lname" class="form-control" value="<?php echo $lname;?>" required title="Ladt Name" readonly />
</div>
</div>
<br>

<div class="row">
<div class="col-md-6 padding-top-10">
<label class="control-label">(*)Birth Date:</label>
<input type="date" name = "date" class="form-control" autocomplete = "off" required title = "Birth Date"/>
</div>

<div class="col-md-6 padding-top-10">
<label class="control-label">(*)Sex:</label>
<select name = "sex" class="form-control" required title = "Sex">
<option>MALE</option>
<option>FEMALE</option>
</select>
</div> </div>
<br>

<label class="control-label padding-top-10">(*)Address:</label>
<div class="row padding-top-10">
<div class="col-md-12">
<input type="text" name = "address" class="form-control" autocomplete = "off" required title = "Address" placeholder="Address"/>							
</div>
</div>
<br>

<div class="row">						
<div class="col-md-6 padding-top-10">
<label class="control-label">(*)City:</label>
<input type="text" name = "city" autocomplete = "off" class="form-control" placeholder="Your city" required title = "City"/>													
</div>
<div class="col-md-2 padding-top-10">
<label class="control-label">(*)State / Region:</label>
<input type="text" name = "state" class="form-control" id="stateorregion" placeholder="Your state / region" autocomplete = "off" required title = "State / Region"/>																			
</div>
<div class="col-md-4 padding-top-10">
<label class="control-label">Zipcode:</label>
<input type="text" name = "zipcode" class="form-control" id="zipcode" placeholder="Your zipcode" autocomplete = "off" title="Zipcode" />													
</div>
</div>
<br>

<div class="row">
<div class="col-md-6 padding-top-10">
<label class="control-label">(*)Phone Number:</label>
<input type="number" min = "0" name = "phoneno" class="form-control" autocomplete = "off" placeholder="Phone Number" required title = "Phone Number"/>
</div>


<div class="row">
<div class="col-md-5 padding-top-10">
<label class="contorl-label"> (*)Class: </label>
<input type = "text" name="class" class = "form-control" required title = "Class" value = "<?php echo $class ?>" readonly>
</div>
</div>
</div>


<br>

<div class="row">
<div class="col-md-6 padding-top-10">
<label class="control-label">(*)Flight Number:</label>
<input type="number" name = "flightno" class="form-control" value = "<?php echo $flight_no ?>" required title = "Flight Number" readonly/>
</div>

<div class="col-md-5 padding-top-10">
<label class="control-label">(*)Customer ID:</label>
<input type = "number" name = "id" value = "<?php echo $customer_id ?>" class = "form-control" required title = "Customer ID" readonly>
</div>
</div>
<br>

<div class="row">
<div class="col-md-6 padding-top-10">
<div class="checkbox">
<label>
<input type="checkbox" name = "agree" required title = "terms and agreements"/> <b style="color:green">I have read <a href="reserve.php" style="color:green">terms and agreements</a> and i accept them.</b>
</label>
</div>
</div>
</div>
<br>

<div class="row">
<div class="col-md-2">
&nbsp; &nbsp;<input type = "submit" name = "submit" value = "Reserve Flight" class="btn btn-primary">
</div>
</div>
<br>
</form>
</div>
</div>
</div>





<?php 

if(@$_POST['submit']){
$fname    =strip_tags($_POST['fname']);
$lname    =strip_tags($_POST['lname']);
$sex      = strtoupper(strip_tags($_POST['sex']));
$date     =strip_tags($_POST['date']);
$address  =strip_tags($_POST['address']);
$city     =strip_tags($_POST['city']);
$state    = strtoupper(strip_tags($_POST['state']));
$zipcode  =strip_tags($_POST['zipcode']);
$phoneno  =strip_tags($_POST['phoneno']);
$cclass   = strtolower(strip_tags($_POST['class']));
$flightno =strip_tags($_POST['flightno']);
$id       =strip_tags($_POST['id']);
$agree    =$_POST['agree'];
$submit   =$_POST['submit'];

if(!$agree)
	echo "<script> alert('You didn't accept our terms and agreements, please read them carefully then accept.');</script>";

$check = mysql_query("select $cclass from flights where flight_no = '$flightno'");
while($result = mysql_fetch_assoc($check))
{
$db_seats = $result[$cclass];	
}
if($zipcode == NULL or $zipcode == "")
$zipcode == "NA";

if($db_seats == 0)
{
$sql = "insert into waiting_list values('','$fname','$lname','$sex','$date','$address','$city','$state','$zipcode','$phoneno','$cclass','$flightno','$customer_id')";
$query = mysql_query($sql);

if($query)
		echo "<script> 
alert('There is not enough seats on this class, so your reservation is put on the waiting list, waiting for an available seat.');
window.location.href='profile.php';
 </script>";
else
	echo "<script> 
alert('Error occurred during reserving flight .. try again');
window.location.href='index.php';
 </script>";

}
else
{
$update_seats = $db_seats - 1;
$sql2 = "insert into reservations values('','$fname','$lname','$sex','$date','$address','$city','$state','$zipcode','$phoneno','$cclass','$flightno','$customer_id')";
$query3 = mysql_query("update flights set $cclass = '$update_seats' where flight_no = '$flightno'");
$query2 = mysql_query($sql2);
if($query2 && $query3)
{
	echo "<script> 
alert('Your flight has been reserved successfully.');
window.location.href='profile.php';
 </script>";
}
else
		echo "<script> 
alert('Error occurred during reserving flight .. try again !!');
window.location.href='index.php';
 </script>";
}
}

?>

<br><br>

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
<h2> Best Pilots in Our Company </h2>
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