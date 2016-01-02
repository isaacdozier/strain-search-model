<?php
require('../../../lib/common.php');
require('../../../lib/config.php');
    
	# check connection
	if ($con->connect_errno) {exit();}
	
	# prepare data for insertion
	$strain_id = $_POST['strain_id'];
	$farm_id	= $_POST['farm_id'];
	$lot_number = $_POST['lot_number'];
	$harvest_date = $_POST['harvest_date'];
	$rate = $_POST['rate'];
	$d_rate = $_POST['d_rate'];
	$fav = $_POST['fav'];
	
	# insert data into mysql database
	$sql = "INSERT  INTO `lots` (`id`, `strain_id`, `lot_number`, `farm_id`, `harvest_date`, `rate`, `d_rate`, `fav`) 
			VALUES (NULL,  '{$strain_id}', '{$lot_number}', '{$farm_id}', '{$harvest_date}', '{$rate}', '{$d_rate}', '{$fav}')";

	if ($con->query($sql)) {
		header('Location: '.__ROOT__);
	} else {
		exit();
	}
?>