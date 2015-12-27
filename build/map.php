<?php

$tmp = "";

require_once('../lib/config.php');

//pull data
$r = mysqli_query($con,$sql);

	//do not remove
	//for storing include() files in a var
	ob_start();

		foreach($r as $s)
		{
		   //$s_to can be found at [build/s_chain.php]
		   //build data according to html template
		   require 'blocks/'.$s_to.'.html';
		}

		$tmp .= ob_get_contents();

	ob_end_clean();

//echo results
echo $tmp ? $tmp : '<div class="container">
						<span class="glyphicon glyphicon-exclamation-sign">
						</span> 
						Sorry, No Results.
					</div>';
?>