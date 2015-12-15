<?php include('../inc_exec/header.php'); ?>
	

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	<div class="container">
	<h1>Insert New Strain Data</h1>

	Strain<input type="text" class="form-control" onkeyup="strain_form(this.value)"/>
			<div id="strain_form_txt"></div>
			  <br/>
	Farm<input type="text" class="form-control" onkeyup="farm_form(this.value)"/>
			<div id="farm_form_txt"></div>
			  <br/>
	Lot#<input type="text" class="form-control" name="lot_number"/>
			  <br/>
	Harvest Date<input type="date" class="form-control" name="harvest_date"/>
			  <br/>
		
		<input  class="form-control" type="submit" name="submit" value="Submit" />	
	</div>
</form>

<?php	
if (isset($_POST['submit'])) {
	include_once('../lib/config.php');
## connect mysql server
	# check connection
	if ($con->connect_errno) {
		echo "<div class='error_text failure'>
		<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>
		</div>";
		exit();
	}
	
	## query database
	# prepare data for insertion
	$strain_id = $_POST['strain_id'];
	$farm_id	= $_POST['farm_id'];
	$lot = $_POST['lot_number'];
	$harvest_date = $_POST['harvest_date'];
	
	
	# insert data into mysql database
	$sql = "INSERT  INTO `lots` (`id`, `strain_id`, `lot_number`, `farm_id`, `harvest_date`) 
			VALUES (NULL,  '{$strain_id}', '{$lot}', '{$farm_id}', '{$harvest_date}')";

	if ($con->query($sql)) {
		echo "Update ... Success!</p>";
	} else {
		echo "<p>MySQL error no {$con->errno} : {$con->error}</p>";
		exit();
	}
	
}
?>

<script type="text/javascript">

function strain_form(str) {
    if (str.length == 0) { 
        document.getElementById("strain_form_txt").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("strain_form_txt").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "strain_form_search.php?q=" + str, true);
        xmlhttp.send();      
    }
}

function farm_form(str) {
    if (str.length == 0) { 
        document.getElementById("farm_form_txt").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("farm_form_txt").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "farm_form_search.php?q=" + str, true);
        xmlhttp.send();      
    }
}


</script>