<?php
class Teatro
{
    //VARIABLES
    private $nombre;
    private $direccion;
    private $arregloFunciones;

    //CONSTRUCTOR
    public function __construct($n, $d)
    {
        $this->nombre = $n;
        $this->direccion = $d;
        $this->arregloFunciones = [];
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getFunciones()
    {
        return $this->arregloFunciones;
    }

    public function setNombre($n)
    {
        $this->nombre = $n;
    }

    public function setDireccion($d)
    {
        $this->direccion = $d;
    }

    public function setFunciones($aF)
    {
        $this->arregloFunciones = $aF;
    }

    public function __toString()
    {
        return "Teatro: " . $this->getNombre() . "\n" .
        "Direccion: " . $this->getDireccion() . "\n" .
        "Funciones:\n" . $this->funcionesAString();
    }

    private function funcionesAString()
    {
        //Array Funcion $arreglo
        //String $retorno
        $retorno = "";
        $arreglo = $this->getFunciones();
        foreach ($arreglo as $i) {
            $retorno .= $i . "\n";
            $retorno .= "----------------------------------------------------------------------\n";
        }
        return $retorno;
    }

    public function seSolapan($f1)
    {
        $seSolapa = false;
        $i = 0;

        while (!$seSolapa && $i < count($this->arregloFunciones)) {
            if ($f1->getNombre() != $this->arregloFunciones[$i]->getNombre()) {
                $duracion = $this->arregloFunciones[$i]->getDuracion();
                $horaFuncion = $this->arregloFunciones[$i]->horaAMinutos();
                $total = $duracion + $horaFuncion;
                if ($f1->horaAMinutos() > $total || $horaFuncion > ($f1->horaAMinutos() + $f1->getDuracion())) {
                    $seSolapa = false;
                    $i++;
                } else {
                    $seSolapa = true;
                }
            } else {
                $i++;
            }
        }
        return $seSolapa;
    }

    public function existeFuncion($funcionBuscada)
    { //Recibe por parametro el nombre de la funcion que se busca
        //int $pos, $i
        $pos = -1;
        $i = 0;
        while ($i < count($this->arregloFunciones) && $pos == -1) {
            if ($this->arregloFunciones[$i]->getNombre() == $funcionBuscada) {
                $pos = $i;
            } else {
                $i++;
            }
        }
        return $pos;
    }

    //ORDENAMIENTO DE LAS FUNCIONES
    public function ordenarFunciones()
    {
        //Ordeno las funciones para que se muestren en el orden en que empiezan
        //int $largo, $i, $j
        //Funcion $aux
        //boolean $sinCambio
        $sinCambio = false;
        $i = 0;
        $largo = count($this->arregloFunciones);

        while($i < $largo && !$sinCambio) {
            $sinCambio = true;
            for ($j=0; $j < $largo - $i - 1; $j++) { 
                if($this->arregloFunciones[$j]->horaAMinutos() > $this->arregloFunciones[$j + 1]->horaAMinutos()) {
                    $aux = $this->arregloFunciones[$j];
                    $this->arregloFunciones[$j] = $this->arregloFunciones[$j + 1];
                    $this->arregloFunciones[$j + 1] = $aux;
                    $sinCambio = false;
                }
            }
            $i++;
        }
    }
}
