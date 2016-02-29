<?php

$tmp = '';

//required to make a connection with the database
require_once('../lib/config.php');

//pull data
$r = mysqli_query($con,$sql);
	
	ob_start();

	require 'blocks/header.html';

	echo '<div class="row content">';

		foreach($r as $s)
		{
		   if(isset($_REQUEST['search']))
		     {require 'path.php';}
		   
		   //$s_to can be found at [build/s_chain.php]
		   //build data according to html template
		   require 'blocks/'.$_REQUEST['view'].'.html';
		}

		$tmp .= ob_get_contents();

	echo '</div>';

	ob_end_clean();

//echo results
echo $tmp ? $tmp : '<div class="container">
						<span class="glyphicon glyphicon-exclamation-sign">
						</span> 
						Sorry, No Results.
					</div>';
?>