<?php

setcookie("staff_id",$id,time()-60*30);
header("location: index.php");

?>