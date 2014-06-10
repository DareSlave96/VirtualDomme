<?php
	include_once('../_func.php');	
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
		
