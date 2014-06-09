<?php
	include_once('_func.php');	
	O18();
?>

<!-- this doctype screws up the layout.. but it needs a doctype
css works correctly under html 2.0 and 3.2 but this is not the right doctype to use (due to limmitations and that its outdated)
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">

When i have a little more time i will make a new layout for the VM, with java sliders and a cool menu.
(will put this in a seperate file so you can keep working on this one till the other on is finished.. and then 
if you want we can replace it)
-->

<!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="res/style.css">
		<title>
			Home - Virtual Dom(me)
		</title>
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="main_ajax.js"></script>
	</head>
	<body>
		<div id="head">
			<h1>Virtual Dom(me)</h1>
		</div>
		<div id="menu">
			<b><u>Menu</u></b><br>
			<?php echo GetMenu(); ?>
		</div>
		<div id="head2">
			<div id="Pun"><b>Punishments</b><br><?php echo punishment::points(); ?></div>
			<div id="Rew"><b>Rewards</b><br><?php echo reward::points(); ?></div>
			<div id="Tas"><b>Tasks</b><br><?php echo task::points(); ?></div>
			<div id="Quote"><span class="qte">"</span><?php echo quote::fetch(); ?><span class="qte">"</span><br></div>
		</div>
		<div id="body">
			<h4>News</h4>
			<?php echo news::get(); ?>
		</div>
	</body>
</html>
