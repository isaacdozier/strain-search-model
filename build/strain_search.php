<?php

$tmp = "";

include_once('../lib/config.php');
$sql="SELECT strain_list.name, strain_list.id
            FROM lots
            right JOIN strain_list
                ON lots.strain_id=strain_list.id
            WHERE strain_list.name LIKE '{$_REQUEST['q']}%'
            ORDER BY lots.rate asc";

$r = mysqli_query($con,$sql);

if ($_REQUEST["q"] !== "" AND count(mysqli_fetch_array($r)) !== 0) {

    foreach($r as $s) {

            if ($tmp === "") {
                $tmp = '<div class="well col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <a href="#" onclick="strain_this('.$s['id'].')">'.$s['name'].'</a>
                            <div id="f-list-'.$s['id'].'" class="row"></div>
                                <iframe style="display: none" onload="farm_srch('.$s['id'].')"></iframe>
                        </div>';
            } else {
                $tmp .= '<div class="well col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <a href="#" onclick="strain_this('.$s['id'].')">'.$s['name'].'</a>
                            <div id="f-list-'.$s['id'].'" class="row"></div>
                                <iframe style="display: none" onload="farm_srch('.$s['id'].')"></iframe>
                        </div>';
            }
        }
    
}

echo $tmp === "" ? "no suggestion" : $tmp;
?>