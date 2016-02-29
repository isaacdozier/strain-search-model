<?php

require_once('../lib/common.php');

$srch = '';

//check for base function parameters
if(!isset($_REQUEST['b']))

	//check query parameters
	$srch = str_replace('-',' ', htmlspecialchars($_REQUEST['q'], ENT_QUOTES));
	
	$srch_header = $srch;

	if($_REQUEST['type'] == 'favorite')
	   $srch_header  =  'Enjoy!';

	if($_REQUEST['type'] == 'shi')
	   $srch_header  =  $type[$srch];

	//SQL query for type of data we are pulling
	require_once('search/'.$_REQUEST['type'].'_'
		         		  .$_REQUEST['view'].'.php');

	//map standard for pulling data
	require_once('map.php');

?>