

<div class="container">
	<h2>Would you like to add an image?</h2>
	<form action="" method="POST" enctype="multipart/form-data">
    	<input type="hidden" name="lot_id" value="<?php echo $con->insert_id; ?>"/>
    	<input type="file" name="image" /><input type="submit"/>
	</form>
</div>	
				