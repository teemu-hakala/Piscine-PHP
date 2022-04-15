#!/usr/bin/php
<?php
	if ($argc <= 2)
		exit (0);
	$hashtable = array();
	array_shift($argv);
	$key = array_shift($argv);
	foreach ($argv as $arg)
	{
		$key_val = explode(":", $arg);
		$hashtable[$key_val[0]] = $key_val[1];
	}
	if ($hashtable[$key])
		echo $hashtable[$key]."\n";
?>
