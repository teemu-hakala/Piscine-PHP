#!/usr/bin/php
<?php
	if ($argc > 1)
		echo preg_replace("/ +/", " ", trim($argv[1]))."\n";
?>
