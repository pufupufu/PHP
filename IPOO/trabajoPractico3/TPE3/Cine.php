<?php

class Cine extends Funcion
{
    //ATRIBUTOS
    private $genero;
    private $paisOrigen;
    private $porcentajeIncremento;

    //CONSTRUCTOR
    public function __construct($nombre, $precio, $horaInicio, $duracion, $g, $pO)
    {
        parent::__construct($nombre, $precio, $horaInicio, $duracion);
        $this->genero = $g;
        $this->paisOrigen = $pO;
        $this->porcentajeIncremento = 65;
    }

    //OBSERVADORES
    public function getGenero()
    {
        return $this->genero;
    }

    public function getPaisOrigen()
    {
        return $this->paisOrigen;
    }

    public function getPorcentajeIncremento() {
        return $this->porcentajeIncremento;
    }

    //MODIFICADORES
    public function setGenero($g)
    {
        $this->genero = $g;
    }

    public function setPaisOrigen($pO)
    {
        $this->paisOrigen = $pO;
    }

    public function setPorcentajeIncremento($pI) {
        $this->porcentajeIncremento = $pI;
    }

    public function __toString() {
        return parent::__toString() . 
        "\n\tGenero: " . $this->getGenero() .
        "\n\tPais de origen: " . $this->getPaisOrigen() . "\n" .
        "\n\tPorcentaje de incremento: " . $this->getPorcentajeIncremento() . "%";
    }
}
