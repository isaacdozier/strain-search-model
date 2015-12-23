<?php include('inc/head.html'); ?>

<body>
	<div class="container-fluid">
		<div class="container">

			<!-- Admin options -->
			<?php include('admin/panel.html'); ?>
			<?php include('admin/gen_opt.html'); ?>

			<!-- (admin/lot_opt) located at build/blocks/s_view.php -->
			<?php //include('admin/lot_opt.html'); ?>

			<!-- inc blocks -->
	    	<?php include('inc/header.html'); ?>
	    	<?php include('inc/query.html'); ?>
	   		<?php include('inc/content.html'); ?>

	    </div>
	</div>
</body>

<?php include('inc/foot.html'); ?>