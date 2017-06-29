<?php 
echo "<h3>";

$con = mysql_connect("localhost","root","")
or die("Failed to connect to the server: " . mysql_error());

mysql_select_db("airlines")
or die("Failed to connect to the database: " . mysql_error());

$query = mysql_query("select * from pilots");
$numrows = mysql_num_rows($query);

$pilots = array();
$names = array();

if($numrows > 0)
{
while($result = mysql_fetch_assoc($query))
{
$hours = $result['hours'];
array_push($pilots, $hours);
}	
}

rsort($pilots);

for($i = 0; $i < 3; $i++)
{
$query2 = mysql_query("select * from pilots where hours = '$pilots[$i]'");
while($result2 = mysql_fetch_assoc($query2))
{
$fname = strtoupper($result2['fname']);
$lname = strtoupper($result2['lname']);
array_push($names, $fname . " " . $lname);
}
}

if($names[0] == NULL or $names[0] == "")
{
$names[0] = "(NOT AVAILABLE)";
}

if($names[1] == NULL or $names[1] == "")
{
$names[1] = "(NOT AVAILABLE)";
}

if($names[2] == NULL or $names[2] == "")
{
$names[2] = "(NOT AVAILABLE)";
}

echo "<h4>";

echo "Captain " . $names[0];

echo "</h4>";
echo "<p>";

echo "The First Best Pilot in our company ". "<br />" . "Flying for more than " . $pilots[0] . " hours.";

echo "</p>";
echo "</div>";
echo "<div class='before-grid'>";
echo "<h4>";

echo "Captain " . $names[1];

echo "</h4>";
echo "<p>";

echo "The Second Best Pilot in our company ". "<br />" . "Flying for more than " . $pilots[1] . " hours.";

echo "</p>";
echo "</div>";
echo "<div class='before-grid'>";
echo "<h4>";

echo "Captain " . $names[2];
echo "</h4>";

echo "<p>";
echo "The Third Best Pilot in our company ". "<br />" . "Flying for more than " . $pilots[2] . " hours.";
echo "</p>";
?>