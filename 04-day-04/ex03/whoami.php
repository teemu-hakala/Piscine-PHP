<?php
	session_start();
	if ($_SESSION["loggued_on_user"] === "")
		exit ("ERROR\n");
	exit ($_SESSION["loggued_on_user"] . "\n");
?>
