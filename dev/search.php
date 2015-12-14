<?php

require_once('strain_array.php');

// get the q parameter from URL
$search_q = $_REQUEST["q"];

$search_hint = "";

//echo "<pre>", var_dump($search_results), "</pre>";

// lookup all hints from array if $q is different from "" 
if ($search_q !== "") {
    $search_q = strtolower($search_q);
    $search_len=strlen($search_q);
    foreach($search_results as $search_name) {
        if (stristr($search_q, substr($search_name[0], 0, $search_len))) {
            if ($search_hint === "") {
                $search_hint = $search_name[0];
                $search_id = $search_name[1];
            } else {
                $search_hint .= $search_name[0];
                $search_id = $search_name[1];
            }
        }
    }
}



// Output "no suggestion" if no hint was found or output correct values 
echo $search_hint === "" ? "no suggestion" : $search_hint;

?>