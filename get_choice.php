<?php

$q = $_GET['q'];

if($q == "day")
{
echo "
<form class = 'form-inline' action = 'showby.php' method = 'POST'>

<h4> View flights by day: </h4> <br>
<div class='form-group'>
<label> Select Day: </label>
<input type = 'date' name = 'date' class = 'form-control' required title = 'Flight Day'>
<label>
<input type = 'submit' name = 'submit' value = 'VIEW' class = 'btn btn-primary'> <br> </label> </div>

</form>
";
}

else if($q == "arrived")
{
echo "
<h4> View Arrived Flights: </h4> <br>
<form class = 'form-inline' action = 'showby.php' method = 'POST'>

<label> Select Day: </label>
<input type = 'date' name = 'date0' class = 'form-control' required title = 'Flight Day'>
<label>
<input type = 'submit' name = 'submit1' value = 'VIEW' class = 'btn btn-info'></label> <br> <br>

</form>
";
}

else if($q == "week")
{
echo "
<h4> View flights by week: </h4> <br>
<form class = 'form-inline' action = 'showby.php' method = 'POST'>
<label>FROM:</label> <input type = 'date' name = 'date1' class = 'form-control' required title = 'FROM'>
<label>TO:</label> <input type = 'date' name = 'date2' class = 'form-control' required title = 'TO'>
<input type = 'submit' name = 'submit2' value = 'VIEW' class = 'btn btn-warning'>
</form>
";
}

else if($q == "data")
{
echo "
<h4> View passengers data on specific flight: </h4> <br>
<form action = 'showby.php' method = 'POST' class = 'form-inline'>
<label> Flight Number: </label>
<input type = 'number' name = 'flight_pss' autocomplete = 'off' min = '0' class = 'form-control' required title = 'Flight Number' placeholder = 'Flight Number'>

<input type = 'submit' name = 'submit3' value = 'View' class = 'btn btn-success'> <br> <br>

<label> <input type = 'radio' name = 'choice' value = 'reservation' checked />  Reservations List </label> <br>
<label> <input type = 'radio' name = 'choice' value = 'waiting' />  Waiting List </label>
</form> 
";
}

else if($q == "NO")
{
echo "<label><p>You didn't select a choice. <p></label>";
}



?>