<?php

$tmp = "";

include_once('lib/config.php');

$ret_sql="SELECT transactions.retail_id, retail_loc_list.name 
            FROM transactions 
            left JOIN retail_loc_list
            ON transactions.retail_id=retail_loc_list.id
            WHERE strain_id = '{$_REQUEST['sq']}' 
            AND lot_id = '{$_REQUEST['lq']}'";

$result = mysqli_query($con,$ret_sql);

foreach($result as $strain){
    if ($tmp === "") {
        $tmp = '<li class="list-group-item">'.$strain['name'].'</li>';
    } else {
        $tmp .= '<li class="list-group-item">'.$strain['name'].'</li>';
    }
}

echo $tmp === "" ? "no results" : $tmp;
?>