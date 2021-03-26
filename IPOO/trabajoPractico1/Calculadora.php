<?php
class Calculadora
{
    private $numA;
    private $numB;

    public function __construct($a, $b)
    {
        $this->numA = $a;
        $this->numB = $b;
    }

    public function getA()
    {
        return $this->numA;
    }

    public function getB()
    {
        return $this->numB;
    }

    public function setA($a)
    {
        $this->numA = $a;
    }

    public function setB($b)
    {
        $this->numB = $b;
    }

    public function suma()
    {
        return $this->numA + $this->numB;
    }

    public function resta()
    {
        return $this->numA - $this->numB;
    }

    public function producto()
    {
        return $this->numA * $this->numB;
    }

    public function division()
    {
        return $this->numA / $this->numB;
    }
}
