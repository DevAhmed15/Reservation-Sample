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
<h3>STATISTICS TABLE</h3>
</div>
<div class="map">
</div>
<div class="mail-info-grids">
<div class="col-md-6 mail-info-grid">

<form class = "form-horizontal" action = "mining.php" method = "POST">

<label> From: </label>
<input type = "date" name = "from" class = "form-control" required> <br> <br>
<label> To: </label>
<input type = "date" name = "to" class = "form-control" required> <br> <br>

<input type = "submit" name = "submit" value = "View Statistics" class = "btn btn-danger">

</form>

<?php

$from   = strip_tags(@$_POST['from']);
$to     = strip_tags(@$_POST['to']);
$submit = @$_POST['submit'];

$con = mysql_connect("localhost","root","")
or die("Failed to connect to the server: " . mysql_error());

mysql_select_db("airlines")
or die("Failed to connect to the database: " . mysql_error());

$empty = mysql_query("TRUNCATE TABLE  `mining2`");

if($empty)
{

if($submit)
{

$sql = "select * from mining where date between '$from' and '$to'";
$query = mysql_query($sql);
$numrows = mysql_num_rows($query);
if($numrows > 0)
{
while($result = mysql_fetch_assoc($query))
{
$source      = $result['source'];
$destination = $result['destination'];
$business    = $result['business'];
$tourist     = $result['tourist'];

$sql2 = "select * from mining2 where source = '$source' and destination = '$destination'";

$query2 = mysql_query($sql2);

$numrows2 = mysql_num_rows($query2);

if($numrows2 == 1)
{
while($result2 = mysql_fetch_assoc($query2))
{
$counter   = $result2['counter'];
$business2 = $result2['business'];
$tourist2  = $result2['tourist'];
$business3 = $result2['business2'];
$tourist3  = $result2['tourist2'];
}
$newcounter = $counter + 1;

$update = mysql_query("update mining2 set counter = '$newcounter' where source = '$source' and destination = '$destination'");

if($business < $business2)
{
$update2 = mysql_query("update mining2 set business = '$business' where source = '$source' and destination = '$destination'");
}

if($tourist < $tourist2)
{
$update3 = mysql_query("update mining2 set tourist = '$tourist' where source = '$source' and destination = '$destination'");
}

if($business > $business3)
{
$update4 = mysql_query("update mining2 set business2 = '$business' where source = '$source' and destination = '$destination'");
}

if($tourist > $tourist3)
{
$update5 = mysql_query("update mining2 set tourist2 = '$tourist' where source = '$source' and destination = '$destination'");
}

}
else
{
$sql3 = "insert into mining2 values('','$source','$destination','1','$business','$tourist','$business','$tourist')";
$query3 = mysql_query($sql3);
}

}
}

}
}

else
{
echo "Error";
}

echo "<br><br>";

$sql4 = "select * from mining2 ORDER BY counter DESC";
$query4 = mysql_query($sql4);
$rows = mysql_num_rows($query4);
if($rows > 0)
{
echo "<table class = 'table table-striped table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th> Source </th>";
echo "<th> Destination </th>";
echo "<th> NO.Requests </th>";
echo "<th> Minimum business ticket </th>";
echo "<th> Minimum tourist ticket </th>";
echo "<th> Maximum business ticket </th>";
echo "<th> Maximum tourist ticket </th>";
echo "<th> Promotions </th>";
echo "</tr> </thead>";
echo "<tbody>";

while($data = mysql_fetch_assoc($query4))
{
$flight_source      = $data['source'];
$flight_destination = $data['destination'];
$flight_counter     = $data['counter'];
$business_ticket    = $data['business'];
$tourist_ticket     = $data['tourist'];
$business_ticket2    = $data['business2'];
$tourist_ticket2     = $data['tourist2'];

echo "<tr>";
echo "<td>" . $flight_source . "</td>";	
echo "<td>" . $flight_destination . "</td>";	
echo "<td>" . $flight_counter . "</td>";
echo "<td>$" . $business_ticket . "</td>";
echo "<td>$" . $tourist_ticket . "</td>";
echo "<td>$" . $business_ticket2 . "</td>";
echo "<td>$" . $tourist_ticket2 . "</td>";
echo "<td>";
echo "<form action = 'promotion.php' method = 'POST'>
<input type = 'hidden' name = 'source' value = '$flight_source'>
<input type = 'hidden' name = 'destination' value = '$flight_destination'>
<input type = 'hidden' name = 'business' value = '$business_ticket'>
<input type = 'hidden' name = 'tourist' value = '$tourist_ticket'>
<input type = 'hidden' name = 'business2' value = '$business_ticket2'>
<input type = 'hidden' name = 'tourist2' value = '$tourist_ticket2'>
<input type = 'submit' value = 'Make Promotion' class = 'btn btn-info'>
</form>";
echo "</td>";
echo "</tr>";
}
echo "</tbody> </table> <br>";
}
else
{
echo "<br><label><p>No statistics at this moment.</label></p>";
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