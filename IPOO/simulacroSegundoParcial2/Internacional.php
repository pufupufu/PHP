<?php

class Internacional extends Vuelo
{
    //ATRIBUTOS
    private $cantidadEscalas;
    private $costoPasaje;

    //CONSTRUCTOR
    public function __construct($nV, $pEcD, $pEjD, $hP, $hL, $d, $aA, $i, $cP, $cantidadEscalas, $costoPasaje)
    {
        parent::__construct($nV, $pEcD, $pEjD, $hP, $hL, $d, $aA, $i, $cP);
        $this->cantidadEscalas = $cantidadEscalas;
        $this->costoPasaje = $costoPasaje;
    }

    //OBSERVADORES
    public function getCantidadEscalas()
    {
        return $this->cantidadEscalas;
    }

    public function getCostoPasaje()
    {
        return $this->costoPasaje;
    }

    //MODIFICADORES
    public function setCantidadEscalas($cantidadEscalas)
    {
        $this->cantidadEscalas = $cantidadEscalas;
    }

    public function setCostoPasaje($costoPasaje)
    {
        $this->costoPasaje = $costoPasaje;
    }

    public function __toString()
    {
        return parent::__toString() .
        "\n\tCantidad de escalas: " . $this->getCantidadEscalas() .
        "\n\tCosto pasaje: $" . $this->getCostoPasaje();
    }

    public function calcularImporte($objPasajero)
    {
        $costo = parent::calcularImporte($objPasajero);
        $costo += ($costo / ($this->getCantidadEscalas() * 0.7));
        return $costo;
    }
}
