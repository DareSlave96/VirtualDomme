<?php
	error_reporting(E_ALL ^ E_NOTICE);													// Stop error messages
	
	if ( isset( $_COOKIE['ID'] ) && $_GET['do'] != "lo" ){														// Renew cookies on each page visit
		setcookie( "ID", $_COOKIE['ID'], time() + 3600 );
		setcookie( "PP", $_COOKIE['PP'], time() + 3600 );
		setcookie( "RP", $_COOKIE['RP'], time() + 3600 );
		setcookie( "TP", $_COOKIE['TP'], time() + 3600 );
	}
	
	function O18 (){
		// Check to see whether user is 18+
		if( !isset( $_COOKIE['18'] ) ){
			header("Location: 18+.php");
		}
	}
	
	function DBCon (){																	// DB connection
		return new PDO('sqlite:_DB.sqlite');
	}
	
	function GetMenu (){
		$menu = "	<a href='index.php'>Home</a>
					<a href='tasks.php'>Tasks</a><br>
					<a href='punishments.php'>Punishments</a><br>
					<a href='rewards.php'>Rewards</a><br>
					<a href='sessions.php'>Sessions</a><br>";
		if ( !isset( $_COOKIE['ID'] ) ){												// If user hasn't logged in add the link
			$menu = $menu."<a href='details.php'>Sign In / Up</a><br>";
		}
		else {
			$menu = $menu."<a href='details.php?do=lo'>Log out</a>";
		}
		return $menu;
	}
	function Signin (){
		// Get variables
		$UN = $_POST['UN'];																// Get posted username
		$PW = $_POST['PW'];																// Get posted password
		// Get UN & PW from DB
		$db = DBCon();
		$st = $db -> prepare("SELECT * FROM `users` WHERE `UN` = :UN");
		$st -> bindparam( ':UN', $UN );
		$st -> execute();
		foreach ( $st as $row ) {
			$HashedPW =  $row['PW'];													// Get hashed PW from the database
		}
		$st = $db -> prepare("SELECT * FROM `Details` WHERE `UN` = :UN");
		$st -> bindparam( ':UN', $UN );
		$st -> execute();
		foreach ( $st as $row ){
			$RP = $row['RewPnt'];														// Get reward points from database
			$PP = $row['PunPnt'];														// Get punishment points from database
			$TP = $row['TasPnt'];														// Get task points from database
		}
		if ( password_verify( $PW, $HashedPW ) ){										// Verify password
			// Correct PW
			setcookie( "ID", $UN, time()+3600 );										// Save cookies with details
			setcookie( "TP", $TP, time()+3600 );
			setcookie( "PP", $PP, time()+3600 );
			setcookie( "RP", $TP, time()+3600 );
			header("Location: index.php");
		}
		else {																			// Incorrect PW
			echo "Incorrect password";
		}
	}
	function Signup (){
		// Get variables
		$UN = $_POST['UN'];																// Cache posted variables
		$PW1= $_POST['PW1'];
		$PW2= $_POST['PW1'];
		$db = DBCon();
		$res = $db -> query("SELECT count(*) FROM `Users` WHERE `UN` = '$UN'"); 
		$count = $res -> fetchColumn();													// Count number of times UN occurs
		if ( $count == 0 ) {															// UN not taken
			if ( $PW1 === $PW2 ){														// Passwords match
				$PW = password_hash ( $PW1, PASSWORD_DEFAULT );							// Hash PW
				$st = $db -> prepare("INSERT INTO `Users` ( `UN`, `PW` ) VALUES ( :UN, :PW )" );		// Insert into database
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
	function Logout (){
		setcookie( "ID", $_COOKIE['ID'], time() - 3600 );
		setcookie( "PP", $_COOKIE['PP'], time() - 3600 );
		setcookie( "RP", $_COOKIE['RP'], time() - 3600 );
		setcookie( "TP", $_COOKIE['TP'], time() - 3600 );
		header('Location: index.php');
	}
	
	
	/************************************************************************************
	 *																					*
	 *	These are the classes, I will be transitioning to these from the classes		*
	 *	above.																			*
	 *																					*
	 ************************************************************************************/
	
	// User stuff.
	class user {
		// Change password
		public static function PW (){
			
		}
		// Reset points
		public static function reset (){
		
		}
		// Delete acount
		public static function delete (){
		
		}
		// Add/change email
		public static function email (){
		
		}
		// Add/change name
		public static function name (){
		
		}
		// Change limits
		public static function limits (){
		
		}
	}
	// Punishment stuff
	class punishment {
		// Get points
		public static function points (){
			if ( isset( $_COOKIE['PP'] ) ){
				return $_COOKIE['PP'];
			}
			else {
				return "--|--";
			}
		}
		// Add points
		public static function addPnt ( $pun, $complete ){
			$db = DBCon();
			$st = $db -> prepare("SELECT * FROM `Punishments` WHERE `ID` = :ID ");
			$st -> bindparam( ':ID', $pun );
			$st -> execute();
			foreach ( $st as $row ) {														// Get the number of points for the punishment
				$pnts = $row['Points'];
			}
			if ( $complete ==  1 ) {														// If punishment not completed (false)
				$pnts = $pnts - ( 3 * $pnts );												// Twice the number of points will be added instead of taken away 
			}
			$st = $db -> prepare("UPDATE `Details` SET `PunPnt` = `PunPnt` - :point WHERE UN = :ID" );
			$st -> bindparam( ':point', $pnts );
			$st -> bindparam( ':ID', $_COOKIE['ID']);
			$st -> execute();
			setcookie( 'PP', $_COOKIE['PP'] - $pnts, time()+3600 );
			header('Location: punishments.php');
		}
		// Get random punishment
		public static function random (){
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
					<span class='big'> $points </span><br>
					<a href='punishments.php?ID=$ID&comp=0'>Done</a> | <a href='punishments.php?ID=$ID&Comp=1'>Failed</a><br>";
		}
		// Get punishment based on points (Not used)
		public static function fetch (){
		
		}
		// Add a punishment (Not used)
		public static function add (){
		
		}
		// Delete a punishment (Not used)
		public static function delete (){
		
		}
	}
	// Reward stuff
	class reward {
		// Get points
		public static function points (){
			if ( isset( $_COOKIE['RP'] ) ){
				return $_COOKIE['RP'];
			}
			else {
				return "--|--";
			}
		}
		// Add points
		public static function addPnt ( $rew, $complete ){
			if ( $complete == "True" ){														// Reward done
				$db = DBCon();
				$st = $db -> prepare("SELECT * FROM `Rewards` WHERE `ID` = :ID");
				$st -> bindparam( ':ID', $rew );
				$st -> execute();
				foreach ( $st as $row ){
					$pnt = $row['Points'];
				}
				$st = $db -> prepare("UPDATE `Details` SET `RewPnt` = `RewPnt` - $pnt WHERE `UN` = :ID ");
				$st -> bindparam( ':ID', $_COOKIE['ID'] );
				$st -> execute();
				setcookie( "RP", $_COOKIE['RP'] - $pnt , time() + 3600 );
			}
			header('Location: rewards.php');
		}
		// Get random reward
		public static function random (){
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
					<span class='big'> $points </span><br>
					<a href='rewards.php?ID=$ID&comp=True'>Completed</a> | <a href='rewards.php?ID=$ID&comp=False'>Skip</a>";
		}
		// Get reward based on points (Not used)
		public static function fetch (){
		
		}
		// Add a reward (Not used)
		public static function add (){
		
		}
		// Delete a reward (Not used)
		public static function delete (){
		
		}
	}
	// Task stuff
	class task {
		// Get points
		public static function points (){
			if ( isset( $_COOKIE['TP'] ) ){
				return $_COOKIE['TP'];
			}
			else {
				return "--|--";
			}
		}
		// Add points
		public static function addPnt ( $tas, $complete ){
			$db = DBCon();
			$st = $db -> prepare("SELECT * FROM `Tasks` WHERE `ID` = :ID ");
			$st -> bindparam( ':ID', $tas );
			$st -> execute();
			foreach ( $st as $row ) {														// Get the number of points for the task
				$pnts = $row['Points'];
			}
			if ( $complete ==  1 ) {														// If task not completed (false)
				$pnts = $pnts - ( 3 * $pnts );												// Twice the number of points will be added instead of taken away 
			}
			$st = $db -> prepare("UPDATE `Details` SET `TasPnt` = `TasPnt` - :pnt WHERE `UN` = :ID" );
			$st -> bindparam( ':ID', $_COOKIE['ID']);
			$st -> bindparam( ':pnt', $pnts);
			$st -> execute();
			setcookie( 'TP', $_COOKIE['TP'] - $pnts, time()+3600 );
			header('Location: tasks.php');
		}
		// Get random task
		public static function random (){
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
					<span class='big'> $points </span><br>
					<a href='tasks.php?ID=$ID&comp=0'>Completed</a> | <a href='tasks.php?ID=$ID&comp=1'>Failed</a>";
		}
		// Get task based on points (Not used)
		public static function fetch (){
		
		}
		// Add a task (Not used)
		public static function add (){
		
		}
		// Delete a task (Not used)
		public static function delete (){
		
		}
	}
	// Quote stuff
	class quote {
		// Fetch random quote
		public static function fetch (){
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
		// Add qoute (Not used)
		public static function add (){
		
		}
	}
	// Class to find out limits for sessions. (Returns true if a limit and false if not)
	// (Not used)
	class limit {
		// Piss
		public static function piss (){
			return true;
		}
		// Scat
		public static function scat (){
			return true;
		}
		// Blood
		public static function blood (){
			return true;
		}
		// Public
		public static function publick (){
			return true;
		}
		// Humiliation
		public static function humiliation (){
			return true;
		}
		// Chastity
		public static function chastity (){
			return true;
		}
		// Cum eating
		public static function cEat (){
			return true;
		}
		// Anal
		public static function anal (){
			return true;
		}
		// Feminisation
		public static function femme (){
			return true;
		}
		// Cross-dressing
		public static function xDress (){
			return true;
		}
		// Post orgasm torment
		public static function POT (){
			return true;
		}
	}
	// PM-y stuff
	class PM {
		// Delete a sent message
		public static function delSen (){
		
		}
		// Delete a received message
		public static function delRec (){
		
		}
		// Send message
		public static function send (){
		
		}
		// Clean up (Deletes messages that were deleted by both sender and recipient)
		public static function clean (){
		
		}
	}
	// News-y stuff
	class news {
		// Delete a news story (Not used)
		public static function delete (){
		
		}
		// Add a news story (Not used)
		public static function add (){
		
		}
		// Fetch news stories
		public static function get (){
			$db = DBCon();
			$qry = "SELECT * FROM `News` ORDER BY `Date` DESC LIMIT 5";
			foreach ($db -> query( $qry ) as $row) {
				echo "<b>".$row['Date']."</b><br>".$row['Story']."<br><br>";				// Echo each news story
			}
		}
	}