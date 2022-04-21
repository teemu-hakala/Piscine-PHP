<?php
abstract Class Fighter
{
	private $_type;

	public function __construct($type)
	{
		$this->_type = $type;
	}

	public function __get($attribute)
	{
		return ($this->$attribute);
	}

	abstract function fight($target);
}
?>
