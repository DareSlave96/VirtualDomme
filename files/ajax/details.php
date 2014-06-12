<?php
/*
RETURN:
	OK|OK_MESSAGE
	KO|ERROR_MESSAGE
	
	RELOAD|not used or worked on yet... (for reloading pages of divs)
	REDIRECT|not made jet... (might be usefull)
*/

$phptarget = $_POST['phptarget'];

if($phptarget == 'signin'){	
	echo 'KO|Sign in =>';
	print_r($_POST);
	
}else if($phptarget == 'signup'){
	echo 'KO|Sign up =>';
	print_r($_POST);
}
?>
