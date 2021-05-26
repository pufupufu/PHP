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

    public function __toString()
    {
        return "---------PLANES---------\n" . $this->colAString($this->getColeccionPlanes()) .
        "----------CONTRATOS----------\n" . $this->colAString($this->getColeccionContratos());
    }

    public function colAString($coleccion)
    {
        $retorno = "";
        foreach ($coleccion as $obj) {
            $retorno .= $obj . "--------------------\n";
        }
        return $retorno;
    }

    //funcion incorporarPlan
    public function incorporarPlan($objPlan)
    {
        $i = 0;
        $j = 0;
        $coleccionPlanes = $this->getColeccionPlanes();
        $coleccionCanalesNuevos = $objPlan->getColeccionCanales();
        $valido = true;

        do { //Primero verifico si no hay planes que tengan los mismos datos incluidos
            if ($objPlan->getDatosIncluidos() == $coleccionPlanes[$i]->getDatosIncluidos()) { //En caso de tener los mismos datos cambia el valor de $valido a false
                $valido = false;
            }
            $i++;
        } while ($valido && $i < count($coleccionPlanes)); //Recorre mientras que el valor de $valido sea true, y queden posiciones por recorrer en la coleccion

        //Si en la iteracion anterior el valor de $valido se modifico a false, no entra a la repetitiva
        //Si en la iteracion anterior el valor de $valido no se modifico, entonces recorre la coleccion de canales de cada plan almacenado
        while ($valido && $j < count($coleccionPlanes)) {
            $k = 0;
            $coleccionCanales = $coleccionPlanes[$j]->getColeccionCanales();
            while ($k < count($coleccionCanalesNuevos) && $k < count($coleccionCanales) && $valido) { //Itera mientras ambas colecciones puedan ser recorridas y $valido sea true
                if ($coleccionCanalesNuevos[$k]->getTipoCanal() == $coleccionCanales[$k]->getTipoCanal()) { //En caso de que los tipos de canal sean iguales se modifica el valor de $valido a false
                    $valido = false;
                }
                $k++;
            }
            $j++;
        }

        //Si se modifico el valor de $valido a false en alguna de las iteraciones anteriores, no modifica la coleccion de planes
        //Si no se modifico, hace el push del objeto a la coleccion y luego modifica la variable instancia
        if ($valido) {
            array_push($coleccionPlanes, $objPlan);
            $this->setColeccionPlanes($coleccionPlanes);
        }

        //Retorno el valor final de $valido en caso de querer saber si la incorporacion del objeto fue exitosa o no
        return $valido;
    }
}
