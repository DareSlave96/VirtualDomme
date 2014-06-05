<?php
	include_once('_func.php');	
	O18();
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="res/style.css">
		<title>
			Sessions - Virtual Dom(me)
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
			<h4>Sessions</h4>
			This section of the site will be up and running soon, please be patient and try out some of the other sections.
		</div>
	</body>
</html>