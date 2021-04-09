<?php
class Tramite
{
    //VARIABLES
    private $tipoTramite;
    private $horaIngreso;
    private $horaCierre;
    private $fechaIngreso;
    private $fechaCierre;

    //CONSTRUCTOR
    public function __construct($tipo, $fechaI, $fechaC)
    {
        $this->tipoTramite = $tipo;
        $this->fechaIngreso = date('r', $fechaI);
        $this->fechaCierre = date('r', $fechaC);

    }

    //OBSERVADORES
    public function getTipoTramite()
    {
        return $this->tipoTramite;
    }

    public function getHoraIngreso()
    {
        return $this->fechaIngreso;
    }

    public function getHoraCierre()
    {
        return $this->horaCierre;
    }

    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    public function getFechaCierre()
    {
        return $this->fechaCierre;
    }

    //MODIFICADORES
    public function setTipoTramite($tipo)
    {
        $this->tipoTramite = $tipo;
    }

    public function setHoraIngreso($horaI)
    {
        $this->horaIngreso = $horaI;
    }

    public function setHoraCierre($horaC)
    {
        $this->horaCierre = $horaC;
    }

    public function setFechaIngreso($fechaI)
    {
        $this->fechaIngreso = $fechaI;
    }

    public function setFechaCierre($fechaC)
    {
        $this->fechaCierre = $fechaC;
    }

    //PROPIOS DEL TIPO
    public function __toString()
    {
        return "Fecha Ingreso: " . $this->getFechaIngreso() . "\n" .
        "Fecha Cierre: " . $this->getFechaCierre() . "\n";
    }
}
