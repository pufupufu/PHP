<?php
include "Tramite.php";
class Mostrador
{
    private $cola;
    private $cantidadCola;
    private $tramiteAtendido;
    private $indice;

    public function __construct($tramite)
    {
        $this->cola = [
            0 => new Tramite("", 0, 0),
            1 => new Tramite("", 0, 0),
            2 => new Tramite("", 0, 0),
            3 => new Tramite("", 0, 0),
            4 => new Tramite("", 0, 0),
            5 => new Tramite("", 0, 0),
            6 => new Tramite("", 0, 0),
            7 => new Tramite("", 0, 0),
            8 => new Tramite("", 0, 0),
            9 => new Tramite("", 0, 0),
        ];
        $this->cantidadCola = 0;
        $this->tramiteAtendido = $tramite;
        $this->indice = 0;
    }

    public function getCantidadCola()
    {
        return $this->cantidadCola;
    }

    public function getTramiteAtendido()
    {
        return $this->tramiteAtendido;
    }

    public function nuevoClienteEnCola()
    {
        //boolean $exito
        if ($this->getCantidadCola() == 10) {
            $exito = false;
        } else {
            $this->cola[$this->cantidadCola];
            $this->cantidadCola = $this->cantidadCola + 1;
            $exito = true;
        }
        return $exito;
    }

    public function pasaAMostrador()
    {
        //Tramite $tramite
        $tramite = $this->cola[$this->indice];
        $this->cantidadCola = $this->cantidadCola - 1;
        $this->indice = ($this->indice + 1) % 10;
        return $tramite;
    }

    public function atiende($unTramite)
    {
        //boolean $atiende
        if ($this->getTramiteAtendido() == $unTramite) {
            $atiende = true;
        } else {
            $atiende = false;
        }
        return $atiende;
    }

    public function __toString()
    {
        $retorno = "";
        $k = $this->indice;
        while ($k != $this->cantidadCola) {
            $retorno .= $this->cola[$k] . "\n";
            $k++;
        }
        return $retorno;
    }
}
