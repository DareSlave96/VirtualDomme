<b><u>Menu</u></b><br>
<a href='#home'>Home</a>
<a href='#tasks'>Tasks</a><br>
<a href='#punishments'>Punishments</a><br>
<a href='#rewards'>Rewards</a><br>
<a href='#sessions'>Sessions</a><br>

<?php
if ( !isset( $_COOKIE['ID'] ) ){// If user hasn't logged in add the link
	echo "<a href='#details'>Sign In / Up</a><br>";
} else {
	echo "<a href='details.php?do=lo'>Log out</a>";
}
?>
