<?php
require_once 'Vertex.class.php';

Class Vector
{
    public static $verbose = False;
    private $_x;
    private $_y;
    private $_z;
    private $_w = 0.0;
    private $_magnitude;

    public function __construct($kwargs)
    {
        if (isset($kwargs['dest']))
        {
            if (isset($kwargs['orig']))
                $orig = $kwargs['orig'];
            else
                $orig = new Vertex(array());
            $this->_x = $kwargs['dest']->_x - $orig->_x;
            $this->_y = $kwargs['dest']->_y - $orig->_y;
            $this->_z = $kwargs['dest']->_z - $orig->_z;

        }
        $this->_magnitude = sqrt(pow($this->_x, 2)
            + pow($this->_y, 2)
            + pow($this->_z, 2));
        if (self::$verbose)
            printf("$this constructed" . PHP_EOL);
    }

    public function __destruct()
    {
        if (self::$verbose === True)
            print ("$this destructed" . PHP_EOL);
    }

    public static function doc()
    {
        return (file_get_contents("Vector.doc.txt"));
    }

    public function __toString()
    {
        return (sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )",
            $this->_x, $this->_y, $this->_z, $this->_w));
    }

    public function __get($attribute)
    {
        return ($this->$attribute);
    }

    public function magnitude()
    {
        return ($this->_magnitude);
    }

    public function normalize()
    {
        return (new Vector(
            array('dest' =>
                new Vertex(
                    array(
                        'x' => $this->_x / $this->_magnitude,
                        'y' => $this->_y / $this->_magnitude,
                        'z' => $this->_z / $this->_magnitude
                    )
                )
            )
        ));
    }

    public function add(Vector $rhs)
    {
        return (new Vector(
            array('dest'
                => new Vertex(
                    array(
                        'x' => $this->_x + $rhs->_x,
                        'y' => $this->_y + $rhs->_y,
                        'z' => $this->_z + $rhs->_z
                    )
                )
            )
        ));
    }

    public function sub(Vector $rhs)
    {
        return (new Vector(
            array('dest'
                => new Vertex(
                    array(
                        'x' => $this->_x - $rhs->_x,
                        'y' => $this->_y - $rhs->_y,
                        'z' => $this->_z - $rhs->_z
                    )
                )
            )
        ));
    }

    public function opposite()
    {
        return (new Vector(
            array('dest'
                => new Vertex(
                    array(
                        'x' => -$this->_x,
                        'y' => -$this->_y,
                        'z' => -$this->_z
                    )
                )
            )
        ));
    }

    public function scalarProduct($k)
    {
        return (new Vector(
            array('dest'
                => new Vertex(
                    array(
                        'x' => $this->_x * $k,
                        'y' => $this->_y * $k,
                        'z' => $this->_z * $k
                    )
                )
            )
        ));
    }

    public function dotProduct(Vector $rhs)
    {
        return ($this->_x * $rhs->_x
            + $this->_y * $rhs->_y
            + $this->_z * $rhs->_z);
    }

    public function cos(Vector $rhs)
    {
        return ($this->dotProduct($rhs) / ($this->_magnitude * $rhs->_magnitude));
    }

    public function crossProduct(Vector $rhs)
    {
        return (new Vector(
            array('dest'
                => new Vertex(
                    array(
                        'x' => $this->_y * $rhs->_z - $this->_z * $rhs->_y,
                        'y' => $this->_z * $rhs->_x - $this->_x * $rhs->_z,
                        'z' => $this->_x * $rhs->_y - $this->_y * $rhs->_x
                    )
                )
            )
        ));
    }
}
?>