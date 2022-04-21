<?php
	$private_dir = '../private/';
	$private_file = 'passwd';
	$private_path = $private_dir . $private_file;

	if ($_POST["submit"] !== "OK")
		exit ("ERROR\n");
	$users = unserialize(file_get_contents($private_path));
	if ($users === false)
		exit ("ERROR\n");
	$changed = 0;
	foreach ($users as $id => $user)
	{
		if ($user["login"] !== $_POST["login"])
			continue;
		$prev_hash = hash('whirlpool', $_POST["oldpw"], false);
		if ($user["passwd"] !== $prev_hash)
			exit ("ERROR\n");
		$users[$id]["passwd"] = hash('whirlpool', $_POST["newpw"], false);
		$changed = 1;
	}
	if ($changed === 0)
		exit ("ERROR\n");
	file_put_contents($private_path, serialize($users));
	echo "OK\n";
?>
