<html>
<?php

	require 'cc.php';

	setcookie('FONTCOOKIE', '', time()-(60*60*24*7*7));
	header('Location: cc.php?select_font=' . $GET_FONT . '');




?>
</html>