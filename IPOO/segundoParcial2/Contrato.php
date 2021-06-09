<?php
class Contrato
{
    //ATRIBUTOS
    private $fechaInicio;
    private $fechaVencimiento;
    private $plan;
    private $estado;
    private $costo;
    private $seRenueva;
    private $cliente;

    //CONSTRUCTOR
    public function __construct($fechaInicio, $fechaVencimiento, $plan, $estado, $costo, $seRenueva, $cliente)
    {
        $this->fechaInicio = $fechaInicio;
        $this->fechaVencimiento = $fechaVencimiento;
        $this->plan = $plan;
        $this->estado = $estado;
        $this->costo = $costo;
        $this->seRenueva = $seRenueva;
        $this->cliente = $cliente;
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

    public function getPlan()
    {
        return $this->plan;
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

    public function getCliente()
    {
        return $this->cliente;
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

    public function setPlan($plan)
    {
        $this->plan = $plan;
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

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    //METODO toString
    public function __toString()
    {
        return "Fecha inicio: " . $this->getFechaInicio() .
        "\nFecha vencimiento: " . $this->getFechaVencimiento() .
        "\n----------PLAN----------\n" . $this->getPlan() .
        "\nEstado: " . $this->getEstado() .
        "\nCosto: $" . $this->getCosto() .
        "\nSe renueva: " . ($this->getSeRenueva()) ? "Si" : "No" .
        "\n----------CLIENTE----------\n" . $this->getCliente();
    }

    //METODO actualizarEstadoContrato
    public function actualizarEstadoContrato() {
        $diasVencido = $this->diasContratoVencido();
        if($diasVencido > 10) {
            $this->setEstado("Suspendido");
            $this->setSeRenueva(false);
        } else if($diasVencido <= 10 && $diasVencido > 0) {
            $this->setEstado("Moroso");
        } else {
            $this->setEstado("Al dia");
        }
        return $diasVencido;
    }

    private function diasContratoVencido() {
        $diferencia = -1;
        $fechaActual = strtotime(date('d/m/Y'));
        $fechaVencimiento = strtotime($this->getFechaVencimiento());
        if ($fechaActual > $fechaVencimiento) {
            $diferencia = $fechaActual - $fechaVencimiento;
        } else if($fechaActual == $fechaVencimiento){
            $diferencia = 0;
        }
        return $diferencia;
    }

    //METODO calcularImporte
    public function calcularImporte() {
        $objPlan = $this->getPlan();
        $importeFinal = $objPlan->getImporte();
        $coleccionCanales = $objPlan->getColeccionCanales();
        $diasVencido = $this->actualizarEstadoContrato();
        foreach ($coleccionCanales as $objCanal) {
            $importeFinal += $objCanal->getImporte();
        }
        if($this->getEstado() == "Moroso") {
            $importeFinal += $importeFinal * 0.1 * $diasVencido;
        } else if($this->getEstado() == "Suspendido") {
            $importeFinal += $importeFinal * 0.1 * 10;
        }
        return $importeFinal;
    }
}
