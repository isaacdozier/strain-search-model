<?php
require('../../../lib/common.php');
require('../../../lib/config.php');
    
	# check connection
	if ($con->connect_errno) {exit();}
	
	# prepare data for insertion
	$lot_id = $_POST['lot_id'];
	$rate = $_POST['rate'];
	$d_rate = $_POST['d_rate'];
	$fav = $_POST['fav'];
	
	# update data
	$sql = "UPDATE lots
			SET rate = '{$rate}',
				d_rate = '{$d_rate}',
				fav = '{$fav}'
			WHERE id = {$lot_id}";

	if ($con->query($sql)) {
		header('Location: '.__ROOT__);
	} else {
		exit();
	}
?>