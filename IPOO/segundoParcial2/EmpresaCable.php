<?php
class EmpresaCable
{
    //ATRIBUTOS
    private $coleccionPlanes;
    private $coleccionContratos;

    //CONSTRUCTOR
    public function __construct($coleccionPlanes, $coleccionContratos)
    {
        $this->coleccionPlanes = $coleccionPlanes;
        $this->coleccionContratos = $coleccionContratos;
    }

    //OBSERVADORES
    public function getColeccionPlanes()
    {
        return $this->coleccionPlanes;
    }

    public function getColeccionContratos()
    {
        return $this->coleccionContratos;
    }

    //MODIFICADORES
    public function setColeccionPlanes($coleccionPlanes)
    {
        $this->coleccionPlanes = $coleccionPlanes;
    }

    public function setColeccionContratos($coleccionContratos)
    {
        $this->coleccionContratos = $coleccionContratos;
    }

    //METODO toString
    public function __toString()
    {
        return "----------PLANES----------\n" . $this->coleccionAString($this->getColeccionPlanes()) .
        "\n----------CONTRATOS----------\n" . $this->coleccionAString($this->getColeccionContratos());
    }

    private function coleccionAString($coleccion)
    {
        $retorno = "";
        foreach ($coleccion as $obj) {
            $retorno .= $obj . "\n------------------------------\n";
        }
        return $retorno;
    }

    public function incorporarPlan($objPlan)
    {
        $coleccionPlanes = $this->getColeccionPlanes();
        $i = 0;
        $valido = true;
        while ($valido && $i < count($coleccionPlanes)) { //Primero verifico que no tengan la misma cantidad de MG
            if ($coleccionPlanes[$i]->getDatosIncluidos() == $objPlan->getDatosIncluidos()) {
                $valido = false;
            }
            $i++;
        }

        if ($valido) { //Si no se encontró uno igual empieza un recorrido mas minucioso
            $j = 0;
            while ($j < count($coleccionPlanes) && $valido) { //Recorro la coleccion de planes
                $k = 0;
                $coleccionCanales = $coleccionPlanes[$j]->getColeccionCanales();
                $coleccionNuevosCanales = $objPlan->getColeccionCanales();
                while ($k < count($coleccionCanales) && $k < count($coleccionNuevosCanales) && $valido) { //Recorro la coleccion de canales de cada uno de los planes guardados, y los comparo con los del plan nuevo
                    if ($coleccionCanales[$k] == $coleccionNuevosCanales[$k]) {
                        $valido = false;
                    }
                    $k++;
                }
                $j++;
            }
        }

        if ($valido) { //Si el nuevo plan paso correctamente por todas las verificaciones, lo guardo en la coleccion
            array_push($coleccionPlanes, $objPlan);
            $this->setColeccionPlanes($coleccionPlanes);
        }

        return $valido;
    }

    //METODO incorporarContrato
    public function incorporarContrato($objPlan, $objCliente, $fechaInicio, $fechaVencimiento, $esWeb)
    {
        $coleccionContratos = $this->getColeccionContratos();
        if ($esWeb) {
            $nuevoContrato = new ContratoWeb($fechaInicio, $fechaVencimiento, $objPlan, "Al dia", 0, true, $objCliente);
        } else {
            $nuevoContrato = new ContratoMostrador($fechaInicio, $fechaVencimiento, $objPlan, "Al dia", 0, true, $objCliente);
        }
        array_push($coleccionContratos, $nuevoContrato);
        $this->setColeccionContratos($coleccionContratos);
    }

    //METODO retornarImporteContratos
    public function retornarImporteContratos($codigoPlan)
    {
        $retorno = 0;
        $coleccionContratos = $this->getColeccionContratos();
        foreach ($coleccionContratos as $objContrato) {
            if ($objContrato->getPlan()->getCodigo() == $codigoPlan) {
                $retorno += $objContrato->calcularImporte();
            }
        }
        return $retorno;
    }

    //METODO pagarContrato
    public function pagarContrato($objContrato)
    {
        $objContrato->actualizarEstadoContrato();
        $costoContrato = $objContrato->calcularImporte();
        return $costoContrato;
    }
}
