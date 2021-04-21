<?php
class Producto
{
    //ATRIBUTOS
    private $codigoBarra;
    private $nombre;
    private $marca;
    private $color;
    private $talle;
    private $descripcion;
    private $stock;

    //CONSTRUCTOR
    public function __construct($cB, $n, $m, $c, $t, $d, $s)
    {
        $this->codigoBarra = $cB;
        $this->nombre = $n;
        $this->marca = $m;
        $this->color = $c;
        $this->talle = $t;
        $this->descripcion = $d;
        $this->stock = $s;
    }

    //OBSERVADORES
    public function getCodigoBarra()
    {
        return $this->codigoBarra;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getTalle()
    {
        return $this->talle;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getStock()
    {
        return $this->stock;
    }

    //MODIFICADORES
    public function setCodigoBarra($cB)
    {
        $this->codigoBarra = $cB;
    }

    public function setNombre($n)
    {
        $this->nombre = $n;
    }

    public function setMarca($m)
    {
        $this->marca = $m;
    }

    public function setColor($c)
    {
        $this->color = $c;
    }

    public function setTalle($t)
    {
        $this->talle = $t;
    }

    public function setDescripcion($d)
    {
        $this->descripcion = $d;
    }

    public function setStock($s)
    {
        $this->stock = $s;
    }

    public function __toString()
    {
        return "Codigo: " . $this->getCodigoBarra() . "\n" .
        "Nombre: " . $this->getNombre() . "\n" .
        "Marca: " . $this->getMarca() . "\n" .
        "Color: " . $this->getColor() . "\n" .
        "Talle: " . $this->getTalle() . "\n" .
        "Descripcion: " . $this->getDescripcion() . "\n" .
        "Stock: " . $this->getStock();
    }

    public function actualizarStock($cantidad)
    {
        $stock = $this->getStock();
        $this->setStock($stock + $cantidad);
    }
}
