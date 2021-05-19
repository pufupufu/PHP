<?php

class Nacional extends Vuelo
{
    //ATRIBUTOS
    private $costoPasaje;

    //CONSTRUCTOR
    public function __construct($nV, $pEcD, $pEjD, $hP, $hL, $d, $aA, $i, $cP)
    {
        parent::__construct($nV, $pEcD, $pEjD, $hP, $hL, $d, $aA, $i, $cP);
    }

    //OBSERVADORES
    public function getCostoPasaje()
    {
        return $this->costoPasaje;
    }

    //MODIFICADORES
    public function setCostoPasaje($costoPasaje)
    {
        $this->costoPasaje = $costoPasaje;
    }

    public function __toString()
    {
        return parent::__toString() .
        "\n\tCosto pasaje: $" . $this->getCostoPasaje();
    }
}
