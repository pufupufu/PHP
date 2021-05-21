<?php

class Internacional extends Vuelo
{
    //ATRIBUTOS
    private $cantidadEscalas;

    //CONSTRUCTOR
    public function __construct($nV, $pEcD, $pEjD, $hP, $hL, $d, $aA, $i, $cP, $cantidadEscalas)
    {
        parent::__construct($nV, $pEcD, $pEjD, $hP, $hL, $d, $aA, $i, $cP);
        $this->cantidadEscalas = $cantidadEscalas;
    }

    //OBSERVADORES
    public function getCantidadEscalas()
    {
        return $this->cantidadEscalas;
    }

    //MODIFICADORES
    public function setCantidadEscalas($cantidadEscalas)
    {
        $this->cantidadEscalas = $cantidadEscalas;
    }

    public function __toString()
    {
        return parent::__toString() .
        "\n\tCantidad de escalas: " . $this->getCantidadEscalas();
    }

    public function calcularImporte($objPasajero)
    {
        $costo = parent::calcularImporte($objPasajero);
        $costo += ($costo / ($this->getCantidadEscalas() * 0.7));
        return $costo;
    }
}
