<?php
	include ("auth.php");
	session_start();
	if (auth($_GET["login"], $_GET["passwd"]) === false)
	{
		$_SESSION["loggued_on_user"] = "";
		exit ("ERROR\n");
	}
	$_SESSION["loggued_on_user"] = $_GET["login"];
	exit ("OK\n");
?>
