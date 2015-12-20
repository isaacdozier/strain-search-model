<?php

$tmp = "";

include_once('../lib/config.php');
$sql="SELECT lots.strain_id, 
               lots.img,  
               lots.img_alt,
               lots.id as lot_id, 
               lots.rate,
               lots.d_rate,
               lots.harvest_date, 
               lots.lot_number,
               farm_list.name as farm_name,
               strain_list.name as strain_name,
               strain_list.id as strain_id
        FROM lots
         left JOIN farm_list
         ON lots.farm_id = farm_list.id
         left JOIN strain_list
         ON lots.strain_id = strain_list.id
        WHERE strain_list.name LIKE '{$_REQUEST['q']}%'
        ORDER BY lots.rate desc
        limit 12";

$r = mysqli_query($con,$sql);

if ($_REQUEST["q"] !== "" AND count(mysqli_fetch_array($r)) !== 0) {

    foreach($r as $s) {

            if ($tmp === "") {
                $tmp = '<div class="page-bg col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="well">
                                <a href="#" onclick="strain_this('.$s['strain_id'].')">'
                                    .$s['strain_name'].
                                '</a>
                                
                                    <div class="progress">
                                      <div class="progress-bar 
                                                  progress-bar-success" 

                                                role="progressbar" 
                                                aria-valuenow="40"
                                                aria-valuemin="0" 
                                                aria-valuemax="100" 
                                                style="width:'.abs($s['rate']/2).'%">
                                      </div>
                                      <div class="progress-bar 
                                                  progress-bar-danger" 

                                                role="progressbar" 
                                                aria-valuenow="40"
                                                aria-valuemin="0" 
                                                aria-valuemax="100" 
                                                style="width:'.abs($s['d_rate']/2).'%">
                                      </div>
                                    </div>
                                 
                                <a href="#">
                                    <img alt="'.$s['img_alt'].'" class="img-responsive img-rounded" src="img/'.$s['img'].'"/>
                                </a>
                            </div>
                        </div>';
            } else {
                $tmp .= '<div class="page-bg col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="well">
                                <a href="#" onclick="strain_this('.$s['strain_id'].')">'
                                    .$s['strain_name'].
                                '</a>
                                
                                    <div class="progress">
                                      <div class="progress-bar 
                                                  progress-bar-success" 

                                                role="progressbar" 
                                                aria-valuenow="40"
                                                aria-valuemin="0" 
                                                aria-valuemax="100" 
                                                style="width:'.$s['rate'].'%">
                                      </div>
                                      <div class="progress-bar 
                                                  progress-bar-danger" 

                                                role="progressbar" 
                                                aria-valuenow="40"
                                                aria-valuemin="0" 
                                                aria-valuemax="100" 
                                                style="width:'.abs(100-$s['rate']).'%">
                                      </div>
                                    </div>
                                 
                                <a href="#">
                                    <img alt="'.$s['img_alt'].'" class="img-responsive img-rounded" src="img/'.$s['img'].'"/>
                                </a>
                            </div>
                        </div>';
            }
        }
    
}

echo $tmp === "" ? "no suggestion" : $tmp;
?>