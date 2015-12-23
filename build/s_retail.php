<?php

$s_to = 'retail';

$sql="SELECT transactions.retail_id, 
             retail_loc_list.name, 
             retail_loc_list.plus_tax, 
             transactions.g_price
            FROM transactions 
            left JOIN retail_loc_list
                ON transactions.retail_id=retail_loc_list.id
            WHERE lot_id = '{$_REQUEST['q']}'";

include_once('d_map.php');
?>