<?php

$tmp = "";

include_once('lib/config.php');
$f_sql="SELECT lots.strain_id, lots.img, lots.id, lots.harvest_date, lots.lot_number, farm_list.name
			FROM lots
            left JOIN farm_list
            ON lots.farm_id = farm_list.id
			WHERE strain_id = '{$_REQUEST['q']}'
			limit 4";
$result = mysqli_query($con,$f_sql);

foreach($result as $farm_strain){
    if ($tmp === "") {
        $tmp = '<div class="col-xs-12">
    				<a href="#" onclick="retail_srch('.$farm_strain['strain_id'].','.$farm_strain['id'].')" class="thumbnail">
    					'.'Lot# '.$farm_strain['lot_number'].' from '.$farm_strain['name'].' [harvested:'.$farm_strain['harvest_date'].']'.'
    				</a>
    			</div>';
    } else {
        $tmp .= '<div class="col-xs-12">
   					 <a href="#" onclick="retail_srch('.$farm_strain['strain_id'].','.$farm_strain['id'].')" class="thumbnail">
    					'.$farm_strain['lot_number'].' from '.$farm_strain['name'].'
    				</a>
 			     </div>';
    }
}

echo $tmp === "" ? "no suggestion" : $tmp;
?>