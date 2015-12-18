<?php

$tmp = "";

include_once('../lib/config.php');

$sql="SELECT review_list.r_desc
    FROM review_list
    WHERE review_list.lot = '{$_REQUEST['q']}' 
    LIMIT 1";

$r = mysqli_query($con,$sql);

foreach($r as $s){
    if ($tmp === "") {
        $tmp = '<p>'
               .$s['r_desc'].
               '</p>';
    } else {
        $tmp .= '<p>'
                .$s['r_desc'].
                '</p>';
    }
}

echo $tmp === "" ? "Sorry, we currently have no reviews." : "Review:".$tmp;
?>