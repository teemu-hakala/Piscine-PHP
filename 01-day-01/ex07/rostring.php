#!/usr/bin/php
<?php

	function	is_empty($element)
	{
		if (strlen($element) > 0)
			return (true);
		return (false);
	}

	if ($argc === 1)
		return (0);
	$argv[1] = explode(' ', $argv[1]);
	$argv[1] = array_filter($argv[1], "is_empty");
	array_push($argv[1], array_shift($argv[1]));
	$i = 0;
	foreach ($argv[1] as $word)
	{
		echo "$word";
		if (++$i !== count($argv[1]))
			echo " ";
	}
	echo "\n";
?>
