<?php

define('__ROOT__', dirname(dirname(__FILE__))); 
require_once(__ROOT__.'/lib/config.php');
     
if(isset($_GET['ns'])) //DEFAULT ns_ FORM CHAIN
	 //--
	 //--
	 //--
	{
		//ref $_FILES
		$p_to = $_GET['ns'].'_';

		//--
		//(--1--)--no form has been submitted 
		//--
		//--[new strain form]
		require_once(__ROOT__.'/forms/bricks/'.$p_to.'f.html');
	}


?>