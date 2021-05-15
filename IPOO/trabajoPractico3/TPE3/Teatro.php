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
        $colFunciones = $this->getFunciones();

        //Recorre la coleccion mientras que no se encuentren funciones solapadas y aun queden funciones por verificar
        while (!$seSolapa && $i < count($colFunciones)) {
            //Si la funcion actual es diferente a la recien ingresada, verifica
            if ($f1->getNombre() != $colFunciones[$i]->getNombre()) {
                //Tomo el valor de la duracion de la funcion y convierto el string de hora (hh:mm) a minutos
                $duracion = $colFunciones[$i]->getDuracion();
                $horaFuncion = $colFunciones[$i]->horaAMinutos();
                //Obtengo el total de la hora de inicio mas los minutos de duracion
                $total = $duracion + $horaFuncion;
                //Si la hora convertida a minutos de la funcion ingresada es mayor al total de la funcion en la posicion actual, o la hora de la funcion en la posicion actual
                //es mayor a la hora convertida a minutos de la funcion ingresada + su duracion entonces no se solapan y pasa a la siguiente posicion
                if ($f1->horaAMinutos() > $total || $horaFuncion > ($f1->horaAMinutos() + $f1->getDuracion())) {
                    $seSolapa = false;
                    $i++;
                    //Sino, cambia el valor de $seSolapa y va a cortar el recorrido
                } else {
                    $seSolapa = true;
                }
                //Si la funcion actual es igual a la ingresada, pasa a la siguiente en la coleccion
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
        $colFunciones = $this->getFunciones();
        while ($i < count($colFunciones) && $pos == -1) {
            if ($colFunciones[$i]->getNombre() == $funcionBuscada) {
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
        $colFunciones = $this->getFunciones();

        while ($i < $largo && !$sinCambio) {
            $sinCambio = true;
            for ($j = 0; $j < $largo - $i - 1; $j++) {
                if ($colFunciones[$j]->horaAMinutos() > $colFunciones[$j + 1]->horaAMinutos()) {
                    $aux = $colFunciones[$j];
                    $colFunciones[$j] = $colFunciones[$j + 1];
                    $colFunciones[$j + 1] = $aux;
                    $sinCambio = false;
                }
            }
            $i++;
        }
        $this->setFunciones($colFunciones);
    }

    public function darCostos()
    {
        $arregloFunciones = $this->getFunciones();
        $costoObra = 0;
        $costoCine = 0;
        $costoMusical = 0;
        $mes = date('m/Y');
        $costoTotal = 0;
        foreach ($arregloFunciones as $objFuncion) {
            $precioFuncion = $objFuncion->getPrecio();
            $precioFuncion += ($precioFuncion * ($objFuncion->getPorcentajeIncremento()) / 100);
            switch (get_class($objFuncion)) {
                case "Obra":
                    $costoObra += $precioFuncion;
                    break;
                case "Cine":
                    $costoCine += $precioFuncion;
                    break;
                case "Musical":
                    $costoMusical += $precioFuncion;
                    break;
            }
            $costoTotal = $costoCine + $costoMusical + $costoObra;
        }
        return "Costos al " . $mes . ":" . 
        "\n\tObras: $" . $costoObra .
        "\n\tCine: $" . $costoCine .
        "\n\tMusicales: $" . $costoMusical . 
        "\n\tCosto total: $" . $costoTotal;
    }
}
