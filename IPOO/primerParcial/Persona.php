<?php
class Persona
{
    //ATRIBUTOS
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $mail;
    private $telefono;
    private $neto;

    //CONSTRUCTOR
    public function __construct($nom, $ap, $doc, $dir, $m, $tel, $n)
    {
        $this->nombre = $nom;
        $this->apellido = $ap;
        $this->dni = $doc;
        $this->direccion = $dir;
        $this->mail = $m;
        $this->telefono = $tel;
        $this->neto = $n;
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

    public function getDni()
    {
        return $this->dni;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getNeto()
    {
        return $this->neto;
    }

    //MODIFICADORES
    public function setNombre($nom)
    {
        $this->nombre = $nom;
    }

    public function setApellido($ap)
    {
        $this->apellido = $ap;
    }

    public function setDni($doc)
    {
        $this->dni = $doc;
    }

    public function setDireccion($dir)
    {
        $this->direccion = $dir;
    }

    public function setMail($m)
    {
        $this->mail = $m;
    }

    public function setTelefono($tel)
    {
        $this->telefono = $tel;
    }

    public function setNeto($n)
    {
        $this->neto = $n;
    }

    public function __toString()
    {
        return "\tNombre: " . $this->getNombre() . "\n" .
        "\tApellido: " . $this->getApellido() . "\n" .
        "\tDNI: " . $this->getDni() . "\n" .
        "\tDireccion: " . $this->getDireccion() . "\n" .
        "\tEmail: " . $this->getMail() . "\n" .
        "\tTelefono: " . $this->getDireccion() . "\n" .
        "\tNeto: " . $this->getNeto();
    }
}
