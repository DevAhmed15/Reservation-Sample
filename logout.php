<?php

setcookie("email",$email,time()-60*30);
header("location: index.php");

?>