<?php

define('__ROOT__', dirname(dirname(__FILE__)));
     
if(isset($_GET['q']))
	require_once(__ROOT__.'/build/s_grid.php');

?>