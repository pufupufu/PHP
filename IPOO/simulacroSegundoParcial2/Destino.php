<?php

class Destino
{
    //ATRIBUTOS
    private $nombreDestino;
    private $descripcion;

    //CONSTRUCTOR
    public function __construct($nombreDestino, $descripcion)
    {
        $this->nombreDestino = $nombreDestino;
        $this->descripcion = $descripcion;
    }

    //OBSERVADORES
    public function getNombreDestino()
    {
        return $this->nombreDestino;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    //MODIFICADORES
    public function setNombreDestino($nombreDestino)
    {
        $this->nombreDestino = $nombreDestino;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function __toString()
    {
        return "\t\tDestino: " . $this->getNombreDestino() .
        "\n\t\tDescripcion: " . $this->getDescripcion();
    }
}
