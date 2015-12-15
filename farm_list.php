<?php

$tmp = "";

include_once('lib/config.php');
$f_sql="SELECT lots.strain_id, lots.img, lots.id, lots.harvest_date, lots.lot_number, farm_list.name
		FROM lots
        left JOIN farm_list
        ON lots.farm_id = farm_list.id
		WHERE strain_id = '{$_REQUEST['q']}'
        ORDER BY lots.harvest_date asc
		limit 4";
$result = mysqli_query($con,$f_sql);

foreach($result as $farm_strain){
    if ($tmp === "") {
        $tmp = '<div class="col-xs-12 col-md-6 col-lg-3">
                    <div class="thumbnail">
                        <img alt="test" src="img/'.$farm_strain['img'].'"/>
                        <div class="caption">
                            <p>harvested:'.$farm_strain['harvest_date'].'<br/>'
                            .'lot#'.$farm_strain['lot_number']
                            .'<a href="#" onclick="retail_srch('.$farm_strain['strain_id'].','.$farm_strain['id'].')">
                               <span class="glyphicon glyphicon-eye-open"></span>
                              </a>
                            </p>
                        </div>
                        <span id="retail-list-'.$farm_strain['id'].'" class="listgroup"></span>
                    </div>
                </div>';
    } else {
        $tmp .= '<div class="col-xs-12 col-md-6 col-lg-3">
                    <div class="thumbnail">
                        <img alt="test" src="img/'.$farm_strain['img'].'"/>
                        <div class="caption">
                            <p>harvested:'.$farm_strain['harvest_date'].'<br/>'
                            .'lot#'.$farm_strain['lot_number']
                            .'<a href="#" onclick="retail_srch('.$farm_strain['strain_id'].','.$farm_strain['id'].')">
                               <span class="glyphicon glyphicon-eye-open"></span>
                              </a>
                            </p>
                        </div>
                        <span id="retail-list-'.$farm_strain['id'].'" class="listgroup"></span>
                    </div>
                </div>';
    }
}

echo $tmp === "" ? "<div class='container'>no suggestion</div>" : $tmp;
?>