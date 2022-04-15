#!/usr/bin/php
<?php
	if ($argc !== 4)
	{
		echo "Incorrect Parameters\n";
		exit (1);
	}
	$operand_l = trim($argv[1], " \t");
	$operator = trim($argv[2], " \t");
	$operand_r = trim($argv[3], " \t");
	if ($operator === "+")
		$result = $operand_l + $operand_r;
	else if ($operator === "-")
		$result = $operand_l - $operand_r;
	else if ($operator === "*")
		$result = $operand_l * $operand_r;
	else if ($operator === "/")
	{
		if ($operand_r != 0)
			$result = $operand_l / $operand_r;
		else
		{
			echo "Error: division by zero!\n";
			exit (1);
		}
	}
	else if ($operator === "%")
	{
		if ($operand_r != 0)
			$result = $operand_l % $operand_r;
		else
		{
			echo "Error: modulo by zero!\n";
			exit (1);
		}
	}
	echo "$result\n"
?>
