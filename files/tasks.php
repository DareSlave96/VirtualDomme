<?php
	include_once('_func.php');	
	O18();
	
	if ( $_GET['ID'] ){
		addPointsTas ( $_GET['ID'], $_GET['comp'] );
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="res/style.css">
		<title>
			Tasks - Virtual Dom(me)
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
			<div id="Pun"><b>Punishments</b><br><?php echo GetPunPnt(); ?></div>
			<div id="Rew"><b>Rewards</b><br><?php echo GetRewPnt(); ?></div>
			<div id="Tas"><b>Tasks</b><br><?php echo GetTasPnt(); ?></div>
			<div id="Quote"><span class="qte">"</span><?php echo GetQuote(); ?><span class="qte">"</span><br></div>
		</div>
		<div id="body">
			<h4>Tasks</h4>
			<?php echo GetTas(); ?>
		</div>
	</body>
</html>