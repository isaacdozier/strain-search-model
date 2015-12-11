<?php
// get the q parameter from URL
$retail_sq = $_REQUEST["sq"];
$retail_lq = $_REQUEST["lq"];

$retail_hint = "";

include_once('lib/config.php');
$retail_sql="SELECT transactions.retail_id, retail_loc_list.name 
            FROM transactions 
            left JOIN retail_loc_list 
            ON transactions.retail_id=retail_loc_list.id
                WHERE strain_id = '{$retail_sq}' 
                AND lot_id = '{$retail_lq}' 
            limit 4";
$retail_result = mysqli_query($con,$retail_sql);
$retail_a = mysqli_fetch_array($retail_result);



	foreach($retail_result as $strain){
            if ($retail_hint === "") {
                $retail_hint = '<li class="list-group-item">'.$strain['name'].'</li>';
            } else {
                $retail_hint .= '<li class="list-group-item">'.$strain['name'].'</li>';
            }
	}



// Output "no suggestion" if no hint was found or output correct values 
echo $retail_hint === "" ? "no results" : $retail_hint;
?>