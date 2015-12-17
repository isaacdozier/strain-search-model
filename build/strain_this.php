<?php

$tmp = "";

include_once('../lib/config.php');
$sql='SELECT strain_list.name, 
               strain_list.id,
               lots.id as lot_id, 
               lots.img, 
               lots.farm_id, 
               lots.lot_number
            FROM lots            
            left JOIN strain_list
                ON lots.strain_id = strain_list.id
            WHERE strain_list.id = '.$_REQUEST["q"].'
            LIMIT 12';

$r = mysqli_query($con,$sql);

if ($_REQUEST["q"] !== "" AND count(mysqli_fetch_array($r)) !== 0) {

    foreach($r as $s) {
            if ($tmp === "") {
                $tmp = '<h1>'.$s['name'].'</h1>
                        <div class="well">
                            <div class="row">
                                <div class="col-xs-12 col-md-4">
                                    <div class=" thumbnail">
                                        <img src="img/'.$s['img'].'" alt="'. $s['name'].'"/>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-8">
                                    <h4>Reviews</h4>
                                        <iframe style="display: none" onload="reviews('.$s['lot_id'].')"></iframe>
                                        <div id="reviews-'.$s['lot_id'].'"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-8">
                                    Lot# '.$s['lot_number'].'
                                </div>
                            </div>
                        </div>';
            } else {
                $tmp .= '<h1>'.$s['name'].'</h1>
                        <div class="well">
                            <div class="row">
                                <div class="col-xs-12 col-md-4">
                                    <div class=" thumbnail">
                                        <img src="img/'.$s['img'].'" alt="'. $s['name'].'"/>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-8">
                                    <h4>Reviews</h4>
                                        <iframe style="display: none" onload="reviews('.$s['lot_id'].')"></iframe>
                                        <div id="reviews-'.$s['lot_id'].'"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-8">
                                    Lot# '.$s['lot_number'].'
                                </div>
                            </div>
                        </div>';
            }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $tmp === "" ? "no suggestion" : $tmp;
?>
