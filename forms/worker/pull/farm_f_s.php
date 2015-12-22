<?php

$n_tmp = '';
$id_tmp = '';

include_once('../../../lib/config.php');
$s_sql="SELECT farm_list.name, farm_list.id
            FROM farm_list
            WHERE farm_list.name LIKE '".$_REQUEST["q"]."%'";

$result = mysqli_query($con,$s_sql);
$s_arr = mysqli_fetch_array($result);

if ($_REQUEST["q"] !== "" AND count($s_arr) !== 0) {

    $search_q = strtolower($_REQUEST["q"]);
    $search_len=strlen($search_q);
    foreach($result as $farm) {
        if ($n_tmp === "") {
            $n_tmp = $farm['name'];
            $id_tmp = $farm['id'];
        } else {
            $n_tmp .= ' / '.$farm['name'];
        }
    }
}

// Output
echo $n_tmp === "" ? "no farm found" : $n_tmp.'<input class="form-control" name="farm_id" type="hidden" value="'.$id_tmp.'"/>';
?>