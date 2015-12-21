<?php

$s_to = 'v';

$sql='SELECT 
        strain_list.name, 
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

include_once('d_map.php');
?>