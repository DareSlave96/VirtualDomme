<?php
	// Stop error messages
	error_reporting(E_ALL ^ E_NOTICE);
	
	function O18 (){
		// Check to see whether user is 18+
		if( !isset( $_COOKIE['18'] ) ){
			echo "	<script>
						window.location = '18+.php';
					</script>";
		}
	}
	
	// DB connection
	function DBCon (){
		return new PDO('sqlite:_DB.sqlite');
	}
	
	function GetMenu (){
		$menu = "	<a href='index.php'>Home</a>
					<a href='tasks.php'>Tasks</a><br>
					<a href='punishments.php'>Punishments</a><br>
					<a href='rewards.php'>Rewards</a><br>
					<a href='sessions.php'>Sessions</a><br>";
		if ( !isset( $_COOKIE['ID'] ) ){
			$menu = $menu."<a href='details.php'>Sign In / Up</a><br>";
		}
		return $menu;
	}
	function GetQuote (){
		// Returns a random quote from DB.
		$db = DBCon();
		$res = $db -> query('SELECT count(*) FROM `Quotes` WHERE 1'); 
		$max = $res -> fetchColumn();
		$quote = rand(1, $max);
		$qry = "SELECT * FROM `Quotes` WHERE `ID` = $quote";
		foreach ($db -> query( $qry ) as $row) {
			$quote = $row['Quote'];
			$auth =  $row['Author'];
		}		
		return $quote;
	}
	function GetPunPnt (){
		if ( isset( $_COOKIE['PP'] ) ){
			return $_COOKIE['PP'];
		}
		else {
			return "--|--";
		}
	}
	function GetRewPnt (){
		if ( isset( $_COOKIE['RP'] ) ){
			return $_COOKIE['RP'];
		}
		else {
			return "--|--";
		}
	}
	function GetTasPnt (){
		if ( isset( $_COOKIE['TP'] ) ){
			return $_COOKIE['TP'];
		}
		else {
			return "--|--";
		}
	}
	function GetNews (){
		// Fetches and returns the news.
		$news = "";
		$db = DBCon();
		$qry = "SELECT * FROM `News` ORDER BY `Date` DESC LIMIT 5";
		foreach ($db -> query( $qry ) as $row) {
			$news = $news."<b>".$row['Date']."</b><br>".$row['Story']."<br><br>";
		}
		return $news;
	}
	function Signin (){
		// Get variables
		$UN = $_POST['UN'];
		$PW = $_POST['PW'];
		// Get UN & PW from DB
		$db = DBCon();
		$st = $db -> prepare("SELECT * FROM `users` WHERE `UN` = :UN");
		$st -> bindparam( ':UN', $UN );
		$st -> execute();
		foreach ( $st as $row ) {
			$HashedPW =  $row['PW'];
		}
		$st = $db -> prepare("SELECT * FROM `Details` WHERE `UN` = :UN");
		$st -> bindparam( ':UN', $UN );
		$st -> execute();
		foreach ( $st as $row ){
			$RP = $row['RewPnt'];
			$PP = $row['PunPnt'];
			$TP = $row['TasPnt'];
		}
		if ( password_verify( $PW, $HashedPW ) ){
			// Correct PW
			setcookie( "ID", $UN, time()+3600 );
			setcookie( "TP", $TP, time()+3600 );
			setcookie( "PP", $PP, time()+3600 );
			setcookie( "RP", $TP, time()+3600 );
			echo "		<script>
							window.location = 'index.php';
						</script>";
		}
		else {
			// Incorrect PW
			echo password_verify( "123", $HashedPW );
		}
	}
	function Signup (){
		// Get variables
		$UN = $_POST['UN'];
		$PW1= $_POST['PW1'];
		$PW2= $_POST['PW1'];
		// Check whether UN taken
		$db = DBCon();
		$res = $db -> query("SELECT count(*) FROM `Users` WHERE `UN` = '$UN'"); 
		$count = $res -> fetchColumn();
		if ( $count == 0 ) {
			// UN not taken
			if ( $PW1 === $PW2 ){
				// Passwords match
				// Encrypt password
				$PW = password_hash ( $PW1, PASSWORD_DEFAULT );
				// Insert into DB
				$st = $db -> prepare("INSERT INTO `Users` ( `UN`, `PW` ) VALUES ( :UN, :PW )" );
				$st -> bindparam( ':UN', $UN );
				$st -> bindparam( ':PW', $PW );
				$st -> execute();
				$st = $db -> prepare("INSERT INTO `Details` ( `UN` ) VALUES ( :UN )");
				$st -> bindparam ( ':UN', $UN );
				$st -> execute();
			}
			else {
				// Passwords don't match
				echo "Passwords do not match";
			}
		}
		else {
			// UN taken
			echo "That username has been taken, please choose another";
		}
	}
	function GetPun (){
		// Returns a random punishment from DB.
		$db = DBCon();
		$res = $db -> query("SELECT count(*) FROM `Punishments` WHERE 1"); 
		$max = $res -> fetchColumn();
		$ID = rand(1, $max);
		$qry = "SELECT * FROM `Punishments` WHERE `ID` = $ID";
		foreach ($db -> query( $qry ) as $row) {
			$punishment = $row['Pun'];
			$auth =  $row['Author'];
			$points = $row['Points'];
		}		
		echo "	$punishment <br>
				<b> $auth </b><br>
				<span class='big'> $points </span><br>";
	}
	function GetRew (){
		// Returns a random punishment from DB.
		$db = DBCon();
		$res = $db -> query('SELECT count(*) FROM `Rewards` WHERE 1'); 
		$max = $res -> fetchColumn();
		$ID = rand(1, $max);
		$qry = "SELECT * FROM `Rewards` WHERE `ID` = $ID";
		foreach ($db -> query( $qry ) as $row) {
			$reward = $row['Rew'];
			$auth =  $row['Author'];
			$points = $row['Points'];
		}		
		echo "	$reward <br>
				<b> $auth </b><br>
				<span class='big'> $points </span><br>";
	}
	function GetTas (){
		// Returns a random punishment from DB.
		$db = DBCon();
		$res = $db -> query('SELECT count(*) FROM `Tasks` WHERE 1'); 
		$max = $res -> fetchColumn();
		$ID = rand(1, $max);
		$qry = "SELECT * FROM `Tasks` WHERE `ID` = $ID";
		foreach ($db -> query( $qry ) as $row) {
			$task = $row['Tas'];
			$auth =  $row['Author'];
			$points = $row['Points'];
		}		
		echo "	$task <br>
				<b> $auth </b><br>
				<span class='big'> $points </span><br>";
	}
	function GetSes (){
		$sessions = [ 	'base.html',
						'advance.html' ];
		$ses = rand( 0, sizeof( $sessions ) - 1 );
		echo file_get_contents ( "res/ses/".$sessions[ $ses ] );
	}