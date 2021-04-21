<?php
class Venta
{
    //ATRIBUTOS
    private $fecha;
    private $denCliente;
    private $numeroFactura;
    private $tipoComprobante;
    private $colItems;

    //CONSTRUCTOR
    public function __construct($f, $dC, $nF, $tC)
    {
        $this->fecha = $f;
        $this->denCliente = $dC;
        $this->numeroFactura = $nF;
        $this->tipoComprobante = $tC;
        $this->colItems = [];
    }

    //OBSERVADORES
    public function getFecha()
    {
        return $this->fecha;
    }

    public function getDenCliente()
    {
        return $this->denCliente;
    }

    public function getNumeroFactura()
    {
        return $this->numeroFactura;
    }

    public function getTipoComprobante()
    {
        return $this->tipoComprobante;
    }

    public function getColItems()
    {
        return $this->colItems;
    }

    //MODIFICADORES
    public function setFecha($f)
    {
        $this->fecha = $f;
    }

    public function setDenCliente($dC)
    {
        $this->denCliente = $dC;
    }

    public function setNumeroFactura($nF)
    {
        $this->numeroFactura = $nF;
    }

    public function setTipoComprobante($tC)
    {
        $this->tipoComprobante = $tC;
    }

    public function setColItems($cI)
    {
        $this->colItems = $cI;
    }

    public function __toString()
    {
        return "Fecha: " . $this->getFecha() . "\n" .
        "Denominacion cliente: " . $this->getDenCliente() . "\n" .
        "Factura " . $this->getTipoComprobante() . " numero " . $this->getNumeroFactura() . "\n" .
        $this->colItemsAString();
    }

    public function colItemsAString() {
        $retorno = "";
        $coleccion = $this->getColItems();
        for ($i=0; $i < count($coleccion); $i++) { 
            $retorno .= $coleccion[$i] . "\n";
            $retorno .= "--------------------\n";
        }
        return $retorno;
    }

    public function incorporarProducto($objProducto, $cantidad) {
        $exito = false;
        if(($objProducto->getStock() - $cantidad) >= 0) {
            $coleccion = $this->getColItems();
            $objProducto->actualizarStock($cantidad);
            $nuevoItem = new Item($cantidad, $objProducto);
            array_push($coleccion, $nuevoItem);
            $this->setColItems($coleccion);
            $exito = true;
        }
        return $exito;
    }
}
