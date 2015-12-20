<?php
$errors= array();
    $insert_id = $_REQUEST['lot_id'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];   
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    $extensions = array("jpeg","jpg","png"); 

    //build file name
    $sql = "SELECT strain_list.name, farm_list.name as farmer, lots.lot_number
			FROM lots
			left JOIN strain_list
				ON strain_list.id=lots.strain_id
			left JOIN farm_list
				ON farm_list.id=lots.farm_id
			WHERE lots.id = '".$_REQUEST["lot_id"]."'
			LIMIT 1";

	$r = mysqli_query($con,$sql);
	
	$name_tmp = '';
	foreach($r as $rs)
		$name_tmp = $rs['name']
					.'-'.$rs['farmer']
					.'-'.$rs['lot_number'];

    $name_tmp = str_replace(' ', '-', $name_tmp);
    $file_name = $name_tmp.'.'.$file_ext;		
    
    //check for errors
    if(in_array($file_ext,$extensions )=== false){
     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    //--
    if($file_size > 2097152){
    $errors[]='File size must be under 2 MB';
    }				
   	
   	//update database
    if(empty($errors)==true){
    	## connect mysql server
		# check connection
		if ($con->connect_errno) {
			echo "<p>MySQL error no {$con->connect_errno} : {$con->connect_error}</p>";
			exit();
		}

		//move file to folder on server
        move_uploaded_file($file_tmp,"../img/".$file_name);

        # insert data into mysql database
		$sql = "UPDATE lots
					SET img = '{$file_name}'
					WHERE id = {$_REQUEST['lot_id']} ";

		if ($con->query($sql)) {echo "Success";} 
		 
    }else{
    	print_r($errors);
    }
?>