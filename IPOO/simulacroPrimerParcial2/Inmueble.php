<?php
class Inmueble
{
    //VARIABLES
    private $codigoReferencia;
    private $numeroPiso;
    private $tipoInmueble;
    private $costoMensual;
    private $inquilino;

    //CONSTRUCTOR
    public function __construct($cR, $nP, $tI, $cM, $i)
    {
        $this->codigoReferencia = $cR;
        $this->numeroPiso = $nP;
        $this->tipoInmueble = $tI;
        $this->costoMensual = $cM;
        $this->inquilino = $i;
    }

    //OBSERVADORES
    public function getCodigoReferencia()
    {
        return $this->codigoReferencia;
    }

    public function getNumeroPiso()
    {
        return $this->numeroPiso;
    }

    public function getTipoInmueble()
    {
        return $this->tipoInmueble;
    }

    public function getCostoMensual()
    {
        return $this->costoMensual;
    }

    public function getInquilino()
    {
        return $this->inquilino;
    }

    //MODIFICADORES
    public function setCodigoReferencia($cR)
    {
        $this->codigoReferencia = $cR;
    }

    public function setNumeroPiso($nP)
    {
        $this->numeroPiso = $nP;
    }

    public function setTipoInmueble($tI)
    {
        $this->tipoInmueble = $tI;
    }

    public function setCostoMensual($cM)
    {
        $this->costoMensual = $cM;
    }

    public function setInquilino($i)
    {
        $this->inquilino = $i;
    }

    public function __toString()
    {
        $disponible = "Disponible";
        return "Codigo: " . $this->getCodigoReferencia() . "\n" .
        "Piso " . $this->getNumeroPiso() . "\n" .
        "Costo mensual: $" . $this->getCostoMensual() . "\n" .
        "----------INQUILINO----------\n" . $this->getInquilino();
    }

    public function alquilarInmueble($objPersona)
    {
        $exito = false;
        if ($this->getInquilino() == null) {
            $this->setInquilino($objPersona);
            $exito = true;
        }
        return $exito;
    }
}
