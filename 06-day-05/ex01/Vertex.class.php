<?php
require_once 'Color.class.php';

Class Vertex
{
	public static $verbose = False;

	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;

	public function __construct(array $kwargs)
	{
		if (isset($kwargs['x'])
			&& isset($kwargs['y'])
			&& isset($kwargs['z']))
		{
			$this->_x = $kwargs['x'];
			$this->_y = $kwargs['y'];
			$this->_z = $kwargs['z'];
			if (isset($kwargs['w']))
				$this->_w = $kwargs['w'];
			if (isset($kwargs['color']))
				$this->_color = $kwargs['color'];
			else
				$this->_color = new Color(array('rgb' => 0xffffff));
			if (self::$verbose === True)
				print ($this . " constructed" . PHP_EOL);
		}
	}

	public function __get($attribute)
	{
		return ($this->$attribute);
	}

	public function __set($attribute, $value)
	{
		$this->$attribute = $value;
	}

	public function __destruct()
	{
		if (self::$verbose === True)
			print ($this . " destructed" . PHP_EOL);
	}

	public function __toString()
	{
		if (self::$verbose === True)
			return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )",
				$this->_x, $this->_y, $this->_z, $this->_w, $this->_color));
		return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )",
			$this->_x, $this->_y, $this->_z, $this->_w));
	}

	public static function doc()
	{
		if (file_exists("Vertex.doc.txt"))
			return (file_get_contents("Vertex.doc.txt"));
	}
}
?>
