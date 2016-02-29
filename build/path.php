<?php
//next path builder/variables
if(empty($_REQUEST['q']))
 $next = str_replace(' ','-',$s['strain_name']) . '/';
else
if(!is_numeric($_REQUEST['q']) and !empty($_REQUEST['q']))
 $next = str_replace(' ','-',$s['strain_name']) .'/'. $s['lot_number'] . '/';
?>