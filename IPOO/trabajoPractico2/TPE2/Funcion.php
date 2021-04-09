<?php
class Funcion
{
    //VARIABLES
    private $nombre;
    private $precio;
    private $horaInicio;
    private $duracion;

    //CONSTRUCTOR
    public function __construct($n, $p, $hI, $d)
    {
        //La duracion de la funcion es en minutos
        $this->nombre = $n;
        $this->precio = $p;
        $this->horaInicio = $hI;
        $this->duracion = $d;
    }

    //OBSERVADORES
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }

    //MODIFICADORES
    public function setNombre($n)
    {
        $this->nombre = $n;
    }

    public function setPrecio($p)
    {
        $this->precio = $p;
    }

    public function setHoraInicio($hI)
    {
        $this->horaInicio = $hI;
    }

    public function setDuracion($d)
    {
        $this->duracion = $d;
    }

    public function __toString()
    {
        return "Nombre: " . $this->getNombre() . "\nPrecio: $" . $this->getPrecio() . "\nHora inicio: " . $this->getHoraInicio() . "\nDuracion: " . $this->getDuracion();
    }

    public function horaAMinutos()
    {
        //int $i, $minutos, $prod
        //String $hI
        $i = 0;
        $minutos = 0;
        $prod = 10;
        $hI = $this->getHoraInicio();
        while ($hI[$i] != ":") {
            $minutos += (intval($hI[$i], 10)) * $prod;
            $i++;
            $prod /= 10;
        }
        $i = 3;
        $minutos *= 60;
        $prod = 10;
        while ($i != strlen($hI)) {
            $minutos += (intval($hI[$i], 10)) * $prod;
            $prod /= 10;
            $i++;
        }
        return $minutos;
    }
}
