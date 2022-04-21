<?php

	function	auth($login, $passwd)
	{
		$passwd_file_url = "../private/passwd";
		$users = unserialize(file_get_contents($passwd_file_url));
		if ($users === false)
			return (FALSE);
		foreach ($users as $id => $user)
		{
			if ($user["login"] !== $login)
				continue ;
			$passwd = hash('whirlpool', $passwd, false);
			if ($user["passwd"] === $passwd)
				return (TRUE);
		}
		return (FALSE);
	}
?>
