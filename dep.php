<?php

$dblink = mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('airlines');

if(!isset($_REQUEST['term']))
exit();

$term = 

$rs = mysql_query('
	SELECT DISTINCT source FROM flights 
	WHERE source 
	LIKE "%'.strtoupper($_REQUEST['term']).'%" 
	ORDER BY id ASC 
	LIMIT 0,10', $dblink
);

$data = array();

while($row = mysql_fetch_array($rs, MYSQL_ASSOC)){
	$data[] = array(
		'label' => $row['source'],
		'value' => $row['source'],
	);	
}

echo json_encode($data);
flush();

?>