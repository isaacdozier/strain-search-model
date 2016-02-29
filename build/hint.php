<?php

require_once('../lib/common.php');

$srch = '';

//check query parameters
$srch = str_replace('-',' ', htmlspecialchars($_REQUEST['q'], ENT_QUOTES));

//SQL query for type of data we are pulling
require_once('search/'.$_REQUEST['type'].'_'
	         		  .$_REQUEST['view'].'.php');

$tmp = '';

//required to make a connection with the database
require_once('../lib/config.php');

//pull data
$r = mysqli_query($con,$sql);

//do not remove
	//for storing include() files in a var
	ob_start();

		foreach($r as $s)
		{
		   if(isset($_REQUEST['search']))
		     {require 'path.php';}
		   
		   //$s_to can be found at [build/s_chain.php]
		   //build data according to html template
		   require 'blocks/'.$_REQUEST['view'].'.html';
		}

		$tmp .= ob_get_contents();

	ob_end_clean();

//echo results
echo $tmp ? $tmp : '';

?>