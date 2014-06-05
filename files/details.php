<?php
	include_once('_func.php');	
	O18();
	$do = $_GET['do'];
	if ( $do === "su" ) {
		Signup();
	}
	else if ( $do === "si" ) {
		Signin();
	}
	else if ( $do === "lo" ) {
		Logout();
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="res/style.css">
		<title>
			Sign In - Virtual Dom(me)
		</title>
	</head>
	<style>
		div#body{
			height: 270px;
		}
		div#si {
			background-color: black;
			width: 400px;
			position: absolute;
			top: 10px;
			margin-left: 10px;
			color: white;
			height: 200px;
		}
		div#su {
			background-color: black;
			width: 400px;
			position: absolute;
			top: 10px;
			margin-left: 450px;
			color: white;
			height: 250px;
		}
		div#fpass {
			background-color: black;
			width: 400px;
			position: absolute;
			top: 240px;
			margin-left: 10px;
			color: white;
			height: 20px;
		}
	</style>
	<body>
		<div id="head">
			<h1>Virtual Dom(me)</h1>
		</div>
		<div id="menu">
			<b><u>Menu</u></b><br>
			<?php echo GetMenu(); ?>
		</div>
		<div id="head2">
			<div id="Pun"><b>Punishments</b><br><?php echo punihsment::points(); ?></div>
			<div id="Rew"><b>Rewards</b><br><?php echo reward::points(); ?></div>
			<div id="Tas"><b>Tasks</b><br><?php echo task::points(); ?></div>
			<div id="Quote"><span class="qte">"</span><?php echo quote::fetch(); ?><span class="qte">"</span><br></div>
		</div>
		<div id="body">
			<div id="si">
				<b>Sign In!</b><br>
				<br>
				<form action="details.php?do=si" method="post">
					Username: <br>
					<input name="UN"><br>
					Password: <br>
					<input name="PW" type="password"><br>
					<input type="submit">
				</form>
			</div>
			<div id="su">
				<b>Sign Up!</b><br>
				<br>
				<form action="details.php?do=su" method="post">
					Username: <br>
					<input name="UN"><br>
					Password: <br>
					<input name="PW1" type="password"><br>
					Password again: <br>
					<input name="PW1" type="password"><br>
					<input type="submit">
				</form>
			</div>
			<div id="fpass">
				
			</div>
		</div>
		
	</body>
</html>