<?php
Class NightsWatch implements IFighter
{
	private $_fighters = array();

	public function recruit($fighter)
	{
		$this->_fighters[] = $fighter;
	}

	public function fight()
	{
		foreach ($this->_fighters as $fighter)
			if ($fighter instanceof IFighter)
				$fighter->fight();
	}
}
?>
