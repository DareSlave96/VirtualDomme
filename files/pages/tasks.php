<?php
	include_once('../_func.php');	
	O18();
	
	if ( $_GET['ID'] ){
		task::addPnt ( $_GET['ID'], $_GET['comp'] );
	}
?>

			<h4>Tasks</h4>
			<?php echo task::random(); ?>
