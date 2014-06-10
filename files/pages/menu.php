<b><u>Menu</u></b><br>
<a href='#home' class="pagebtn">Home</a>
<a href='#tasks' class="pagebtn">Tasks</a><br>
<a href='#punishments' class="pagebtn">Punishments</a><br>
<a href='#rewards' class="pagebtn">Rewards</a><br>
<a href='#sessions' class="pagebtn">Sessions</a><br>
 
<?php
if ( !isset( $_COOKIE['ID'] ) ){// If user hasn't logged in add the link
	echo "<a href='#details'>Sign In / Up</a><br>";
} else {
	echo "<a href='details.php?do=lo'>Log out</a>";
}
?>
