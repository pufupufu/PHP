<?php
class Partido
{
    //ATRIBUTOS
    private $idPartido;
    private $equipo1;
    private $equipo2;
    private $fecha;
    private $cantGolesE1;
    private $cantGolesE2;

    //CONSTRUCTOR
    public function __construct($idPartido, $equipo1, $equipo2, $fecha, $cantGolesE1, $cantGolesE2)
    {
        $this->idPartido = $idPartido;
        $this->equipo1 = $equipo1;
        $this->equipo2 = $equipo2;
        $this->fecha = $fecha;
        $this->cantGolesE1 = $cantGolesE1;
        $this->cantGolesE2 = $cantGolesE2;
    }

    //OBSERVADORES
    public function getIdPartido()
    {
        return $this->idPartido;
    }

    public function getEquipo1()
    {
        return $this->equipo1;
    }

    public function getEquipo2()
    {
        return $this->equipo2;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getCantGolesE1()
    {
        return $this->cantGolesE1;
    }

    public function getCantGolesE2()
    {
        return $this->cantGolesE2;
    }

    //MODIFICADORES
    public function setIdPartido($idPartido)
    {
        $this->idPartido = $idPartido;
    }

    public function setEquipo1($equipo1)
    {
        $this->equipo1 = $equipo1;
    }

    public function setEquipo2($equipo2)
    {
        $this->equipo2 = $equipo2;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setCantGolesE1($cantGolesE1)
    {
        $this->cantGolesE1 = $cantGolesE1;
    }

    public function setCantGolesE2($cantGolesE2)
    {
        $this->cantGolesE2 = $cantGolesE2;
    }

    public function __toString()
    {
        return "Partido: " . $this->getIdPartido() . "\n" .
        "Fecha: " . $this->getFecha() . "\n" .
        "Resultado: " . $this->getEquipo1()->getNombre() . " " . $this->getCantGolesE1() . " - " . $this->getCantGolesE2() . " " . $this->getEquipo2()->getNombre();
    }

    public function ganador()
    {
        $equipoGanador = null;
        $golesE1 = $this->getCantGolesE1();
        $golesE2 = $this->getCantGolesE2();

        if ($golesE1 > $golesE2) {
            $equipoGanador = $this->getEquipo1();
        } else if ($golesE2 > $golesE1) {
            $equipoGanador = $this->getEquipo2();
        }
        return $equipoGanador;
    }

    public function golesGanador() {
        //En este if no considero la posibilidad del empate ya que invoco al metodo solo cuando tengo un ganador en Torneo->obtenerEquipoGanadorTorneo()
        if($this->getCantGolesE1() > $this->getCantGolesE2()) {
            $retorno = $this->getCantGolesE1();
        } else {
            $retorno = $this->getCantGolesE2();
        }
        return $retorno;
    }
}
