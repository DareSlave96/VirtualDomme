<?php
	error_reporting(E_ALL ^ E_NOTICE);													// Stop error messages
	
	/******************************************************
		Remind me to add the function to delay headers
				being sent or add it for me :D
				
				You mean output buffering?
				(what i usualy use is the view function, wish should be in the core
				i do all php stuff... then store needed data in a array... that then trows
				it in the view/template file.... right before that you could set the headers
				and or generate a cache file etc... 
				Doing this does imply some changes to the current code do)
				
				Or you simply mean redirect after x seconds?
	*******************************************************/
	
	if(empty($_SERVER['DOCUMENT_ROOT'])){$_SERVER['DOCUMENT_ROOT'] = dirname(dirname(__FILE__));}
	define('ROOT', $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR); // DEFINE FULL PATH TO ROOT
	
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
		//return new PDO('sqlite:_DB.sqlite');
		return new PDO('sqlite:'.ROOT.'_DB.sqlite');
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
			setcookie( "RP", $RP, time()+3600 );
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
				$st = $db -> prepare("INSERT INTO `Details2` ( `UN` ) VALUES ( :UN )");
				$st -> bindparam ( ':UN', $UN );
				$st -> execute();
				$st = $db -> prepare("INSERT INTO `Details3` ( `UN` ) VALUES ( :UN )");
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
			if ( isset( $_COOKIE['ID'] ) ){
				
				// what about doing it like this...
				// no need to write the names, however the keys need to match the database names
				
				// NOTE: CODE NOT TESTED (should work do)
				
				echo "I'm doing it for ya!";
				$db = DBCon();
				
				$query = "UPDATE `Details2` SET ";
				
				end($_POST);
				$lastkey = key($_POST); // get last element
				reset($_POST); // set pointer to first
				
				foreach($_POST as $key => $value){ //build query					
					if($key == $lastkey){
						$query .= "'".$key."' = :".$key;
					}else{
						$query .= "'".$key."' = :".$key.", ";
					}					
				}
				
				$query .= " WHERE `UN` = ':UN'";
				$st = $db -> prepare($query); //finish query
				
				foreach($_POST as $key => $value){ // build binds
					if(!isset($_POST[$key])){return "ERROR: KEY MISSING";} //return errors
					$st -> bindparam( ':'.$key,$_POST[$key] );					
				}
				$st -> bindparam( ':UN', $_COOKIE['ID'] );
				
				if($st -> execute()){ // executre
					return "OK";
				}else{
					return "ERROR: EXECUTE FAILED";	
				}
				
				/*
				echo "I'm doing it for ya!";
				$db = DBCon();
				$st = $db -> prepare("UPDATE `Details2` SET `Piss` = :piss, `Scat` = :scat, `Blood` = :blood, `oPublic` = :oPub, `hPublic` = :hPub, `Humiliation` = :humiliation, `Chastity` = :chastity, `cEating` = :cEat, `Anal` = :anal, `Feminisation` = :femme, `xDressing` = :xdress, `POT` = :pot WHERE `UN` = ':UN'");
				$st -> bindparam( ':piss',$_POST['Piss'] );
				$st -> bindparam( ':scat',$_POST['Scat'] );
				$st -> bindparam( ':blood',$_POST['Blood'] );
				$st -> bindparam( ':oPub',$_POST['oPub'] );
				$st -> bindparam( ':hPub',$_POST['hPub'] );
				$st -> bindparam( ':humiliation',$_POST['Humil'] );
				$st -> bindparam( ':chastity',$_POST['Chast'] );
				$st -> bindparam( ':cEat',$_POST['cEat'] );
				$st -> bindparam( ':anal',$_POST['Anal'] );
				$st -> bindparam( ':femme',$_POST['Fem'] );
				$st -> bindparam( ':xdress',$_POST['xDress'] );
				$st -> bindparam( ':pot',$_POST['POT'] );
				$st -> bindparam( ':UN', $_COOKIE['ID'] );
				$st -> execute();
				*/
			}
			else {
				return false;
				echo "Oops, you're not logged in";
			}
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
			if ( isset ( $_COOKIE['ID'] ) ){
				$UN = $_COOKIE['ID'];
			}
			else {
				$UN = "Anon";
			}
			$db = DBCon();
			$st = $db -> prepare("INSERT INTO `Punishments` ( `Author`, `Pun`, `Points` ) VALUES ( :UN, :Pun, :Pnt )");
			$st -> bindparam( ':UN', $UN );
			$st -> bindparam( ':Pun', $_POST['Pun'] );
			$st -> bindparam( ':Pnt', $_POST['Points'] );
		}
		// Delete a punishment (Not used)
		public static function delete (){
			return;
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
			if ( isset ( $_COOKIE['ID'] ) ){
				$UN = $_COOKIE['ID'];
			}
			else {
				$UN = "Anon";
			}
			$db = DBCon();
			$st = $db -> prepare("INSERT INTO `Rewards` ( `Author`, `Rew`, `Points` ) VALUES ( :UN, :Rew, :Pnt )");
			$st -> bindparam( ':UN', $UN );
			$st -> bindparam( ':Rew', $_POST['Rew'] );
			$st -> bindparam( ':Pnt', $_POST['Points'] );
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
			if ( isset ( $_COOKIE['ID'] ) ){
				$UN = $_COOKIE['ID'];
			}
			else {
				$UN = "Anon";
			}
			$db = DBCon();
			$st = $db -> prepare("INSERT INTO `Tasks` ( `Author`, `Tas`, `Points` ) VALUES ( :UN, :Tas, :Pnt )");
			$st -> bindparam( ':UN', $UN );
			$st -> bindparam( ':Tas', $_POST['Tas'] );
			$st -> bindparam( ':Pnt', $_POST['Points'] );
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
	// Class to find out limits for sessions. (Returns 1 if a limit, 2 if a dislike and 3 if a like)
	// (Not used for the moment)
	class limit {
		// Piss
		public static function piss (){
			if( isset( $_COOKIE['ID'] ) ){
				echo "Cookie set";
				$db = DBCon();
				$st = $db -> prepare("SELECT `Piss` FROM `Details2` WHERE `UN` = :UN");
				$st -> bindparam( ':UN', $_COOKIE['ID'] );
				$st -> execute();
				foreach ( $st as $row ){
					return $row['Piss'];
				}
			}
			else {
				return false;
			}
		}
		// Scat
		public static function scat (){
			if( isset( $_COOKIE['ID'] ) ){
				echo "Cookie set";
				$db = DBCon();
				$st = $db -> prepare("SELECT `Scat` FROM `Details2` WHERE `UN` = :UN");
				$st -> bindparam( ':UN', $_COOKIE['ID'] );
				$st -> execute();
				foreach ( $st as $row ){
					return $row['Scat'];
				}
			}
			else {
				return false;
			}
		}
		// Blood
		public static function blood (){
			if( isset( $_COOKIE['ID'] ) ){
				echo "Cookie set";
				$db = DBCon();
				$st = $db -> prepare("SELECT `Blood` FROM `Details2` WHERE `UN` = :UN");
				$st -> bindparam( ':UN', $_COOKIE['ID'] );
				$st -> execute();
				foreach ( $st as $row ){
					return $row['Blood'];
				}
			}
			else {
				return false;
			}
		}
		// Obvious Public
		public static function oPublic (){
			if( isset( $_COOKIE['ID'] ) ){
				echo "Cookie set";
				$db = DBCon();
				$st = $db -> prepare("SELECT `oPublic` FROM `Details2` WHERE `UN` = :UN");
				$st -> bindparam( ':UN', $_COOKIE['ID'] );
				$st -> execute();
				foreach ( $st as $row ){
					return $row['oPublic'];
				}
			}
			else {
				return false;
			}
		}
		// Hidden Public
		public static function hPublic (){
			if( isset( $_COOKIE['ID'] ) ){
				echo "Cookie set";
				$db = DBCon();
				$st = $db -> prepare("SELECT `hPublic` FROM `Details2` WHERE `UN` = :UN");
				$st -> bindparam( ':UN', $_COOKIE['ID'] );
				$st -> execute();
				foreach ( $st as $row ){
					return $row['hPublic'];
				}
			}
			else {
				return false;
			}
		}
		// Humiliation
		public static function humiliation (){
			if( isset( $_COOKIE['ID'] ) ){
				echo "Cookie set";
				$db = DBCon();
				$st = $db -> prepare("SELECT `Humiliation` FROM `Details2` WHERE `UN` = :UN");
				$st -> bindparam( ':UN', $_COOKIE['ID'] );
				$st -> execute();
				foreach ( $st as $row ){
					return $row['Humiliation'];
				}
			}
			else {
				return false;
			}
		}
		// Chastity
		public static function chastity (){
			if( isset( $_COOKIE['ID'] ) ){
				echo "Cookie set";
				$db = DBCon();
				$st = $db -> prepare("SELECT `Chastity` FROM `Details2` WHERE `UN` = :UN");
				$st -> bindparam( ':UN', $_COOKIE['ID'] );
				$st -> execute();
				foreach ( $st as $row ){
					return $row['Chastity'];
				}
			}
			else {
				return false;
			}
		}
		// Cum eating
		public static function cEat (){
			if( isset( $_COOKIE['ID'] ) ){
				echo "Cookie set";
				$db = DBCon();
				$st = $db -> prepare("SELECT `cEating` FROM `Details2` WHERE `UN` = :UN");
				$st -> bindparam( ':UN', $_COOKIE['ID'] );
				$st -> execute();
				foreach ( $st as $row ){
					return $row['cEating'];
				}
			}
			else {
				return false;
			}
		}
		// Anal
		public static function anal (){
			if( isset( $_COOKIE['ID'] ) ){
				echo "Cookie set";
				$db = DBCon();
				$st = $db -> prepare("SELECT `Anal` FROM `Details2` WHERE `UN` = :UN");
				$st -> bindparam( ':UN', $_COOKIE['ID'] );
				$st -> execute();
				foreach ( $st as $row ){
					return $row['Anal'];
				}
			}
			else {
				return false;
			}
		}
		// Feminisation
		public static function femme (){
			if( isset( $_COOKIE['ID'] ) ){
				echo "Cookie set";
				$db = DBCon();
				$st = $db -> prepare("SELECT `Feminisation` FROM `Details2` WHERE `UN` = :UN");
				$st -> bindparam( ':UN', $_COOKIE['ID'] );
				$st -> execute();
				foreach ( $st as $row ){
					return $row['Feminisation'];
				}
			}
			else {
				return false;
			}
		}
		// Cross-dressing
		public static function xDress (){
			if( isset( $_COOKIE['ID'] ) ){
				echo "Cookie set";
				$db = DBCon();
				$st = $db -> prepare("SELECT `xDressing` FROM `Details2` WHERE `UN` = :UN");
				$st -> bindparam( ':UN', $_COOKIE['ID'] );
				$st -> execute();
				foreach ( $st as $row ){
					return $row['xDressing'];
				}
			}
			else {
				return false;
			}
		}
		// Post orgasm torment
		public static function POT (){
			if( isset( $_COOKIE['ID'] ) ){
				echo "Cookie set";
				$db = DBCon();
				$st = $db -> prepare("SELECT `POT` FROM `Details2` WHERE `UN` = :UN");
				$st -> bindparam( ':UN', $_COOKIE['ID'] );
				$st -> execute();
				foreach ( $st as $row ){
					return $row['POT'];
				}
			}
			else {
				return false;
			}
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
