<?php
$sql="SELECT name
        FROM strain_list
        WHERE name 
        LIKE '%{$_REQUEST['q']}%'"
        ?>