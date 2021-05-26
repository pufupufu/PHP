<?php
class ContratoWeb extends Contrato
{
    //ATRIBUTOS
    private $porcentajeDescuento;

    //CONSTRUCTOR
    public function __construct($fI, $fV, $oP, $e, $c, $sR, $oC, $porcentajeDescuento)
    {
        parent::__construct($fI, $fV, $oP, $e, $c, $sR, $oC);
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    //OBSERVADORES
    public function getPorcentajeDescuento()
    {
        return $this->porcentajeDescuento;
    }

    //MODIFICADORES
    public function setPorcentajeDescuento($porcentajeDescuento)
    {
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    public function __toString()
    {
        return parent::__toString() .
        "\nDescuento: " . $this->getPorcentajeDescuento() . "%";
    }
}
