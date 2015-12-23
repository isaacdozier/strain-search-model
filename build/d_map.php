<?php

$tmp = "";

require_once('../lib/config.php');

$r = mysqli_query($con,$sql);

ob_start();

foreach($r as $s)
{
   require 'blocks/s_'.$s_to.'_b.html';
}

$tmp .= ob_get_contents();

ob_end_clean();

echo $tmp ? $tmp : 'Sorry, No Results.';
?>