#!/usr/bin/php
<?php
	function	is_even($integer)
	{
		return ($integer % 2 === 0);
	}

	$f = fopen('php://stdin', 'r');

	while (!feof($f))
	{
		print "Enter a number: ";
		$integer = fgets($f);
		if ($integer === false)
			break ;
		$integer = trim($integer, "\n");
		if (is_numeric($integer) === false)
			echo "'$integer' is not a number\n";
		else if (is_even($integer) === TRUE)
			echo "The number $integer is even\n";
		else
			echo "The number $integer is odd\n";
	}
	echo "\n";
	fclose($f);
?>
