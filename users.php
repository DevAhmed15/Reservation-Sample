
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
<h3>USERS TABLE</h3>
</div>

<hr style="    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;">

<div class="map">
</div>
<div class="mail-info-grids">
<div class="col-md-6 mail-info-grid">

<?php

if(!isset($_COOKIE['staff_id']))
{

echo "<script> 
alert('Your session has timed out ... login again');
window.location.href='logout.php';
 </script>";	
}

$con = mysql_connect("localhost","root","")
or die("Failed to connect to the server: " . mysql_error());

mysql_select_db("airlines")
or die("Failed to connect to the database: " . mysql_error());

echo "<h3>Customers TABLE</h3><br />";
$sql = "select * from customers";

$query = mysql_query($sql);

$numrows = mysql_num_rows($query);

if($numrows > 0)
{

echo "<table class = 'table table-striped table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th> ID </th>";
echo "<th> First Name </th>";
echo "<th> Last Name </th>";
echo "<th> Email </th>";
echo "<th> Password </th>";
echo "<th> Edit User </th>";
echo "<th> Delete User </th>";
echo "</tr> </thead>";
echo "<tbody>";

while($result = mysql_fetch_assoc($query))
{
$db_id          = $result['id'];
$db_source      = $result['fname'];
$db_destination = $result['lname'];
$db_flightno    = $result['email'];
$db_flightdate  = $result['password'];

echo "<tr>";
echo "<td>"  . $db_id . "</td>";	
echo "<td>"  . $db_source . "</td>";	
echo "<td>"  . $db_destination . "</td>";	
echo "<td>"  . $db_flightno . "</td>";	
echo "<td>"  . $db_flightdate . "</td>";
echo "<td>";
echo "<form action = 'edit_user.php' method = 'POST'>
<input type = 'hidden' name = 'db_id' value = '$db_id'>
<input type = 'hidden' name = 'db_source' value = '$db_source'>
<input type = 'hidden' name = 'db_destination' value = '$db_destination'>
<input type = 'hidden' name = 'db_flightno' value = '$db_flightno'>
<input type = 'hidden' name = 'db_flightdate' value = '$db_flightdate'>
<button type = 'submit' class = 'btn btn-info'>Edit</button>
</form>";
echo "</td>";
echo "<td>";
echo " <form action = 'delete_user.php' method = 'POST'>
<input type = 'hidden' name = 'db_id' value = '$db_id'>
<input type = 'hidden' name = 'db_flightno' value = '$db_flightno'>
<button type = 'submit' class = 'btn btn-danger'>Delete</button>
</form>";
echo "</td>";
echo "</tr>";	
}

echo "</tbody> </table> <br>";
}
else
{
echo "<h3> NO CURRENT USERS AVAILABLE </h3>";	
}


?>
<b><p><a href = "add_user.php" style="color:brown;"> Add New User </a></p> </b>
<br /><br /><br /><br />
<hr style="display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;">
    <br />
<!-- ////////////////////////////////////////////// -->
<?php
$admID=$_COOKIE['staff_id'];

echo "<h3>Staff TABLE</h3><br />";
$sql2 = "select * from brokers where staff_id!='$admID' ";

$query2 = mysql_query($sql2);

$numrows2 = mysql_num_rows($query2);

if($numrows2 > 0)
{

echo "<table class = 'table table-striped table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th> ID </th>";
echo "<th> Staff ID </th>";
echo "<th> Password </th>";
echo "<th> Role </th>";
echo "<th> Edit Staff </th>";
echo "<th> Delete Staff </th>";
echo "</tr> </thead>";
echo "<tbody>";

while($result2 = mysql_fetch_assoc($query2))
{
$db_id          = $result2['id'];
$db_source      = $result2['staff_id'];
$db_flightdate  = $result2['password'];
$adm  = $result2['IsAdm'];

echo "<tr>";
echo "<td>"  . $db_id . "</td>";	
echo "<td>"  . $db_source . "</td>";	
echo "<td>"  . $db_flightdate . "</td>";
if($adm == 1) echo "<td>"  . "Admin" . "</td>";
else echo "<td>"  . "Staff Member" . "</td>";
echo "<td>";
echo "<form action = 'edit_staff.php' method = 'POST'>
<input type = 'hidden' name = 'db_id' value = '$db_id'>
<input type = 'hidden' name = 'db_source' value = '$db_source'>
<input type = 'hidden' name = 'db_flightdate' value = '$db_flightdate'>
<button type = 'submit' class = 'btn btn-info'>Edit</button>
</form>";
echo "</td>";
echo "<td>";
echo " <form action = 'delete_staff.php' method = 'POST'>
<input type = 'hidden' name = 'db_id' value = '$db_id'>
<input type = 'hidden' name = 'db_flightno' value = '$db_flightno'>
<button type = 'submit' class = 'btn btn-danger'>Delete</button>
</form>";
echo "</td>";
echo "</tr>";	
}

echo "</tbody> </table> <br>";
}
else
{
echo "<h3> NO CURRENT Staff AVAILABLE </h3>";	
}


?>
<b><p><a href = "add_staff.php" style="color:brown;"> Add New Staff Member </a></p> </b>
<br /><br /><br /><br /><br /><br /></div>

<div class="clearfix"> </div>
</div>
</div>
<!-- //container -->
</div>
			<div class="about-banner">
				<div class="banner-bg">
                </div>
			</div>
            <br><br>
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