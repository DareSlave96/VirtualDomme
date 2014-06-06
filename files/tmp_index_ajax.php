<?php
	include_once('_func.php');	
	O18();
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="res/style.css">
		<title>
			Home - Virtual Dom(me)
		</title>
        <script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="main_ajax.js"></script>
        <script type="text/javascript"> 
		  // load some quote on load....
		  // cool loading animation and stuff is still missing
		  $(document).ready(function() {
			  load2div("func2ajax","#Quote_div","?fid=1");
		  });              
        </script>
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
            <div id="Quote">			 
              <span class="qte"><div id="Quote_div">stuff gets loaded in here</div></span>
  			</div>
            
		</div>
		<div id="body">
			<h4>News</h4>
			<?php echo news::get(); ?>
            <hr>
            <h4>Debug stuff and links</h4>
            <a href="#Quote" id="load-1-func2ajax-fid" class="lbutton2div">Load new Quote</a>
		</div>
	</body>
</html>
