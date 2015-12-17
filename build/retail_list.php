<?php

$tmp = "";

include_once('../lib/config.php');

$sql="SELECT transactions.retail_id, retail_loc_list.name, retail_loc_list.plus_tax, transactions.g_price
            FROM transactions 
            left JOIN retail_loc_list
                ON transactions.retail_id=retail_loc_list.id
            WHERE strain_id = '{$_REQUEST['sq']}' 
                AND lot_id = '{$_REQUEST['lq']}'";

$r = mysqli_query($con,$sql);

foreach($r as $s){
    if ($tmp === "") {
        $tmp = '<p class="list-group-item">'
                .$s['name']
                .' - $'.$s['g_price']
                .' <span class="tiny-text">per gram</span>
                </p>';
    } else {
        $tmp .= '<p class="list-group-item">'
                .$s['name']
                .' - $'.$s['g_price']
                .' <span class="tiny-text">per gram</span>
                </p>';
    }
}

echo $tmp === "" ? "no results" : $tmp;
?>