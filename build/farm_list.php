<?php

$tmp = "";

include_once('../lib/config.php');

$sql="SELECT lots.strain_id, 
               lots.img,  
               lots.img_alt,
               lots.id, 
               lots.harvest_date, 
               lots.lot_number,
               farm_list.name
		FROM farm_list
         left JOIN lots
         ON lots.farm_id = farm_list.id
		WHERE strain_id = '{$_REQUEST['q']}'
        ORDER BY lots.harvest_date asc
		limit 4";

$r = mysqli_query($con,$sql);

foreach($r as $s){
    if ($tmp === "") {
        $tmp = '<div id="rate-list-'.$s['id'].'" class="progress"></div>
                <iframe style="display: none" onload="lot_rate('.$s['id'].')"></iframe>
                <a href="#" onclick="retail_srch('.$s['strain_id'].','.$s['id'].')">
                    <img alt="'.$s['img_alt'].'" class="img-responsive img-rounded" src="img/'.$s['img'].'"/>
                </a>
                <span id="retail-list-'.$s['id'].'" ></span>';
    } else {
        $tmp .= '<div id="rate-list-'.$s['id'].'" class="progress"></div>
                <iframe style="display: none" onload="lot_rate('.$s['id'].')"></iframe>
                <a href="#" onclick="retail_srch('.$s['strain_id'].','.$s['id'].')">
                    <img alt="'.$s['img_alt'].'" class="img-responsive img-rounded" src="img/'.$s['img'].'"/>
                </a>
                <span id="retail-list-'.$s['id'].'" ></span>';
    }
}

echo $tmp === "" ? "no results" : $tmp;

?>