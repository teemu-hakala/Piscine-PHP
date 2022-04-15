#!/usr/bin/php
<?php
	function	exit_msg($message, $val)
	{
		echo "$message";
		exit ($val);
	}

	if ($argc !== 2)
		exit_msg("Incorrect Parameters\n", 1);
	preg_match('/^ *([+-]?\d+) *([+\-*\/%]) *([+-]?\d+) *$/', $argv[1], $expr);
	if (count($expr) !== 4)
		exit_msg("Syntax Error\n", 1);
	$oprd_l = intval($expr[1]);
	$oprt = $expr[2];
	$oprd_r = intval($expr[3]);
	if ($oprd_l != $expr[1] || $oprd_r != $expr[3])
		exit_msg("Conversion Error\n", 1);
	if ($oprt === '+')
		$result = $oprd_l + $oprd_r;
	else if ($oprt === '-')
		$result = $oprd_l - $oprd_r;
	else if ($oprt === '*')
		$result = $oprd_l * $oprd_r;
	else if ($oprt === '/')
	{
		if ($oprd_r !== 0)
			$result = $oprd_l / $oprd_r;
		else
			exit_msg("Error! Division by 0\n", 1);
	}
	else if ($oprt === '%')
	{
		if ($oprd_r !== 0)
			$result = $oprd_l % $oprd_r;
		else
			exit_msg("Error! Modulo by 0\n", 1);
	}
	echo "$result\n";
?>
