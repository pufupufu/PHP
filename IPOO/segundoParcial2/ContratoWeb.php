<?php
class ContratoWeb extends Contrato
{
    //ATRIBUTOS
    private $descuento;

    //CONSTRUCTOR
    public function __construct($fI, $fV, $p, $e, $c, $sR, $cl)
    {
        parent::__construct($fI, $fV, $p, $e, $c, $sR, $cl);
        $this->descuento = 10;
    }

    //OBSERVADORES
    public function getDescuento()
    {
        return $this->descuento;
    }

    //MODIFICADORES
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    }

    public function calcularImporte()
    {
        $importeFinal = parent::calcularImporte();
        $importeFinal -= $importeFinal * 0.1;
        return $importeFinal;
    }
}
