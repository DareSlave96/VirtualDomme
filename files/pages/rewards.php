<?php
	include_once('../_func.php');	
	O18();
	
	if ( $_GET['ID'] ){
		reward::addPnt ( $_GET['ID'], $_GET['comp'] );
	}
?>

			<h4>Rewards</h4>
			<?php echo reward::random(); ?>
