<?php
class Obra extends Funcion
{
    //ATRIBUTOS
    private $porcentajeIncremento;

    //CONSTRUCTOR
    public function __construct($nombre, $precio, $horaInicio, $duracion)
    {
        parent::__construct($nombre, $precio, $horaInicio, $duracion);
        $this->porcentajeIncremento = 45;
    }

    //OBSERVADORES
    public function getPorcentajeIncremento()
    {
        return $this->porcentajeIncremento;
    }

    //MODIFICADORES
    public function setPorcentajeIncremento($pI)
    {
        $this->porcentajeIncremento = $pI;
    }

    public function __toString()
    {
        return parent::__toString() . 
        "\n\tPorcentaje de incremento: " . $this->getPorcentajeIncremento() . "%";
    }
}
