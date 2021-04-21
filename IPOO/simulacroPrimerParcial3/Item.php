<?php
class Item
{
    //ATRIBUTOS
    private $cantVendida;
    private $producto;

    //CONSTRUCTOR
    public function __construct($cV, $p)
    {
        $this->cantVendida = $cV;
        $this->producto = $p;
    }

    //OBSERVADORES
    public function getCantVendida()
    {
        return $this->cantVendida;
    }

    public function getProducto()
    {
        return $this->producto;
    }

    //MODIFICADORES
    public function setCantVendida($cV)
    {
        $this->cantVendida = $cV;
    }

    public function setProducto($p)
    {
        $this->producto = $p;
    }

    public function __toString()
    {
        return "Cantidad vendida: " . $this->getCantVendida() . "\n" .
        "----------PRODUCTO----------\n" . $this->getProducto();
    }
}
