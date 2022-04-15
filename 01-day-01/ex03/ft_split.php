<?php
	function	ft_split($string)
	{
		$result = array();
		foreach (explode(' ', $string) as $piece)
			if (strlen($piece) > 0)
				array_push($result, $piece);
		sort($result);
		return ($result);
	}
?>
