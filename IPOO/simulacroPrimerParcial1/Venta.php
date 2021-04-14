<?php
class Venta
{
    //VARIABLES
    private $numero;
    private $fecha;
    private $cliente;
    private $colProductos;
    private $precioFinal;

    //CONSTRUCTOR
    public function __construct($n, $f, $c)
    {
        $this->numero = $n;
        $this->fecha = $f;
        $this->cliente = $c;
        $this->colProductos = [];
        $this->precioFinal = 0;
    }

    //OBSERVADORES
    public function getNumero()
    {
        return $this->numero;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function getColProductos()
    {
        return $this->colProductos;
    }

    public function getPrecioFinal()
    {
        return $this->precioFinal;
    }

    //MODIFICADORES
    public function setNumero($n)
    {
        $this->numero = $n;
    }

    public function setFecha($f)
    {
        $this->fecha = $f;
    }

    public function setCliente($c)
    {
        $this->cliente = $c;
    }

    public function setArregloProductos($aP)
    {
        $this->colProductos = $aP;
    }

    public function setPrecioFinal($pF)
    {
        $this->precioFinal = $pF;
    }

    public function __toString()
    {
        return "Venta numero: " . $this->getNumero() . "\n" .
        "Fecha: " . $this->getFecha() . "\n" .
        "Cliente: " . $this->getCliente() . "\n" .
        "Productos:\n" . $this->productosAString() . "\n" .
        "Precio final: $" . $this->getPrecioFinal();
    }

    private function productosAString()
    {
        $retorno = "";
        $arreglo = $this->getColProductos();
        for ($i = 0; $i < count($arreglo); $i++) {
            $retorno .= $arreglo[$i] . "\n";
            $retorno .= "-------------------------";
        }
        return $retorno;
    }

    public function incorporarProducto($nuevoProducto)
    {
        $arregloProductos = $this->getColProductos();
        $precio = $this->getPrecioFinal();
        if ($nuevoProducto->getActivo()) {
            $arregloProductos[count($arregloProductos)] = $nuevoProducto;
            $this->setArregloProductos($arregloProductos);
            $precio += $nuevoProducto->darPrecioVenta();
            $this->setPrecioFinal($precio);
        }
    }
}
