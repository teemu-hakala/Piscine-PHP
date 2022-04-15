<?php
	function	ft_is_sort($tab)
	{
		if ($tab === NULL)
			return (false);
		$temp_tab = $tab;
		sort($temp_tab);
		return ($temp_tab === $tab);
	}
?>
