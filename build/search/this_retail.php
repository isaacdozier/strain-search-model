<?php
$sql="SELECT transactions.retail_id, 
             retail_list.name, 
             retail_list.website, 
             retail_list.addr, 
             retail_list.plus_tax, 
             transactions.g_price,
             transactions.g_measure,
             transactions.pur_date
            FROM transactions 
            left JOIN retail_list
                ON transactions.retail_id=retail_list.id
            WHERE lot_id = '{$_REQUEST['q']}'";
?>