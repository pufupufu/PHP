<?php

class Pasajero
{
    //ATRIBUTOS
    private $numeroPasaporte;
    private $numeroDocumento;
    private $nacionalidad;
    private $nombre;
    private $apellido;

    //CONSTRUCTOR
    public function __construct($numeroPasaporte, $numeroDocumento, $nacionalidad, $nombre, $apellido)
    {
        $this->numeroPasaporte = $numeroPasaporte;
        $this->numeroDocumento = $numeroDocumento;
        $this->nacionalidad = $nacionalidad;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    //OBSERVADORES
    public function getNumeroPasaporte()
    {
        return $this->numeroPasaporte;
    }

    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    public function getNacionalidad()
    {
        return $this->nacionalidad;
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
    public function setNumeroPasaporte($numeroPasaporte)
    {
        $this->numeroPasaporte = $numeroPasaporte;
    }

    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;
    }

    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function __toString()
    {
        return "\tNumero pasaporte: " . $this->getNumeroPasaporte() .
        "\n\tNumero documento: " . $this->getNumeroDocumento() .
        "\n\tNacionalidad: " . $this->getNacionalidad() .
        "\n\tNombre: " . $this->getNombre() .
        "\n\tApellido: " . $this->getApellido();
    }
}
