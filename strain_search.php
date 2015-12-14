<?php
// get the q parameter from URL
$search_q = $_REQUEST["q"];

$search_hint = "";

include_once('lib/config.php');
$search_sql="SELECT name, id FROM strain_list WHERE name LIKE '".$search_q."%'";
$search_result = mysqli_query($con,$search_sql);
$search_a = mysqli_fetch_array($search_result);

if ($search_q !== "" AND count($search_a) !== 0) {

	foreach($search_result as $strain){
		$search_results[] = array($strain['name'], $strain['id']);
	}

    $search_q = strtolower($search_q);
    $search_len=strlen($search_q);
    foreach($search_results as $search_name) {
        if (stristr($search_q, substr($search_name[0], 0, $search_len))) {
            if ($search_hint === "") {
                $search_hint = '<div class="panel panel-default">
                                    <div class="panel-heading">'.$search_name[0].'</div>
                                    <div class="panel-body">
                                        <iframe style="display: none" onload="farm_srch('.$search_name[1].')"></iframe>
                                        <div id="farmers-list-'.$search_name[1].'" class="row"></div>
                                        <ul id="retail-list-'.$search_name[1].'" class="listgroup"></ul>
                                    </div>
                                </div>';
                $search_id = $search_name[1];
            } else {
                $search_hint .= '<div class="panel panel-default"><div class="panel-heading">'.$search_name[0].'</div><div class="panel-body"><iframe style="display: none" onload="farm_srch('.$search_name[1].')"></iframe><div id="farmers-list-'.$search_name[1].'" class="row"></div></div></div>';
                $search_id = $search_name[1];
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $search_hint === "" ? "no suggestion" : $search_hint;
?>