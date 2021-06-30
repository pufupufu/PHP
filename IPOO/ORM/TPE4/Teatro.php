<?php
include_once 'BaseDatos.php';
class Teatro
{
    //VARIABLES
    private $id_teatro;
    private $nombre;
    private $direccion;
    private $arregloFunciones;
    private $mensaje_operacion;

    //CONSTRUCTOR
    public function __construct()
    {
        $this->id_teatro = "";
        $this->nombre = "";
        $this->direccion = "";
        $this->arregloFunciones = [];
    }

    public function cargar($id, $nombre, $direccion)
    {
        $this->setIdTeatro($id);
        $this->setNombre($nombre);
        $this->setDireccion($direccion);
    }

    //OBSERVADORES
    public function getIdTeatro()
    {
        return $this->id_teatro;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getColeccionFunciones()
    {
        $musical = new Musical();
        $cine = new Cine();
        $obra = new Obra();

        $funcionesMusical = $musical->listar("");
        $funcionesCine = $cine->listar("");
        $funcionesObra = $obra->listar("");

        $coleccionFunciones = array_merge($funcionesMusical, $funcionesCine, $funcionesObra);
        $this->setColeccionFunciones($coleccionFunciones);
        return $this->arregloFunciones;
    }

    public function getMensajeOperacion()
    {
        return $this->mensaje_operacion;
    }

    //MODIFICADORES
    public function setIdTeatro($id)
    {
        $this->id_teatro = $id;
    }

    public function setNombre($n)
    {
        $this->nombre = $n;
    }

    public function setDireccion($d)
    {
        $this->direccion = $d;
    }

    public function setColeccionFunciones($aF)
    {
        $this->arregloFunciones = $aF;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensaje_operacion = $mensajeOperacion;
    }

    /**
     * Metodo toString
     * @param
     * @return string
     */
    public function __toString()
    {
        return "ID Teatro: " . $this->getIdTeatro() . "\n" .
        "Teatro: " . $this->getNombre() . "\n" .
        "Direccion: " . $this->getDireccion() . "\n" .
        "Funciones:\n" . $this->funcionesAString();
    }

    /**
     * Retorna la coleccion de funciones en forma de cadena de caracteres
     */
    private function funcionesAString()
    {
        //Array Funcion $arreglo
        //String $retorno
        $retorno = "";
        $arreglo = $this->getColeccionFunciones();
        foreach ($arreglo as $i) {
            $retorno .= $i . "\n";
            $retorno .= "----------------------------------------------------------------------\n";
        }
        return $retorno;
    }

    public function agregarFuncion($datosFuncion, $opcion, $id_teatro)
    {
        $exito = false;
        $funcion = new Funcion();
        $coleccionFunciones = $funcion->listar("id_teatro = $id_teatro");
        $existe = false;
        $i = 0;

        while ($i < count($coleccionFunciones) && !$existe) {
            $existe = $this->validarFuncion($datosFuncion, $coleccionFunciones[$i]);
            $i++;
        }

        if (!$existe) {
            $exito = $this->crearYAgregarFuncion($datosFuncion, $opcion);
        }
        return $exito;
    }

    private function crearYAgregarFuncion($datos, $op)
    {
        $datos['id_teatro'] = $this->getIdTeatro();
        switch ($op) {
            case "cine":
                $nuevaFuncion = new Cine();
                $nuevaFuncion->cargar($datos);
                break;
            case "musical":
                $nuevaFuncion = new Musical();
                $nuevaFuncion->cargar($datos);
                break;
            case "obra":
                $nuevaFuncion = new Obra();
                $nuevaFuncion->cargar($datos);
                break;
        }
        $exito = $nuevaFuncion->insertar();
        return $exito;
    }

    private function validarFuncion($datos, $objFuncion)
    {
        $horaInicioNueva = $datos['hora_inicio'];
        $fechaNueva = $datos['fecha'];
        $duracionNueva = $datos['duracion'];
        $horaAMinutosNueva = (intval(substr($horaInicioNueva, 0, 2)) * 60) + intval(substr($horaInicioNueva, 3));
        $duracionObjCargado = $objFuncion->getDuracion();
        $fechaObjCargado = $objFuncion->getFecha();
        $horaAMinutosObjCargado = $objFuncion->horaAMinutos();
        $horaFinalNueva = $horaAMinutosNueva + $duracionNueva;
        $horaFinalObjCargado = $horaAMinutosObjCargado + $duracionObjCargado;
        $existe = false;

        $mesFechaNueva = intval(substr($fechaNueva, 5, -3));
        $mesFechaObjCargado = intval(substr($fechaObjCargado, 5, -3));
        $diaFechaNueva = intval(substr($fechaNueva, 8));
        $diaFechaObjCargado = intval(substr($fechaObjCargado, 8));
        if ($mesFechaNueva == $mesFechaObjCargado && $diaFechaNueva == $diaFechaObjCargado) {
            if (($horaAMinutosNueva <= $horaFinalObjCargado) || $horaAMinutosObjCargado > $horaFinalNueva) {
                $existe = true;
            }
        }
        return $existe;
    }

    //ORDENAMIENTO DE LAS FUNCIONES
    // public function ordenarFunciones()
    // {
    //Ordeno las funciones para que se muestren en el orden en que empiezan
    //     $sinCambio = false;
    //     $i = 0;
    //     $largo = count($this->arregloFunciones);
    //     $colFunciones = $this->getFunciones();

    //     while ($i < $largo && !$sinCambio) {
    //         $sinCambio = true;
    //         for ($j = 0; $j < $largo - $i - 1; $j++) {
    //             if (strcmp($colFunciones[$j], $colFunciones[$j + 1]) > 0) {
    //                 $aux = $colFunciones[$j];
    //                 $colFunciones[$j] = $colFunciones[$j + 1];
    //                 $colFunciones[$j + 1] = $aux;
    //                 $sinCambio = false;
    //             }
    //         }
    //         $i++;
    //     }
    //     $this->setFunciones($colFunciones);
    // }

    public function darCostos()
    {
        $arregloFunciones = $this->getColeccionFunciones();
        $costoObra = 0;
        $costoCine = 0;
        $costoMusical = 0;
        $mes = date('m/Y');
        $costoTotal = 0;
        foreach ($arregloFunciones as $objFuncion) {
            $precioFuncion = $objFuncion->darCostos();
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
        }
        $costoTotal = $costoCine + $costoMusical + $costoObra;
        return "\nCostos al " . $mes . ":" .
            "\n\tObras: $" . $costoObra .
            "\n\tCine: $" . $costoCine .
            "\n\tMusicales: $" . $costoMusical .
            "\n\tCosto total: $" . $costoTotal;
    }

    /**************************************************************************************************************************************************************************/
    /**
     * Recupera los datos de un teatro por id
     * @param int $id_funcion
     * @return boolean $resp
     */
    public function Buscar($id_teatro)
    {
        $base = new BaseDatos();
        $consultaPersona = "SELECT * FROM teatro WHERE id_teatro = " . $id_teatro;
        $resp = false;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consultaPersona)) {
                if ($row2 = $base->Registro()) {
                    $this->setIdTeatro($id_teatro);
                    $this->setNombre($row2['nombre']);
                    $this->setDireccion($row2['direccion']);
                    $resp = true;
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $resp;
    }

    /**
     * Lista los datos de todas los teatros que cumplen con una condicion
     * @param string $condicion
     * @return array $arregloTeatro
     */
    public function listar($condicion)
    {
        $arregloTeatro = [];
        $base = new BaseDatos();
        $consultaTeatro = "SELECT * FROM teatro ";
        if ($condicion != "") {
            $consultaTeatro = $consultaTeatro . ' WHERE ' . $condicion;
        }
        $consultaTeatro .= " ORDER BY nombre";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consultaTeatro)) {
                $arregloTeatro = [];
                while ($row2 = $base->Registro()) {
                    $id_teatro = $row2['id_teatro'];
                    $teatro = new Teatro();
                    $teatro->buscar($id_teatro);
                    array_push($arregloTeatro, $teatro);
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $arregloTeatro;
    }

    /**
     * Inserta una nueva instancia en la tabla teatro
     * @param
     * @return boolean $resp
     */
    public function insertar()
    {
        $base = new BaseDatos();
        $resp = false;
        $nombre = $this->getNombre();
        $direccion = $this->getDireccion();

        $consulta_insertar = "INSERT INTO teatro(nombre, direccion)
		VALUES ('{$nombre}', '{$direccion}')";

        //debbugin
        //echo "\n".$consulta_insertar."\n";
        if ($base->Iniciar()) {
            if ($id = $base->devuelveIDInsercion($consulta_insertar)) {
                $this->setIdTeatro($id);
                $resp = true;
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    /**
     * @param
     * @return boolean $resp
     */
    public function modificar($id_teatro)
    {
        $resp = false;
        $base = new BaseDatos();
        $consultaModifica = "UPDATE teatro SET nombre = '" . $this->getNombre() . "', direccion = '" . $this->getDireccion() . "' WHERE id_teatro = " . $id_teatro;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consultaModifica)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $resp;
    }

    /**
     * @param
     * @return boolean $resp
     */
    public function eliminar()
    {
        $base = new BaseDatos();
        $resp = false;
        if ($base->Iniciar()) {
            $consultaBorra = "DELETE FROM teatro WHERE id_teatro = " . $this->getIdTeatro();
            if ($base->Ejecutar($consultaBorra)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $resp;
    }
}
