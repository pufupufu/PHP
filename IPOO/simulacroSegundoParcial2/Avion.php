<?php

class Avion
{
    //ATRIBUTOS
    private $numeroAvion;
    private $cantPlazasEconomicas;
    private $cantPlazasEjecutivas;

    //CONSTRUCTOR
    public function __construct($numeroAvion, $cantPlazasEconomicas, $cantPlazasEjecutivas)
    {
        $this->numeroAvion = $numeroAvion;
        $this->cantPlazasEconomicas = $cantPlazasEconomicas;
        $this->cantPlazasEjecutivas = $cantPlazasEjecutivas;
    }

    //OBSERVADORES
    public function getNumeroAvion()
    {
        return $this->numeroAvion;
    }

    public function getCantPlazasEconomicas()
    {
        return $this->cantPlazasEconomicas;
    }

    public function getCantPlazasEjecutivas()
    {
        return $this->cantPlazasEjecutivas;
    }

    //MODIFICADORES
    public function setNumeroAvion($numeroAvion)
    {
        $this->numeroAvion = $numeroAvion;
    }

    public function setCantPlazasEconomicas($cantPlazasEconomicas)
    {
        $this->cantPlazasEconomicas = $cantPlazasEconomicas;
    }

    public function setCantPlazasEjecutivas($cantPlazasEjecutivas)
    {
        $this->cantPlazasEjecutivas = $cantPlazasEjecutivas;
    }

    public function __toString()
    {
        return "\t\tNumero avion: " . $this->getNumeroAvion() .
        "\n\t\tCant. plazas economicas: " . $this->getCantPlazasEconomicas() .
        "\n\t\tCant. plazas ejecutivas: " . $this->getCantPlazasEjecutivas();
    }
}
