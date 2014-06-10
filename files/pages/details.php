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

<!--
Some stuff i need to write down while its still in my head

<span id="loading_sipost" style="margin-right:10px; display:none"><img src="img/loading.gif" width="30" height="30" style="vertical-align:middle;" /></span>
<span id="saved_sipost" style="margin-right:10px; display:none"></span>
              
<form name="si" action="" id="si" accept-charset="utf-8" method="post" enctype="multipart/form-data">

<input type="hidden" name="target" value="details">

<input type="submit" name="sipost" alt="signin" class="savebutton" value="Save" />
-->

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
		
