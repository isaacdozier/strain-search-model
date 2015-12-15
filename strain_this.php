<?php

$tmp = "";

include_once('lib/config.php');
$s_sql='SELECT strain_list.name, strain_list.id, lots.img, lots.farm_id, lots.lot_number
            FROM lots            
            left JOIN strain_list
                ON lots.strain_id = strain_list.id
            WHERE strain_list.id = '.$_REQUEST["q"].'
            LIMIT 10';

$result = mysqli_query($con,$s_sql);
$s_arr = mysqli_fetch_array($result);

if ($_REQUEST["q"] !== "" AND count($s_arr) !== 0) {

    foreach($result as $strain) {
            if ($tmp === "") {
                $tmp = '<h1>'.$strain['name'].'</h1>
                        <div class="well">
                            <div class="row">
                                <div class="col-xs-12 col-md-4">
                                    <img width="240" src="img/'.$strain['img'].'" alt="'. $strain['name'].'"/>
                                </div>
                                <div class="col-xs-12 col-md-8">
                                    <div class="container">
                                    <h4>Lot# '.$strain['lot_number'].'</h4>
                                        <iframe style="display: none" onload="reviews('.$strain['lot_number'].')"></iframe>
                                        <div id="reviews-'.$strain['lot_number'].'" class="row"></div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                $search_id = $strain['id'];
            } else {
                $tmp .= '<div class="well">
                        <img width="240" src="img/'.$strain['img'].'" alt="'. $strain['name'].'"/>
                        </div>';
                                
                $search_id = $strain['id'];
            }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $tmp === "" ? "no suggestion" : $tmp;
?>
