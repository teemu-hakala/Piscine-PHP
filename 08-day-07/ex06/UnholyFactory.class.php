<?php
Class UnholyFactory
{
	private $_types = array();

	public function absorb($type)
	{
		if (is_subclass_of($type, "Fighter"))
		{
			$encountered = False;
			foreach ($this->_types as $_type)
			{
				if (get_class($type) === get_class($_type))
				{
					$encountered = True;
					print("(Factory already absorbed a fighter of type "
						. $type->_type . ")" . PHP_EOL);
				}
			}
			if (!$encountered)
			{
				print("(Factory absorbed a fighter of type "
					. $type->_type . ")") . PHP_EOL;
				$this->_types[] = $type;
			}
		}
		else
			print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
	}

	public function fabricate($type)
	{
		$fighter = NULL;
		foreach ($this->_types as $_type)
			if ($_type->_type === $type)
				$fighter = clone $_type;
		if (isset($fighter))
			print("(Factory fabricates a fighter of type "
				. $type . ")" . PHP_EOL);
		else
			print("(Factory hasn't absorbed any fighter of type $type)"
				. PHP_EOL);
		return ($fighter);
	}
}
?>
