<?php
class Cuota
{
    //ATRIBUTOS
    private $numero;
    private $montoCuota;
    private $montoInteres;
    private $cancelada;

    //CONSTRUCTOR
    public function __construct($num, $mC, $mI, $c)
    {
        $this->numero = $num;
        $this->montoCuota = $mC;
        $this->montoInteres = $mI;
        $this->cancelada = $c;
    }

    //OBSERVADORES
    public function getNumero()
    {
        return $this->numero;
    }

    public function getMontoCuota()
    {
        return $this->montoCuota;
    }

    public function getMontoInteres()
    {
        return $this->montoInteres;
    }

    public function getCancelada()
    {
        return $this->cancelada;
    }

    //MODIFICADORES
    public function setNumero($num)
    {
        $this->numero = $num;
    }

    public function setMontoCuotas($mC)
    {
        $this->montoCuotas = $mC;
    }

    public function setMontoInteres($mI)
    {
        $this->montoInteres = $mI;
    }

    public function setCancelada($c)
    {
        $this->cancelada = $c;
    }

    public function __toString()
    {
        return "\tNumero: " . $this->getNumero() . "\n" .
        "\tMonto cuota: $" . $this->getMontoCuota() . "\n" .
        "\tMonto interes: $" . $this->getMontoInteres() . "\n" .
            "\tCancelada: " . (($this->getCancelada()) ? "Si" : "No");
    }

    public function darMontoFinalCuota()
    {
        return $this->getMontoCuota() + $this->getMontoInteres();
    }
}
