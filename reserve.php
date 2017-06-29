<?php
$email = $_COOKIE['email'];

if(!isset($_COOKIE['email']))
{

echo "<script> 
alert('Your session has timed out ... login again');
window.location.href='logout.php';
 </script>";	
}
?>
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
<!-- booking -->
<div class="booking">
<!-- container -->
<div class="container">
<div class="booking-info">
<h3>booking a flight</h3>
</div>
<div class="booking-form">
<!---strat-date-piker---->
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-ui.js"></script>
<script>
$(function() {
$( "#datepicker,#datepicker1" ).datepicker();
});
</script>
<!---/End-date-piker-->
<link type="text/css" rel="stylesheet" href="css/JFGrid.css" />
<link type="text/css" rel="stylesheet" href="css/JFFormStyle-1.css" />
<script type="text/javascript" src="js/JFCore.js"></script>
<script type="text/javascript" src="js/JFForms.js"></script>
<!-- Set here the key for your domain in order to hide the watermark on the web server -->
<script type="text/javascript">
(function() {
JC.init({
domainKey: ''
});
})();
</script>


<!--
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(function (){
    $(document).on('keyup', '[name="departure"]', function() {
         var partialState = $(this).val();
         $.post("departure.php",{partialState:partialState}, function(data){
            $("#results").autocomplete(data);
         });
    });
});
</script>

<script type="text/javascript">
$(function (){
    $(document).on('keyup', '[name="destination"]', function() {
         var partialState = $(this).val();
         $.post("destination.php",{partialState:partialState}, function(data){
            $("#results2").html(data);
         });
    });
});
</script>
-->

<!-- STYLE CSS -->
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" />		
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script>

<script type = "text/javascript">

jQuery(document).ready(function(){
	$('#departure').autocomplete({
		
		source : 'dep.php',
		minLength:1,
		
	});
});

</script>

<script type = "text/javascript">

jQuery(document).ready(function(){
	$('#destination').autocomplete({
		
		source : 'des.php',
		minLength:1,
		
	});
});

</script>




<div class="online_reservation">
<div class="b_room">
<div class="booking_room">
<div class="reservation">
<ul>		
<li  class="span1_of_1 left">
<h5>From</h5>
<div class="book_date">
<form action = "search.php" method = "POST">
<input type="text" name = "departure" placeholder="Type Depature City" required title = "Departure City" id = "departure" class = "form-control">

</div>					
</li>
<li  class="span1_of_1 left">
<h5>To</h5>
<div class="book_date">

<input type="text" name = "destination" placeholder="Type Destination City" required title = "Destination City" class = "form-control" id = "destination">

</div>
</li>
<li  class="span1_of_1 left">
<h5>DATE</h5>
<div class="book_date">

<input type = "date" required title = "Flight Date" name = "date" class = "form-control">

</div>					
</li>

<li class="span1_of_1">
<h5>Class</h5>
<div class="section_room">

<select id="country" onchange="change_country(this.value)" class="form-control" name = "class" required = "">
<option value="Business">Business</option>
<option value="Tourist">Tourist</option>
</select>

</div>	
</li>
<li class="span1_of_3">
<div class="date_btn">

<input type="submit" value="Find Flight" name = "submit" class = "btn btn-warning" style = "height:35px; width:135px; font-size:15px;"/>
</form>
<br>
</div>
</li>
<div class="clearfix"></div>
</ul>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>
<!---->
</div>

<div class="clearfix"></div>
<div class="booking-grids">
<h3>WE ARE PROVIDE:</h3>
<div class="col-md-7 booking-grid-left">
<h4>SERVICES WE PROVIDE ARE EMBEDDED IN THE TICEKT PRICE:</h4>
<p>When you come to book a flight in our company, we offer a number of services that are free ... these services include:</p>
<p>1. Eating and drinking are for free.</p>
<p>2. We offer newspapers, magazines and books, all are for free. </p>
<p>3. We have a staff of doctors and nurses if you feel tired, so help you take the necessary health care along the flight. </p>
<p>4. We offer good, comfortable and clean seats. </p>
<p>5. We are following the security and safety rules in our company, so you don't have to be worry about anything. </p>
<div class="read-more red">
<a>Read More</a>
</div>
</div>
<div class="col-md-5 booking-grid-right">
<img src="images/11.jpg" alt="">
</div>
<div class="clearfix"> </div>
</div>
</div>
<!-- //container -->
<div class="how-to">
<!-- container -->
<div class="container">
<div class="how-to-info">
<h3>HOW TO BOOK A FLIGHT:</h3>
<p>It is very easy to book a flight just follow these steps: </p>
<p>1. Type the departure and destination city/airport of the flight you are want to book.</p>
<p>2. Type the date of the flight. </p>
<p>3. Click on the button (FIND FLIGHT). </p>
<p>4. See the search results, a full data about all flights will be shown to you including the ticket price, flight duration and so on. read it carefully then select the appropriate flight.</p>
<p>5. NOTE: if there is no available seats on this flight, you will be put in the waiting list, waiting for an available seat. if not found so you will not be able to reserve on this flight so you have to select another flight.
</p>
<p>6. Finally, you can check the status of your reservation at (MY FLIGHTS) tab above the page. </p>
<h4> TERMS AND AGREEMENTS: </h4>
</div>
<div class="how-grids">
<div class="col-md-4 how-grid">
<span>1</span>
<a>COMMIT TO YOUR FLIGHT</a>
<p>If you are not able to travel on this flight so just cancel it.</p>
</div>
<div class="col-md-4 how-grid">
<span>2</span>
<a>LEGAL RESPONSIBILITY</a>
<p>If you book a flight then not come without any cancellation, you will be subject to legal responsibility.</p>
</div>
<div class="col-md-4 how-grid">
<span>3</span>
<a>VIOLATION</a>
<p>Legal responsibility includes paying a fine that equals to ticket price of your flight that you don't commit to.</p>
</div>
<div class="clearfix"> </div>
</div>
</div>
<!-- //container -->
</div>
<div class="visiting">
<!-- container -->
<div class="container">
<div class="visiting-info">
<h3>VISITING PLACES</h3>
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
</div>
<!-- booking -->
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