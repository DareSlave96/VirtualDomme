<?php
	include_once('../_func.php');	
	O18();
	
	if ( $_GET['ID'] ){
		punishment::addPnt ( $_GET['ID'], $_GET['Comp'] );
	}
?>

			<h4>Punishments</h4>
			<?php echo punishment::random(); ?>
