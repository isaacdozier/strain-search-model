<?php

$tmp = "";

include_once('lib/config.php');

$sql="SELECT * FROM review_list";

$result = mysqli_query($con,$sql);

foreach($result as $strain){
    if ($tmp === "") {
        $tmp = '<p class="list-group-item">'.$strain['desc'].'</p>';
    } else {
        $tmp .= '<p class="list-group-item">'.$strain['desc'].'</p>';
    }
}

echo $tmp === "" ? "no results" : $tmp;
?>