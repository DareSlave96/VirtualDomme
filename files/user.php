
<?php
	include_once('_func.php');	
	O18();
	
	$do = $_GET['do'];
	if ( $do == "limits" ){
		// Set limits
		echo user::limits(); //return error or OK message
	}
	else if ( $do == "items" ){
		// Set items
	}
	else if ( $do == "dom" ){
		// Set dominants personality
	}
	else if ( $do == "delete" ){
		// Delete account
	}
	else if ( $do == "PW" ){
		// Change the users password
	}
?>
<html>
	
	<head>
		<link rel="stylesheet" type="text/css" href="res/style.css">
		<title>
			Account Management - Virtual Dom(me)
		</title>
		<script type="text/javascript" src="assets/js/jquery.js"></script>
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
			<a id="Limits">&#x25BC; Limits &#x25BC;</a><br>
			<div id="Lmt" align="center">
				<form action="user.php?do=limits" method="post">
					<table>
						<tr>
							<td class="Action">
								<u>Action</u>
							</td>
							<td class="Limit">
								<u>Limit</u>
							</td>
							<td class="Dislike">
								<u>Dislike</u>
							</td>
							<td class="Like">
								<u>Like</u>
							</td>
						</tr>
						<tr>
							<td class="Action">
								Anal
							</td>
							<td class="Limit">
								<input type="radio" name="Anal" value=1>
							</td>
							<td class="Dislike">
								<input type="radio" name="Anal" value=2>
							</td>
							<td class="Like">
								<input type="radio" name="Anal" value=3>
							</td>
						</tr>
						<tr>
							<td class="Action">
								Piss
							</td>
							<td class="Limit">
								<input type="radio" name="Piss" value=1>
							</td>
							<td class="Dislike">
								<input type="radio" name="Piss" value=2>
							</td>
							<td class="Like">
								<input type="radio" name="Piss" value=3>
							</td>
						</tr>
						<tr>
							<td class="Action">
								Scat
							</td>
							<td class="Limit">
								<input type="radio" name="Scat" value=1>
							</td>
							<td class="Dislike">
								<input type="radio" name="Scat" value=2>
							</td>
							<td class="Like">
								<input type="radio" name="Scat" value=3>
							</td>
						</tr>
						<tr>
							<td class="Action">
								Blood
							</td>
							<td class="Limit">
								<input type="radio" name="Blood" value=1>
							</td>
							<td class="Dislike">
								<input type="radio" name="Blood" value=2>
							</td>
							<td class="Like">
								<input type="radio" name="Blood" value=3>
							</td>
						</tr>
						<tr>
							<td class="Action">
								Obvious public
							</td>
							<td class="Limit">
								<input type="radio" name="oPub" value=1>
							</td>
							<td class="Dislike">
								<input type="radio" name="oPub" value=2>
							</td>
							<td class="Like">
								<input type="radio" name="oPub" value=3>
							</td>
						</tr>
						<tr>
							<td class="Action">
								Hidden Public
							</td>
							<td class="Limit">
								<input type="radio" name="hPub" value=1>
							</td>
							<td class="Dislike">
								<input type="radio" name="hPub" value=2>
							</td>
							<td class="Like">
								<input type="radio" name="hPub" value=3>
							</td>
						</tr>
						<tr>
							<td class="Action">
								Humiliation
							</td>
							<td class="Limit">
								<input type="radio" name="Humil" value=1>
							</td>
							<td class="Dislike">
								<input type="radio" name="Humil" value=2>
							</td>
							<td class="Like">
								<input type="radio" name="Humil" value=3>
							</td>
						</tr>
						<tr>
							<td class="Action">
								Chastity
							</td>
							<td class="Limit">
								<input type="radio" name="Chast" value=1>
							</td>
							<td class="Dislike">
								<input type="radio" name="Chast" value=2>
							</td>
							<td class="Like">
								<input type="radio" name="Chast" value=3>
							</td>
						</tr>
						<tr>
							<td class="Action">
								Cum Eating
							</td>
							<td class="Limit">
								<input type="radio" name="cEat" value=1>
							</td>
							<td class="Dislike">
								<input type="radio" name="cEat" value=2>
							</td>
							<td class="Like">
								<input type="radio" name="cEat" value=3>
							</td>
						</tr>
						<tr>
							<td class="Action">
								Feminisation
							</td>
							<td class="Limit">
								<input type="radio" name="Fem" value=1>
							</td>
							<td class="Dislike">
								<input type="radio" name="Fem" value=2>
							</td>
							<td class="Like">
								<input type="radio" name="Fem" value=3>
							</td>
						</tr>
						<tr>
							<td class="Action">
								Crossdressing
							</td>
							<td class="Limit">
								<input type="radio" name="xDress" value=1>
							</td>
							<td class="Dislike">
								<input type="radio" name="xDress" value=2>
							</td>
							<td class="Like">
								<input type="radio" name="xDress" value=3>
							</td>
						</tr>
						<tr>
							<td class="Action">
								Post Orgasm Torment
							</td>
							<td class="Limit">
								<input type="radio" name="POT" value=1>
							</td>
							<td class="Dislike">
								<input type="radio" name="POT" value=2>
							</td>
							<td class="Like">
								<input type="radio" name="POT" value=3>
							</td>
						</tr>
					</table>
					<input type="submit">
				</form>
			</div>
			<a id="Items">&#x25BC; Items &#x25BC;</a><br>
			<div id="Itm" align="center">
				<form action="user.php?do=items" method="post">
					<table>
						<tr>
							<td class="Item">
								<u>Item</u>
							</td>
							<td class="Have">
								<u>I have this item</u>
							</td>
							<td class="NotGot">
								<u>I haven't got this item</u>
							</td>
						</tr>
						<tr>
							<td class="Item">
								<b>Anal</b>
							</td>
							<td class="Have">
							</td>
							<td class="NotGot">
							</td>
						</tr>
						<tr>
							<td class="Item">
								Inflatable butt plug
							</td>
							<td class="Have">
								<input type="radio" name="IBP" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="IBP" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Small butt plug
							</td>
							<td class="Have">
								<input type="radio" name="SBP" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="SBP" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Medium butt plug
							</td>
							<td class="Have">
								<input type="radio" name="MBP" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="MBP" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Large butt plug
							</td>
							<td class="Have">
								<input type="radio" name="LBP" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="LBP" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Anal beads
							</td>
							<td class="Have">
								<input type="radio" name="AB" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="AB" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Douche/enema kit
							</td>
							<td class="Have">
								<input type="radio" name="Enema" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="Enema" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								<b>Vaginal/Anal</b>
							</td>
							<td class="Have">
							</td>
							<td class="NotGot">
							</td>
						</tr>
						<tr>
							<td class="Item">
								Thin/small dildo
							</td>
							<td class="Have">
								<input type="radio" name="SDil" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="SDil" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Medium dildo
							</td>
							<td class="Have">
								<input type="radio" name="MDil" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="MDil" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Large dildo
							</td>
							<td class="Have">
								<input type="radio" name="LDil" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="LDil" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								<b>Clamps</b>
							</td>
							<td class="Have">
							</td>
							<td class="NotGot">
							</td>
						</tr>
						<tr>
							<td class="Item">
								Clothes pegs/pins
							</td>
							<td class="Have">
								<input type="radio" name="Peg" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="Peg" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Tweezer clamps
							</td>
							<td class="Have">
								<input type="radio" name="Tweez" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="Tweez" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Clover clamps
							</td>
							<td class="Have">
								<input type="radio" name="Clover" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="Clover" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								<b>Gags</b>
							</td>
							<td class="Have">
							</td>
							<td class="NotGot">
							</td>
						</tr>
						<tr>
							<td class="Item">
								Ball gag
							</td>
							<td class="Have">
								<input type="radio" name="BallG" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="BallG" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Bit gag
							</td>
							<td class="Have">
								<input type="radio" name="BitG" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="BitG" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Butterfly gag
							</td>
							<td class="Have">
								<input type="radio" name="BttG" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="BttG" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Inflatable gag
							</td>
							<td class="Have">
								<input type="radio" name="InfG" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="InfG" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Pecker gag
							</td>
							<td class="Have">
								<input type="radio" name="PeckG" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="PeckG" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								<b>Chastity</b>
							</td>
							<td class="Have">
							</td>
							<td class="NotGot">
							</td>
						</tr>
						<tr>
							<td class="Item">
								Chastity belt
							</td>
							<td class="Have">
								<input type="radio" name="CBelt" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="CBelt" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Chastity bra
							</td>
							<td class="Have">
								<input type="radio" name="CBra" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="CBra" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Thigh cuffs
							</td>
							<td class="Have">
								<input type="radio" name="CThigh" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="CThigh" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								<b>Bondage</b>
							</td>
							<td class="Have">
							</td>
							<td class="NotGot">
							</td>
						</tr>
						<tr>
							<td class="Item">
								Rope
							</td>
							<td class="Have">
								<input type="radio" name="Rope" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="Rope" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Wrist cuffs
							</td>
							<td class="Have">
								<input type="radio" name="WCuffs" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="WCuffs" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Ankle cuffs
							</td>
							<td class="Have">
								<input type="radio" name="ACuffs" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="ACuffs" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Collar
							</td>
							<td class="Have">
								<input type="radio" name="Collar" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="Collar" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Arm binder
							</td>
							<td class="Have">
								<input type="radio" name="ABind" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="ABind" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Blindfold
							</td>
							<td class="Have">
								<input type="radio" name="BFold" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="BFold" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								<b>Spanking</b>
							</td>
							<td class="Have">
							</td>
							<td class="NotGot">
							</td>
						</tr>
						<tr>
							<td class="Item">
								Paddle
							</td>
							<td class="Have">
								<input type="radio" name="Paddle" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="Paddle" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Wooden spoon
							</td>
							<td class="Have">
								<input type="radio" name="WSpoon" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="WSpoon" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Whip
							</td>
							<td class="Have">
								<input type="radio" name="Whip" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="Whip" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Belt
							</td>
							<td class="Have">
								<input type="radio" name="Belt" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="Belt" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								<b>Clothes (Male)</b>
							</td>
							<td class="Have">
							</td>
							<td class="NotGot">
							</td>
						</tr>
						<tr>
							<td class="Item">
								Boxers
							</td>
							<td class="Have">
								<input type="radio" name="MBoxers" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="MBoxers" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Briefs
							</td>
							<td class="Have">
								<input type="radio" name="MBriefs" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="MBriefs" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Thong
							</td>
							<td class="Have">
								<input type="radio" name="MThong" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="MThong" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Shirt
							</td>
							<td class="Have">
								<input type="radio" name="MShirt" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="MShirt" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Trousers
							</td>
							<td class="Have">
								<input type="radio" name="MTrousers" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="MTrousers" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Shorts
							</td>
							<td class="Have">
								<input type="radio" name="MShorts" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="MShorts" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								<b>Clothes (Female)</b>
							</td>
							<td class="Have">
							</td>
							<td class="NotGot">
							</td>
						</tr>
						<tr>
							<td class="Item">
								Panties
							</td>
							<td class="Have">
								<input type="radio" name="FPanties" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="FPanties" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Thong
							</td>
							<td class="Have">
								<input type="radio" name="FThong" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="FThong" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Boxers
							</td>
							<td class="Have">
								<input type="radio" name="FBoxers" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="FBoxers" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Blouse
							</td>
							<td class="Have">
								<input type="radio" name="FBlouse" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="FBlouse" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Skirt
							</td>
							<td class="Have">
								<input type="radio" name="FSkirt" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="FSkirt" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Dress
							</td>
							<td class="Have">
								<input type="radio" name="FDress" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="FDress" value=1>
							</td>
						</tr>
						<tr>
							<td class="Item">
								Tights/stockings
							</td>
							<td class="Have">
								<input type="radio" name="FTights" value=0>
							</td>
							<td class="NotGot">
								<input type="radio" name="FTights" value=1>
							</td>
						</tr>
					</table>
					<input type="submit">
				</form>
			</div>
			<a id="Domme">&#x25BC; Dom(me) characteristics &#x25BC;</a><br>
			<div id="Dom" align="center">
				<form action="user.php?do=dom" method="post">
					Customise your dominant! <br><br>
					
					Name <br>
					<input name="name"> <br><br>
					
					Sex <br>
					Male <input type="radio" name="gender" value="M">
					Female <input type="radio" name="gender" value="F"> <br><br>
					
					DOB <br>
					*Some input here* <br><br>
					
					Personality
					Strict <input type="radio" name="persona" value=3>
					OK <input type="radio" name="persona" value=2>
					Lenient <input type="radio" name="persona" value=1> <br> <br>
					
					Impulsiveness <br>
					Extremely <input type="radio" name="Impulsive" value="4">
					Very <input type="radio" name="Impulsive" value=3>
					Sort of <input type="radio" name="Impulsive" value=2>
					Not at all <input type="radio" name="Impulsive" value=1> <br> <br>
					
					<input type="submit">
				</form>
			</div>
			<a id="Account">&#x25BC; Account management &#x25BC;</a><br>
			<div id="Act" align="center">
				<a href="user.php?do=delete"> Delete account </a> <br> <br>
				Change password <br>
				<form action="user.php?do=PW" action="post">
					Previous password: <br>
					<input type="password" name="OPW"> <br>
					New password: <br>
					<input type="password" name="PW1"> <br>
					New password again: <br>
					<input type="password" name="PW2"> <br>
				</form>
			</div>
		</div>
		<script>
			$('#Lmt').hide();
			$('#Itm').hide();
			$('#Dom').hide();
			$('#Act').hide();
			
			$("#Limits").click(function(){
			  $("#Lmt").toggle(500);
			  return false; // prevent default link behavior
			});
			$("#Items").click(function(){
			  $("#Itm").toggle(500);
			  return false;
			});
			$("#Domme").click(function(){
			  $("#Dom").toggle(500);
			  return false;
			});
			$("#Account").click(function(){
			  $("#Act").toggle(500);
			  return false;
			});
		</script>
	</body>
</html>
