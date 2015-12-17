<?php

$tmp = "";

include_once('../lib/config.php');
$sql="SELECT strain_list.name, strain_list.id
            FROM strain_list
            WHERE strain_list.name LIKE '".$_REQUEST["q"]."%'";

$r = mysqli_query($con,$sql);

if ($_REQUEST["q"] !== "" AND count(mysqli_fetch_array($r)) !== 0) {

    foreach($r as $s) {

            if ($tmp === "") {
                $tmp = '<div class="panel panel-default">
                            <div class="panel-heading"><a href="#" onclick="strain_this('.$s['id'].')">'.$s['name'].'</a></div>
                            <div class="panel-body">
                                <iframe style="display: none" onload="farm_srch('.$s['id'].')"></iframe>
                                <div id="f-list-'.$s['id'].'" class="row"></div>
                            </div>
                        </div>';
            } else {
                $tmp .= '<div class="panel panel-default">
                            <div class="panel-heading"><a href="#" onclick="strain_this('.$s['id'].')">'.$s['name'].'</a></div>
                            <div class="panel-body">
                                <iframe style="display: none" onload="farm_srch('.$s['id'].')"></iframe>
                                <div id="f-list-'.$s['id'].'" class="row"></div>
                            </div>
                        </div>';
            }
        }
    
}

echo $tmp === "" ? "no suggestion" : $tmp;
?>