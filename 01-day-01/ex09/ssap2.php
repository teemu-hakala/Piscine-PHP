#!/usr/bin/php
<?php
	function	ascii_loweralpha($c)
	{
		$c = ord($c);
		return (ord('a') <= $c && $c <= ord('z'));
	}

	function	ascii_numeral($c)
	{
		$c = ord($c);
		return (ord('0') <= $c && $c <= ord('9'));
	}

	function	sorter($ac, $bc)
	{
		$oac = ord($ac);
		$obc = ord($bc);
		if (ascii_loweralpha($ac))
		{
			if (ascii_loweralpha($bc))
			{
				return ($oac > $obc);
			}
			return (false);
		}
		else if (ascii_numeral($ac))
		{
			if (ascii_loweralpha($bc))
				return (true);
			else if (ascii_numeral($bc))
				return ($oac > $obc);
			return (false);
		}
		if (ascii_loweralpha($bc) || ascii_numeral($bc))
			return (true);
		return ($oac > $obc);
	}

	function	ssap2($a, $b)
	{
		$a = strtolower($a);
		$b = strtolower($b);
		$minlen = min(strlen($a), strlen($b));
		for ($i = 0; $i < $minlen; $i++)
		{
			if ($a[$i] === $b[$i])
				continue ;
			if (sorter($a[$i], $b[$i]) === false)
				return (-1);
			return (1);
		}
		return (0);
	}

	$words = array();

	array_shift($argv);
	foreach ($argv as $arg)
		foreach (explode(" ", $arg) as $word)
			$words[] = $word;
	usort($words, "ssap2");
	foreach($words as $word)
		echo "$word\n";
?>
