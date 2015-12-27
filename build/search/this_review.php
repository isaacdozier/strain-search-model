<?php
$sql="SELECT review_list.r_desc
    FROM review_list
    WHERE review_list.lot = '{$_REQUEST['q']}' 
    LIMIT 1";
?>