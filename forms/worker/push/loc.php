<?php
require('../../../lib/common.php');
require('../../../lib/config.php');
    
	# check connection
	if ($con->connect_errno) {exit();}
	
	# prepare data for insertion
	$lot_id = $_POST['lot_id'];
	$retail_id = $_POST['retail_id'];
	$gram_price = $_POST['gram_price'];
	$purchase_date = $_POST['purchase_date'];
	
	# update data
	$sql = "INSERT  INTO `transactions` (`id`, `lot_id`, `retail_id`, `g_price`, `pur_date`) 
			VALUES (NULL,  '{$lot_id}', '{$retail_id}', '{$gram_price}', '{$purchase_date}')";


	if ($con->query($sql)) {
		header('Location: '.__ROOT__);
	} else {
		exit();
	}
?>