<?php

$tmp = "";

include_once('lib/config.php');
$s_sql="SELECT strain_list.name, strain_list.id
            FROM strain_list
            WHERE strain_list.name LIKE '".$_REQUEST["q"]."%'";

//test sql - not active
$tmp_sql="SELECT strain_list.name, strain_list.id, lots.lot_number
            FROM strain_list
            left JOIN lots 
            ON strain_list.id=lots.strain_id
            WHERE strain_list.name LIKE '".$_REQUEST["q"]."%'";

$result = mysqli_query($con,$s_sql);
$s_arr = mysqli_fetch_array($result);

if ($_REQUEST["q"] !== "" AND count($s_arr) !== 0) {

    $search_q = strtolower($_REQUEST["q"]);
    $search_len=strlen($search_q);
    foreach($result as $strain) {
        if (stristr($search_q, substr($strain['name'], 0, $search_len))) {
            if ($tmp === "") {
                $tmp = '<div class="panel panel-default">
                            <div class="panel-heading"><a href="#" onclick="strain_this('.$strain['id'].')">'.$strain['name'].'</a></div>
                            <div class="panel-body">
                                <iframe style="display: none" onload="farm_srch('.$strain['id'].')"></iframe>
                                <div id="farmers-list-'.$strain['id'].'" class="row"></div>
                            </div>
                        </div>';
                $search_id = $strain['id'];
            } else {
                $tmp .= '<div class="panel panel-default">
                                    <div class="panel-heading">'.$strain['name'].'</div>
                                    <div class="panel-body">
                                        <iframe style="display: none" onload="farm_srch('.$strain['id'].')"></iframe>
                                        <div id="farmers-list-'.$strain['id'].'" class="row"></div>
                                    </div>
                                </div>';
                                
                $search_id = $strain['id'];
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $tmp === "" ? "no suggestion" : $tmp;
?>