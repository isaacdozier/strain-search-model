<?php
require('../../../lib/common.php');
require('../../../lib/config.php');
    
	# check connection
	if ($con->connect_errno) {exit();}
	
	# prepare data for insertion
	$lot_id        = $_POST['lot_id'];
	$retail_id     = $_POST['retail_id'];
	$gram_price    = $_POST['gram_price'];
	$purchase_date = $_POST['purchase_date'];
	$g_measure     = $_POST['measure'];
	
	# update data
	$sql = "INSERT  INTO `transactions` (`id`, `lot_id`, `retail_id`, `g_price`, `pur_date`, `g_measure`) 
			VALUES (NULL,  '{$lot_id}', '{$retail_id}', '{$gram_price}', '{$purchase_date}', '{$g_measure}')";


	if ($con->query($sql)) {
		header('Location: '
		   		  .$root.'l/'
		   	      .str_replace(' ','-',$rs['name'])
		   	      .'/'.$rs['lot_number']);
	} else {
		exit();
	}
?>