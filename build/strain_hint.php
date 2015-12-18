<?php

$tmp = "";

include_once('../lib/config.php');
$sql="SELECT name
        FROM strain_list
        WHERE name LIKE '{$_REQUEST['q']}%'";

$r = mysqli_query($con,$sql);

if ($_REQUEST["q"] !== "" AND count(mysqli_fetch_array($r)) !== 0) {

    foreach($r as $s) {

            if ($tmp === "") {
                $tmp = '<li class="list-group-item">'
                        .$s['name'].
                        '</li>';
            } else {
                $tmp .= '<li class="list-group-item">'
                        .$s['name'].
                        '</li>';
            }
        }
    
}

echo $tmp === "" ? "no suggestion" : $tmp;
?>