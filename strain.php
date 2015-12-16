<?php include('inc_exec/header.php'); ?>
<body>
	<div class="container-fluid">
		<div class="container">
	    	<?php include('inc_exec/search-input.php'); ?>
	   		<?php include('inc_exec/content.php'); ?>
	    </div>
	</div>
</body>
<?php include('inc_exec/foot.php'); ?>

<script type="text/javascript">
$( document ).ready(function() {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("strain_txt").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "strain_this.php?q=" + 6, true);
        xmlhttp.send();      
});
</script>