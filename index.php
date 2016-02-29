<?php include('inc/head.html'); ?>


<input id="query"
	   type="hidden" 
	   value="<?=isset($_REQUEST['q'])?$_REQUEST['q']:''?>"/>

<input id="strain"
	   type="hidden" 
	   value="<?=isset($_REQUEST['strain'])?$_REQUEST['strain']:''?>"/>

<input id="lot"
	   type="hidden" 
	   value="<?=isset($_REQUEST['lot'])?$_REQUEST['lot']:''?>"/>

<input id="farm"
	   type="hidden" 
	   value="<?=isset($_REQUEST['farm'])?$_REQUEST['farm']:''?>"/>

<input id="shi"
	   type="hidden" 
	   value="<?=isset($_REQUEST['shi'])?$_REQUEST['shi']:''?>"/>

<input id="custom_q"
	   type="hidden" 
	   value="<?=isset($_REQUEST['custom_q'])?$_REQUEST['custom_q']:''?>"/>

<body>
	<div class="container-fluid container">

			<!-- inc blocks -->
	    	<?php include('inc/header.html'); ?>
    		
	   		<?php include('inc/content.html'); ?>

	   		<?php include('inc/footer.html'); ?>

	</div>
</body>

<?php include('inc/foot.html'); ?>