<?php
class TorneoProvincial extends Torneo
{
    //ATRIBUTOS
    private $provincia;

    //CONSTRUCTOR
    public function __construct($iT, $p, $cP, $l, $provincia)
    {
        parent::__construct($iT, $p, $cP, $l);
        $this->provincia = $provincia;
    }

    //OBSERVADORES
    public function getProvincia()
    {
        return $this->provincia;
    }

    //MODIFICADORES
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    //toString
    public function __toString()
    {
        return parent::__toString() .
        "\nProvincia: " . $this->getProvincia();
    }
}
