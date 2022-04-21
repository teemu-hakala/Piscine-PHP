<?php
abstract Class House
{
	abstract function getHouseName();
	abstract function getHouseSeat();
	abstract function getHouseMotto();
	public function introduce()
	{
		printf("House %s of %s : \"%s\"" . PHP_EOL,
			$this->getHouseName(),
			$this->getHouseSeat(),
			$this->getHouseMotto());
	}
}
?>
