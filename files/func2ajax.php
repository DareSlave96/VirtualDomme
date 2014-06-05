<?php
/* FUNC2AJAX
this is a demo/example page that gets _func functions and outputs them for ajax get requests
*/

// GET FID (function ID)
if(!isset($_GET['fid']) || !is_numeric($_GET['fid'])){
	echo 'Error folder id missing'; exit;	
}else{$fid = $_GET['fid'];}

// INCLUDE _FUNC.PHP
require_once('_func.php');


if($fid == "1"){
  echo quote::fetch();
}
?>
