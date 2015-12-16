<?php

$tmp = "";

include_once('lib/config.php');

$ret_sql="SELECT transactions.retail_id, retail_loc_list.name, retail_loc_list.plus_tax, transactions.g_price
            FROM transactions 
            left JOIN retail_loc_list
                ON transactions.retail_id=retail_loc_list.id
            WHERE strain_id = '{$_REQUEST['sq']}' 
                AND lot_id = '{$_REQUEST['lq']}'";

$result = mysqli_query($con,$ret_sql);

foreach($result as $strain){
    if ($tmp === "") {
        $tmp = '<p class="list-group-item">'
                .$strain['name']
                .' - $'.$strain['g_price']
                .' <span class="tiny-text">per gram'
                .'</span></p>';
    } else {
        $tmp .= '<p class="list-group-item">'.$strain['name'].'</p>';
    }
}

echo $tmp === "" ? "no results" : $tmp;
?>