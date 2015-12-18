<!-- IN DEV -->
<!-- IN DEV -->
<?php include('inc/header.html'); ?>
<body>
	<div class="container-fluid">
		<div class="container">
	    	<?php include('inc/search-input.html'); ?>
	   		<?php include('inc/content.html'); ?>
	    </div>
	</div>
</body>
<?php include('inc/foot.html'); ?>
<!-- IN DEV -->
<!-- IN DEV -->
<!-- IN DEV -->
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
<!-- IN DEV -->
<!-- IN DEV -->