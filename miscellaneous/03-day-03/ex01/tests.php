#!/usr/bin/php
<?php
	$date = DateTime::createFromFormat('j-M-Y', '15-Apr-2009');
	echo $date->format('Y-m-d');

	var_dump(setlocale(LC_TIME, 'fr_FR.ISO8859-15'));
	$date = date_create(strftime("%c"));
	echo date_timestamp_get($date);

	var_dump(setlocale(LC_TIME, 'fr_FR.ISO8859-1'));
	$date = date_create(strftime("%c"));
	echo date_timestamp_get($date);

	var_dump(setlocale(LC_TIME, 'fr_FR.UTF-8'));
	$date = date_create(strftime("%c"));
	echo date_timestamp_get($date);

	var_dump(setlocale(LC_TIME, 'fr_FR'));
	$date = date_create(strftime("%c"));
	echo date_timestamp_get($date);

	var_dump(setlocale(LC_TIME, 'fr_FR.ISO8859-15'));
	echo strftime("%c");
	//$date = date_create("$day $day_n $month $year $time");
	$date = date_create(strftime("%c"));
	echo date_timestamp_get($date);
?>

