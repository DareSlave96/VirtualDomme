<?php
	include_once('_func.php');	
	O18();
	
	if ( $_GET['ID'] ){
		punishment::addPnt ( $_GET['ID'], $_GET['Comp'] );
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="res/style.css">
		<title>
			Punishments - Virtual Dom(me)
		</title>
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
			<h4>Punishments</h4>
			<?php echo punishment::random(); ?>
		</div>
	</body>
</html>