<?php
class Musical extends Funcion
{
    //ATRIBUTOS
    private $director;
    private $cantPersonasEscena;
    private $porcentajeIncremento;

    //CONSTRUCTOR
    public function __construct($nombre, $precio, $horaInicio, $duracion, $d, $cPE)
    {
        parent::__construct($nombre, $precio, $horaInicio, $duracion);
        $this->director = $d;
        $this->cantPersonasEscena = $cPE;
        $this->porcentajeIncremento = 12;
    }

    //OBSERVADORES
    public function getDirector()
    {
        return $this->director;
    }

    public function getCantPersonasEscena()
    {
        return $this->cantPersonasEscena;
    }

    public function getPorcentajeIncremento()
    {
        return $this->porcentajeIncremento;
    }

    //MODIFICADORES
    public function setDirector($d)
    {
        $this->director = $d;
    }

    public function setCantPersonasEscena($cPE)
    {
        $this->cantPersonasEscena = $cPE;
    }

    public function setPorcentajeIncremento($pI)
    {
        $this->porcentajeIncremento = $pI;
    }

    public function __toString()
    {
        return parent::__toString() .
        "\n\tDirector: " . $this->getDirector() .
        "\n\tCantidad de personas en escena: " . $this->getCantPersonasEscena() .
        "\n\tPorcentaje de incremento: " . $this->getPorcentajeIncremento() . "%";
    }
}
