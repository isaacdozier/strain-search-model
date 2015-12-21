<?php

$s_to = 'h';

$sql="SELECT name
        FROM strain_list
        WHERE name 
        LIKE '{$_REQUEST['q']}%'";

include_once('d_map.php');

?>