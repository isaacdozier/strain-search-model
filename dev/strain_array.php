<?php

include_once('lib/config.php');
$search_sql="SELECT * FROM strain_list LIMIT 1 WHERE";
$search_result = mysqli_query($con,$search_sql);
$search_a = mysqli_fetch_array($search_result);

foreach($search_result as $strain){
	$search_results[] = array($strain['name'], $strain['id']);

}



?>