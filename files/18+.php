<?php
	include_once('_func.php');	
	$do = $_GET['do'];
	if ( $do === "agree" ){
		setcookie ( "18", " ", time() + 60*60*24*14 ); // 14 Day cookie
		header('Location: index.php');
	}
?>
<html>
	<style>
		button {
			width: 150px;
			height: 25px;
		}
	</style>
	<head>
		<link rel="stylesheet" type="text/css" href="res/style.css">
		<title>
			18+ - Virtual Dom(me)
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
			<h4>Are you over 18? (or 21?)</h4>
			Please be aware that by using this site you agree that you are of legal age to do so and that the creators of this site cannot be held responsible for any damaging materials found within. You have been warned!<br>
			<br>
			<form method="post" action="18+.php?do=agree"><button type="submit">I agree, enter</button></form><form action="http://google.com"><button type="submit">Get me out of here</button></form>
		</div>
	</body>
</html>