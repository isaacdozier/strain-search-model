<html>
<head>
<title>Strains</title>
</head>
<body>
<?php
include_once('../lib/config.php');
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
?>
</body>
</html>