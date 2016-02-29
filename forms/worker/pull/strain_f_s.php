<?php

$n_tmp = '';
$id_tmp = '';

include_once('../../../lib/config.php');
$s_sql="SELECT strain_list.name, strain_list.id
            FROM strain_list
            WHERE strain_list.name LIKE '".$_REQUEST["q"]."%'";

$result = mysqli_query($con,$s_sql);
$s_arr = mysqli_fetch_array($result);

if ($_REQUEST["q"] !== "" AND count($s_arr) !== 0) {

    $search_q = strtolower($_REQUEST["q"]);
    $search_len=strlen($search_q);
    foreach($result as $strain) {
        if ($n_tmp === "") {
            $n_tmp = '<option value="'.$strain['id'].'">'.$strain['name'].'</option>';
        } else {
            $n_tmp .= '<option value="'.$strain['id'].'">'.$strain['name'].'</option>';
        }
    }
}

// Output
echo $n_tmp === "" ? $_REQUEST["q"] : $n_tmp;
?>