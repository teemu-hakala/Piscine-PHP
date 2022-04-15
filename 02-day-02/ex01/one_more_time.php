#!/usr/bin/php
<?php
	function	exit_msg($message, $val)
	{
		echo "$message";
		exit ($val);
	}

	function	exit_format()
	{
		exit_msg("Wrong Format\n", 1);
	}

	function	match_handler($match)
	{
		if ($match === false || $match === 0)
			exit_format();
	}

	if ($argc < 2)
		exit (0);
	$date_arr = explode(" ", $argv[1]);
	if (count($date_arr) !== 5)
		exit_format();
	$day = array_shift($date_arr);
	$day_n = array_shift($date_arr);
	$month = array_shift($date_arr);
	$year = array_shift($date_arr);
	$time = array_shift($date_arr);
	match_handler(preg_match("/^[Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche$/", $day));
	match_handler(preg_match("/^\d{1,2}$/", $day_n));
	match_handler(preg_match("/^[Jj]anvier|[Ff]évrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]oût|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]écembre$/", $month));
	match_handler(preg_match("/^\d{4}$/", $year));
	match_handler(preg_match("/^\d{2}:\d{2}:\d{2}$/", $time));
	$months = array(
		'janvier' => 1,
		'février' => 2,
		'mars' => 3,
		'avril' => 4,
		'mai' => 5,
		'juin' => 6,
		'juillet' => 7,
		'août' => 8,
		'septembre' => 9,
		'octobre' => 10,
		'novembre' => 11,
		'décembre' => 12
	);
	date_default_timezone_set('Europe/Paris');
	$month = $months[strtolower($month)];
	$date = date_create("${year}-${month}-${day_n}T${time}");
	if ($date === false)
		exit_msg("Incoherent Date\n", 1);
	echo date_timestamp_get($date);
?>

