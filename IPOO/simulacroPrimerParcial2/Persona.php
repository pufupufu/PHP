<?php
class Persona
{
    private $tipoDoc;
    private $numeroDoc;
    private $nombre;
    private $apellido;
    private $numeroContacto;

    public function __construct($tD, $nD, $n, $a, $nC)
    {
        $this->tipoDoc = $tD;
        $this->numeroDoc = $nD;
        $this->nombre = $n;
        $this->apellido = $a;
        $this->numeroContacto = $nC;
    }

    //OBSERVADORES
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }

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

    public function getNumeroContacto()
    {
        return $this->numeroContacto;
    }

    //MODIFICADORES
    public function setTipoDoc($tD)
    {
        $this->tipoDoc = $tD;
    }

    public function setNumeroDoc($nD)
    {
        $this->numeroDoc = $nD;
    }

    public function setNombre($n)
    {
        $this->nombre = $n;
    }

    public function setApellido($a)
    {
        $this->apellido = $a;
    }

    public function setNumeroContacto($nC)
    {
        $this->numeroContacto = $nC;
    }

    public function __toString()
    {
        return "Nombre: " . $this->getNombre() . "\n" .
        "Apellido: " . $this->getApellido() . "\n" .
        $this->getTipoDoc() . ": " . $this->getNumeroContacto() . "\n" .
        "Contacto: " . $this->getNumeroContacto();
    }
}