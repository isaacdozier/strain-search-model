<?php
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
		echo "<p>Success!</p>";
	} else {
		echo "<p>MySQL error no {$con->errno} : {$con->error}</p>";
		exit();
	}
?>