<?php	
include_once('../lib/config.php');

if (isset($_POST['submit'])) {
## connect mysql server
	# check connection
	if ($con->connect_errno) {
		echo "<div class='error_text failure'>
		<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>
		</div>";
		exit();
	}
	
	## query database
	# prepare data for insertion
	$strain_id = $_POST['strain_id'];
	$farm_id	= $_POST['farm_id'];
	$lot = $_POST['lot_number'];
	$harvest_date = $_POST['harvest_date'];
	
	
	# insert data into mysql database
	$sql = "INSERT  INTO `lots` (`id`, `strain_id`, `lot_number`, `farm_id`, `harvest_date`) 
			VALUES (NULL,  '{$strain_id}', '{$lot}', '{$farm_id}', '{$harvest_date}')";

	if ($con->query($sql)) {
		echo "<p>New Strain ... Success!</p>";
	} else {
		echo "<p>MySQL error no {$con->errno} : {$con->error}</p>";
		exit();
	}
	include_once('img_form.php');
} else if(isset($_FILES['image'])){

	$sql = "SELECT strain_list.name
			FROM lots
			INNER JOIN strain_list
				ON strain_list.id=lots.strain_id
			WHERE lots.id === ".$_REQUEST['lot_id']."
			LIMIT 1";

	$result = mysqli_query($con,$sql);


    $errors= array();
    $insert_id = $_REQUEST['lot_id'];
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];   
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    $extensions = array("jpeg","jpg","png"); 		
    
    if(in_array($file_ext,$extensions )=== false){
     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152){
    $errors[]='File size must be under 2 MB';
    }				
   
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
		 
    }else{print_r($errors);}
} else {
	include_once('lot_form.php');
}

include('../inc_exec/foot.php');
?>