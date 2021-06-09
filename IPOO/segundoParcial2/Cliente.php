<?php
class Cliente
{
    //ATRIBUTOS
    private $numeroDoc;
    private $nombre;
    private $apellido;

    //CONSTRUCTOR
    public function __construct($numeroDoc, $nombre, $apellido)
    {
        $this->numeroDoc = $numeroDoc;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    //OBSERVADORES
    public function getNumeroDoc()
    {
        return $this->numeroDoc;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    //MODIFICADORES
    public function setNumeroDoc($numeroDoc)
    {
        $this->numeroDoc = $numeroDoc;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    //METODO toString
    public function __toString()
    {
        return "Numero de documento: " . $this->getNumeroDoc() .
        "\nNombre: " . $this->getNombre() .
        "\nApellido: " . $this->getApellido();
    }
}
