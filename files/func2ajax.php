<?php
/* FUNC2AJAX
this is a demo/example page that gets _func functions and outputs them for ajax get requests
*/

require_once 'validation.php';
$validation = new validation();

// GET FID
if(!isset($_GET['fid']) || !$validation->text($_GET['fid'])){
	echo 'Error fid missing'; exit;	
}else{$fid = $_GET['fid'];}

// FID to lowercase
$fid = strtolower($fid);

// INCLUDE _FUNC.PHP
require_once('_func.php');

// QUOTE
if($fid == 'quote'){
	echo quote::fetch();

// PUN
}else if($fid == 'pun'){
	echo punishment::points();

// REW
}else if($fid == 'rew'){
	echo reward::points(); 
	
// TAS
}else if($fid == 'tas'){
	echo task::points();
	
// NEWS
}else if($fid == 'news'){
	 echo news::get();
	
}else{echo 'Error invalid fix';}
?>
