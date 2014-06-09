<?php
	include_once('_func.php');	
	O18();
?>

<!-- This just declares HTML5, I think ;)
re: yep, just messes up css atm, so ill leave it commented out for now :)
-->

<!-- <!DOCTYPE html> -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="res/style.css">
		<title>
			Home - Virtual Dom(me)
		</title>
		
		<script type="text/javascript" src="/js/jquery.js"></script>
		<script type="text/javascript" src="/js/jquery_setup.js"></script>
	        <script type="text/javascript" src="/js/pages.js"></script>
	        <script type="text/javascript" src="/js/main.js"></script>
	        <script type="text/javascript" src="js/jquery_ui.js"></script>
	        <link rel="stylesheet" type="text/css" href="/css/jquery_ui.css">
	        <link rel="stylesheet" type="text/css" href="/css/main.css">
			
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
