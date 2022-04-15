#!/usr/bin/php
<?php
	if ($argc <= 1)
		return (0);
	$words = array();
	array_shift($argv);
	foreach ($argv as $arg)
		foreach (explode(" ", $arg) as $word)
			array_push($words, $word);
	$words = array_filter($words);
	sort($words);
	foreach ($words as $word)
		echo "$word\n"
?>
