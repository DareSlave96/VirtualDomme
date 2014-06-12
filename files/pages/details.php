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
				<form name="si" action="" id="si" accept-charset="utf-8" method="post" enctype="multipart/form-data">
                			<input type="hidden" name="target" value="details">
					Username: <br>
					<input name="UN"><br>
					Password: <br>
					<input name="PW" type="password"><br>
                    		<input type="submit" name="sipost" alt="signin" class="savebutton" value="Sign in" />
				</form>
			</div>
            		<span id="loading_sipost" style="margin-right:10px; display:none"><img src="img/loading.gif" width="30" height="30" style="vertical-align:middle;" /></span>
			<span id="saved_sipost" style="margin-right:10px; display:none"></span>
            
            
			<div id="su">
				<b>Sign Up!</b><br>
				<br>
				<form name="su" action="" id="su" accept-charset="utf-8" method="post" enctype="multipart/form-data">
                			<input type="hidden" name="target" value="details">
					Username: <br>
					<input name="UN"><br>
					Password: <br>
					<input name="PW1" type="password"><br>
					Password again: <br>
					<input name="PW1" type="password"><br>
					<input type="submit" name="supost" alt="signup" class="savebutton" value="Sign ip" />
				</form>
			</div>
            		<span id="loading_supost" style="margin-right:10px; display:none"><img src="img/loading.gif" width="30" height="30" style="vertical-align:middle;" /></span>
			<span id="saved_supost" style="margin-right:10px; display:none"></span>
            
			<div id="fpass">
				
			</div>
		
