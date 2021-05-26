<?php
class Contrato
{
    //ATRIBUTOS
    private $fechaInicio;
    private $fechaVencimiento;
    private $objPlan;
    private $estado;
    private $costo;
    private $seRenueva;
    private $objCliente;

    //CONSTRUCTOR
    public function __construct($fechaInicio, $fechaVencimiento, $objPlan, $estado, $costo, $seRenueva, $objCliente)
    {
        $this->fechaInicio = $fechaInicio;
        $this->fechaVencimiento = $fechaVencimiento;
        $this->objPlan = $objPlan;
        $this->estado = $estado;
        $this->costo = $costo;
        $this->seRenueva = $seRenueva;
        $this->objCliente = $objCliente;
    }

    //OBSERVADORES
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    public function getObjPlan()
    {
        return $this->objPlan;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getCosto()
    {
        return $this->costo;
    }

    public function getSeRenueva()
    {
        return $this->seRenueva;
    }

    public function getObjCliente()
    {
        return $this->objCliente;
    }

    //MODIFICADORES
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }

    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;
    }

    public function setObjPlan($objPlan)
    {
        $this->objPlan = $objPlan;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    public function setSeRenueva($seRenueva)
    {
        $this->seRenueva = $seRenueva;
    }

    public function setObjCliente($objCliente)
    {
        $this->objCliente = $objCliente;
    }

    public function __toString()
    {
        return "Fecha inicio: " . $this->getFechaInicio() .
        "\nFecha vencimiento: " . $this->getFechaVencimiento() .
        "\nPlan: " . $this->getObjPlan() .
        "\nEstado: " . $this->getEstado() .
        "\nCosto: $" . $this->getCosto() .
        "\nSe renueva: " . ($this->getSeRenueva()) ? "Si" : "No" .
        "\nCliente: \n" . $this->getObjCliente();
    }

    public function actualizarEstadoContrato()
    {
        $fechaActual = date('d-m-Y');
        $dias = $this->diasContratoVencido($fechaActual);

        if ($dias > 0 && $dias <= 10) {
            $this->setEstado("moroso");
        } else if ($dias > 10) {
            $this->setEstado("suspendido");
        } else {
            $this->setEstado("al dia");
        }
    }

    public function diasContratoVencido($fechaActual)
    {
        $fechaContrato = $this->getFechaVencimiento();
        $dias = (strtotime($fechaActual) - strtotime($fechaContrato)) / 86400;
        $dias = floor($dias);
        return $dias;
    }

    //funcion calcularImporte
    public function calcularImporte()
    {
        $importeFinal = 0;
        $coleccionCanales = $this->getObjPlan()->getColeccionCanales();

        foreach ($coleccionCanales as $objCanal) {
            $importeFinal += $objCanal->getImporte();
        }
        $importeFinal += $this->getObjPlan()->getImporte();
        return $importeFinal;
    }
}
