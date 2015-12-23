<?php
require('../../../lib/config.php');
    
	# check connection
	if ($con->connect_errno) {exit();}
	
	# prepare data for insertion
	$strain_id = $_POST['strain_id'];
	$farm_id	= $_POST['farm_id'];
	$lot = $_POST['lot_number'];
	$harvest_date = $_POST['harvest_date'];
	
	# insert data into mysql database
	$sql = "INSERT  INTO `lots` (`id`, `strain_id`, `lot_number`, `farm_id`, `harvest_date`) 
			VALUES (NULL,  '{$strain_id}', '{$lot}', '{$farm_id}', '{$harvest_date}')";

	if ($con->query($sql)) {
		echo 'succes';
		header('Location: '.ROOT);
	} else {
		exit();
	}
?>