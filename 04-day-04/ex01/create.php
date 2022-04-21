<?php
	function	exit_msg($message, $value)
	{
		echo $message;
		exit ($value);
	}

	$private_dir = '../private/';
	$private_file = 'passwd';
	$private_path = $private_dir . $private_file;

	if (file_exists($private_path) === false)
		@mkdir($private_dir, 0777, true);
	else
		$passwd_file = file_get_contents($private_path);
	if ($_POST["submit"] !== "OK" || !$_POST["login"] || $_POST["passwd"] === "")
		exit_msg("ERROR\n", 1);
	$passwds = [];
	if (isset($passwd_file))
		$passwds = unserialize($passwd_file);
	foreach ($passwds as $entry_id)
		if ($entry_id["login"] === $_POST["login"])
			exit_msg("ERROR\n", 1);
	if ($_POST["passwd"])
	{
		$passwds[] = array (
			"login" => $_POST["login"],
			"passwd" => hash ('whirlpool', $_POST["passwd"], false),
		);
	}
	file_put_contents($private_path, serialize($passwds));
	exit("OK\n");
?>
