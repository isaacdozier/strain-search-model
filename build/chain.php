<?php

$s_ex = '';
$s_to = '';

//check for base function parameters
if(isset($_REQUEST['b']))

	//build sql file name
	$s_ex = $_REQUEST['type'].'_';
	$s_to = $_REQUEST['b'];
	
	//SQL query for type of data we are pulling
	require_once('search/'.$s_ex.$s_to.'.php');

	//map standard for pulling data
	require_once('map.php');

?>