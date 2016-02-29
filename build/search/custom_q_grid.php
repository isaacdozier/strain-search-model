<?php
$sql="SELECT 
       lots.strain_id, 
       lots.img,  
       lots.img_alt,
       lots.id as lot_id, 
       lots.rate,
       lots.d_rate,
       lots.harvest_date, 
       lots.lot_number,
       farm_list.name as farm_name,
       strain_list.name as strain_name,
       strain_list.id as strain_id
      FROM lots
       left JOIN farm_list
        ON lots.farm_id = farm_list.id
       left JOIN strain_list
        ON lots.strain_id = strain_list.id
      WHERE lots.".$srch." = true
      ORDER BY lots.rate desc
      LIMIT 12";
?>