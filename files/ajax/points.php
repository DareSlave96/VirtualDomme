<?php
	include_once('../_func.php');	
	O18();


$type = $_GET['type'];

if($type == 'pun'){	

	if ( $_GET['ID'] ){
		punishment::addPnt ( $_GET['ID'], $_GET['comp'] );
		echo '<b>Punishments</b><br>'.punishment::points();
	}	
	echo '<script type="text/javascript">loadpage("#punishments");</script>';

}else if($type == 'rew'){
	
	if ( $_GET['ID'] ){
		reward::addPnt ( $_GET['ID'], $_GET['comp'] );
		echo '<b>Rewards</b><br>'.reward::points();
	}	
	echo '<script type="text/javascript">loadpage("#rewards");</script>';
	
}else if($type == 'tas'){
	
	if ( $_GET['ID'] ){
		task::addPnt ( $_GET['ID'], $_GET['comp'] );
		echo '<b>Tasks</b><br>'.task::points();
	}
	echo '<script type="text/javascript">loadpage("#tasks");</script>';
}


?>
