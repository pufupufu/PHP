<?php
class Cliente
{
    private $nombre;
    private $apellido;
    private $tipoDoc;
    private $numeroDoc;
    private $dadoDeBaja;

    public function __construct($n, $a, $tD, $nD, $dDB)
    {
        $this->nombre = $n;
        $this->apellido = $a;
        $this->tipoDoc = $tD;
        $this->numeroDoc = $nD;
        $this->dadoDeBaja = $dDB;
    }

    //OBSERVADORES
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }

    public function getNumeroDoc()
    {
        return $this->numeroDoc;
    }

    public function getDadoDeBaja()
    {
        return $this->dadoDeBaja;
    }

    //MODIFICADORES
    public function setNombre($n)
    {
        $this->nombre = $n;
    }

    public function setApellido($a)
    {
        $this->apellido = $a;
    }

    public function setTipoDoc($tD)
    {
        $this->tipoDoc = $tD;
    }

    public function setNumeroDoc($nD)
    {
        $this->numeroDoc = $nD;
    }

    public function setDadoDeBaja($dDB)
    {
        $this->dadoDeBaja = $dDB;
    }

    public function __toString()
    {
        $si = "Si";
        $no = "No";
        return "Nombre: " . $this->getNombre() . "\n" .
        "Apellido: " . $this->getApellido() . "\n" .
        $this->getTipoDoc() . " " . $this->getNumeroDoc() . "\n" .
            "Dado de baja: " . (($this->getDadoDeBaja()) ? $si : $no) . "\n";
    }
}
