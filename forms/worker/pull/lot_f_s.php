<?php

$n_tmp = '';
$id_tmp = '';

include_once('../../../lib/config.php');
$s_sql="SELECT lots.lot_number
            FROM lots
            WHERE lots.lot_number LIKE '".$_REQUEST["q"]."%'";

$result = mysqli_query($con,$s_sql);
$s_arr = mysqli_fetch_array($result);

// Output
echo isset($s_arr) === false
     ? '' 
     : $s_arr[0];
?>