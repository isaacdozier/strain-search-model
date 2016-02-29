<?php

define('__ROOT__', 'C:/xampp-2/htdocs/');

$root = 'http://localhost:8012/';
global $root;

$_SESSION['user']   = true;
$_SESSION['u_type'] = 'admin';


//strain variables

$unit = ['1 gram',         //0
		 '2 grams',		   //1
         '1/8th',          //2
	     'Quart Ounce',    //3
	     'Half Ounce',     //4
	     'Ounce',          //5
	     'Joint',];        //6
global $unit;

$type = ['none defined',			   //0
		 'Sativa',                     //1
		 'Indica',		               //2
         '50/50 Hybrid',               //3
	     'Sativa Dominent Hybrid',     //4
	     'Indica Dominent Hybrid',     //5
	     'High CBD',];                 //6
global $unit;

$r_header = (object) array('query'     => 'Search: ',
						   'search'    => '',
						   'review'    => 'Review: ',
						   'retail'    => 'Retail: ',
						   'custom_q'  => 'Custom Search: ',
						   'favorite'  => 'Here are my favorite strains & producers. ', 
					       'farm'      => 'Producer UBI #',
					  	   'strain'    => 'Strain: ',
					 	   'lot'       => 'Lot #',
					 	   'shi'       => 'Strain Type: ');
global $r_header;

?>