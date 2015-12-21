<?php

$tmp = "";

require_once('../lib/config.php');

$r = mysqli_query($con,$sql);
$i=0;
foreach($r as $s){
	  ob_start();
      require_once 'blocks/s_'.$s_to.'_b.html';
      echo ob_get_contents();}
?>