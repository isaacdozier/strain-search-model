<?php
require('../../../lib/common.php');
require('../../../lib/config.php');
    
	# check connection
	if ($con->connect_errno) {exit();}
	
	# prepare data for insertion
	$lot = $_POST['lot_id'];
	$review	= htmlentities($_POST['review']);
	
	# insert data into mysql database
	$sql = "INSERT  INTO `review_list` (`id`, `lot`, `r_desc`) 
			VALUES (NULL,  '{$lot}', '{$review}')";

	if ($con->query($sql)) {
		header('Location: '
		   		  .$root.'l/'
		   	      .str_replace(' ','-',$rs['name'])
		   	      .'/'.$rs['lot_number']);
	} else {
		echo 'fail';
		exit();
	}
?>