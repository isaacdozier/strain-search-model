<?php

$tmp = "";

include_once('../lib/config.php');
$sql="SELECT lots.rate
            FROM lots            
            WHERE id = '{$_REQUEST['q']}'  
            LIMIT 1";

$r = mysqli_query($con,$sql);

foreach($r as $s) {
    $tmp = '<div class="progress-bar 
                        progress-bar-success" 

                role="progressbar" 
                aria-valuenow="40"
                aria-valuemin="0" 
                aria-valuemax="100" 
                style="width:'.$s['rate'].'%">
          </div>

          <div class="progress-bar 
                        progress-bar-danger" 

                role="progressbar" 
                aria-valuenow="40"
                aria-valuemin="0" 
                aria-valuemax="100" 
                style="width:'.abs(100-$s['rate']).'%">
          </div>';
}

echo $tmp === "" ? "" : $tmp;
?>
