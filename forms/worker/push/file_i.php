<?php

$f_ = $_FILES['image'];
$l_ = $_REQUEST['lot_id'];

require('../../../lib/common.php');
require('../../../lib/config.php');
require_once('../../../lib/class.upload.php/src/class.upload.php');

$foo = new Upload($f_);

if ($foo->uploaded) {		
   	
	# check connection
	if ($con->connect_errno) 
	   {exit();}

	//build file name
    $sql = "SELECT strain_list.name, 
    			   farm_list.name as farmer, 
    			   lots.lot_number
			FROM lots
			left JOIN strain_list
				ON strain_list.id=lots.strain_id
			left JOIN farm_list
				ON farm_list.id=lots.farm_id
			WHERE lots.id = '".$l_."'
			LIMIT 1";

	$r          =   mysqli_query($con,$sql);
	$n_tmp      =   '';
	$file_name  =   '';
	$file_size  =   $f_['size'];

	//build tmp file name
	foreach($r as $rs)
		 $n_tmp = $rs['name']
		   	 .'-'.$rs['farmer']
			 .'-'.$rs['lot_number'];
	//--
    $n_tmp = str_replace(' ', '-', $n_tmp);
    $file_name = $n_tmp.'.gif';

	// save uploaded image with a new name (/img)
	$foo->file_new_name_body = $n_tmp;
	$foo->image_resize = true;
	$foo->image_convert = 'gif';
	$foo->image_x = 1000;
	$foo->image_ratio_y = true;
	$foo->Process('../../../img/');

	//SET ERRORS
	$errors= array();
	//--
	if($file_size > 2097152)
	  {$errors[]='File size must be under 2 MB';}	 

}
else{//ERRORS
   echo$foo->error;}

if($foo->processed AND empty($errors)==true) {
	echo 'image renamed, resized<br/>';

	# update img sql
	$update_sql = "UPDATE lots
			SET img = '{$file_name}'
			WHERE id = {$l_}";

		#insert data + clear tmp file
		if($con->query($update_sql)) 
	      {$foo->Clean();
		   header('Location: '.__ROOT__);}

}else{//ERRORS
 echo$foo->error;
 print_r($errors);}
?>