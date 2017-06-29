<?php

$z = $_GET['z'];

if($z == "pass")
{

echo "
<body>
<br><br>
<div class='container padding-top-10'>
<div class='panel panel-default'>
<div class='panel-heading'>
<label>Change Password</label>
</div>
<div class='panel-body'>
<form action = 'change_pass.php' method = 'POST'>

<div class = 'row'>
<div class = 'col-xs-5'>

<label> Old Password: </label> <br>
<input type = 'password' name = 'old' placeholder = 'Enter Old Password' class = 'form-control' required title = 'Old Password'> <br> <br>

<label> New Password: </label> <br>
<input type = 'password' name = 'new' placeholder = 'Enter New Password' class = 'form-control' required title = 'New Password'> <br> <br>

<input type = 'submit' name = 'submit' value = 'Change Password' class = 'btn btn-success'> <br> <br>

</div> </div>
</form>
</div>
</div>
</div>
";

}
else if($z == "account")
{

echo "
<body>
<br><br>
<div class='container padding-top-10'>
<div class='panel panel-default'>
<div class='panel-heading'>
<label>Delete Account</label>
</div>
<div class='panel-body'>
<form action = 'change_pass.php' method = 'POST'>

<div class = 'row'>
<div class = 'col-xs-5'>

<label> Enter Password: </label> <br>
<input type = 'password' name = 'password' placeholder = 'Enter Password' class = 'form-control' required title = 'Password'> <br> <br>

<label> Confirm Password: </label> <br>
<input type = 'password' name = 'confpass' placeholder = 'Confirm Password' class = 'form-control' required title = 'Confirm Password'> <br> <br>

<input type = 'submit' name = 'submit2' value = 'Delete Account' class = 'btn btn-success'> <br> <br>

</div> </div>
</form>
</div>
</div>
</div>
";

}

else if($z == "name")
{
	
echo "
<body>
<br><br>
<div class='container padding-top-10'>
<div class='panel panel-default'>
<div class='panel-heading'>
<label>Change Name</label>
</div>
<div class='panel-body'>
<form action = 'change_pass.php' method = 'POST'>

<div class = 'row'>
<div class = 'col-xs-5'>

<label> First Name: </label> <br>
<input type = 'text' name = 'fname' placeholder = 'Enter First Name' class = 'form-control' required title = 'First Name' autocomplete = 'off'> <br> <br>

<label> Last Name: </label> <br>
<input type = 'text' name = 'lname' placeholder = 'Enter Last Name' class = 'form-control' required title = 'Last Name' autocomplete = 'off'> <br> <br>

<input type = 'submit' name = 'submit3' value = 'Change Name' class = 'btn btn-success'> <br> <br>

</div> </div>
</form>
</div>
</div>
</div>
";

}

?>