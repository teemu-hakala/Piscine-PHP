<?php
Class Color
{
	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = false;

	private function parse_colour($rgb)
	{
		$this->red = ($rgb >> 16) & 0xFF;
		$this->green = ($rgb >> 8) & 0xFF;
		$this->blue = $rgb & 0xFF;
	}

	public static function doc()
	{
		return (file_get_contents("Color.doc.txt"));
	}

	public function __construct(array $kwargs)
	{
		if ($kwargs['rgb'])
			self::parse_colour(intval($kwargs['rgb'], 10));
		else if (isset($kwargs['red']) && isset($kwargs['green']) && isset($kwargs['blue']))
		{
			$this->red = intval($kwargs['red'], 10);
			$this->green = intval($kwargs['green'], 10);
			$this->blue = intval($kwargs['blue'], 10);
		}
		if (self::$verbose === true)
			print($this . " constructed." . PHP_EOL);
		return ;
	}

	public function __destruct()
	{
		if (self::$verbose === true)
			print($this . " destructed." . PHP_EOL);
		return ;
	}

	public function __toString()
	{
		return (sprintf("Color( red: %3s, green: %3s, blue: %3s )",
			$this->red, $this->green, $this->blue));
	}

	public function add(Color $rhs)
	{
		return (new Color(
				array('red' => $this->red + $rhs->red,
					'green' => $this->green + $rhs->green,
					'blue' => $this->blue + $rhs->blue
				)
			)
		);
	}

	public function sub(Color $rhs)
	{
		return (new Color(
				array('red' => $this->red - $rhs->red,
					'green' => $this->green - $rhs->green,
					'blue' => $this->blue - $rhs->blue
				)
			)
		);
	}

	public function mult($f)
	{
		return (new Color(
				array('red' => $this->red * $f,
					'green' => $this->green * $f,
					'blue' => $this->blue * $f
				)
			)
		);
	}
}

?>
