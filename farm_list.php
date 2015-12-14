<?php
// get the q parameter from URL
$farm_q = $_REQUEST["q"];

$farm_hint = "";

include_once('lib/config.php');
$farm_sql="SELECT lots.strain_id, lots.img, lots.id, lots.farm_id
			FROM lots
			WHERE strain_id = '{$farm_q}'
			limit 4";
$farm_result = mysqli_query($con,$farm_sql);
$farm_a = mysqli_fetch_array($farm_result);



	foreach($farm_result as $strain){
            if ($farm_hint === "") {
                $farm_hint = '<div class="col-xs-6 col-md-3">
                				<a href="#" onclick="retail_srch('.$strain['strain_id'].','.$strain['id'].')" class="thumbnail">
                					<img src="img/'.$strain['img'].'" alt="...">
                				</a>
                			  </div>';
            } else {
                $farm_hint .= '<div class="col-xs-6 col-md-3">
               					 <a href="#" onclick="retail_srch('.$strain['strain_id'].','.$strain['id'].')" class="thumbnail">
                					<img src="img/'.$strain['img'].'" alt="...">
                				</a>
             			     </div>';
            }
	}



// Output "no suggestion" if no hint was found or output correct values 
echo $farm_hint === "" ? "<div class='alert alert-warning' role='alert'>no suggestion</div>" : $farm_hint;
?>