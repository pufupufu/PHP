<?php
include_once 'Teatro.php';
class Funcion
{
    //VARIABLES
    private $id_funcion;
    private $nombre;
    private $precio;
    private $fecha;
    private $hora_inicio;
    private $duracion;
    private $obj_teatro;
    private $mensaje_operacion;

    //CONSTRUCTOR
    public function __construct()
    {
        //La duracion de la funcion es en minutos
        $this->id_funcion = 0;
        $this->nombre = "";
        $this->precio = "";
        $this->fecha = "";
        $this->hora_inicio = "";
        $this->duracion = "";
        $this->obj_teatro = null;
    }

    public function cargar($datosFuncion)
    {
        $this->setIdFuncion($datosFuncion['id_funcion']);
        $this->setNombre($datosFuncion['nombre']);
        $this->setPrecio($datosFuncion['precio']);
        $this->setFecha($datosFuncion['fecha']);
        $this->setHoraInicio($datosFuncion['hora_inicio']);
        $this->setDuracion($datosFuncion['duracion']);
        $this->setObjTeatro($datosFuncion['obj_teatro']);
    }

    //OBSERVADORES
    public function getIdFuncion()
    {
        return $this->id_funcion;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getHoraInicio()
    {
        return $this->hora_inicio;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }

    public function getObjTeatro()
    {
        return $this->obj_teatro;
    }

    public function getMensajeOperacion()
    {
        return $this->mensaje_operacion;
    }

    //MODIFICADORES
    public function setIdFuncion($idFuncion)
    {
        $this->id_funcion = $idFuncion;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setHoraInicio($horaInicio)
    {
        $this->hora_inicio = $horaInicio;
    }

    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }

    public function setObjTeatro($idTeatro)
    {
        $this->obj_teatro = $idTeatro;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensaje_operacion = $mensajeOperacion;
    }

    public function __toString()
    {
        return "\tID Funcion: " . $this->getIdFuncion() .
        "\n\tNombre: " . $this->getNombre() .
        "\n\tPrecio: $" . $this->getPrecio() .
        "\n\tHora funcion: " . $this->getHoraInicio() .
        "\n\tDuracion: " . $this->getDuracion() . " minutos";
    }

    public function horaAMinutos()
    {
        $horario = $this->getHoraInicio();
        $minutos = intval(substr($horario, 0, 2)) * 60;
        $minutos += intval(substr($horario, 3));
        return $minutos;
    }

    public function calcularHoraFinal()
    {
        $horaFin = $this->horaAMinutos() + $this->getDuracion();
        $horas = (int) ($horaFin / 60);
        $minutos = $horaFin % 60;
        $horas %= 24;
        if ($horas < 10) {
            $horas = "0" . $horas;
        }
        if ($minutos < 10) {
            $minutos = "0" . $minutos;
        }
        $retorno = $horas . ":" . $minutos;
        return $retorno;
    }

    public function darCostos()
    {
        return $this->getPrecio();
    }

    /************************************************************************************************************************************************************************* */
    /**
     * Recupera los datos de una funcion por id
     * @param int $id_funcion
     * @return boolean $resp
     */
    public function Buscar($id_funcion)
    {
        $base = new BaseDatos();
        $consultaPersona = "SELECT * FROM funcion WHERE id_funcion = " . $id_funcion;
        $resp = false;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consultaPersona)) {
                if ($row2 = $base->Registro()) {
                    $obj_teatro = new Teatro();
                    $obj_teatro->Buscar($row2['id_teatro']);
                    $this->setIdFuncion($id_funcion);
                    $this->setNombre($row2['nombre']);
                    $this->setPrecio($row2['precio']);
                    $this->setFecha($row2['fecha']);
                    $this->setHoraInicio($row2['hora_inicio']);
                    $this->setDuracion($row2['duracion']);
                    $this->setObjTeatro($obj_teatro);
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
     * Lista los datos de todas las funciones que cumplen con una condicion
     * @param String $condicion
     * @return Array $arregloFuncion
     */
    public function listar($condicion)
    {
        $arregloFuncion = [];
        $base = new BaseDatos();
        $consultaFunciones = "SELECT * FROM funcion ";
        if ($condicion != "") {
            $consultaFunciones = $consultaFunciones . ' WHERE ' . $condicion;
        }
        $consultaFunciones .= " ORDER BY nombre";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consultaFunciones)) {
                $arregloFuncion = array();
                while ($row2 = $base->Registro()) {
                    $funcion = new Funcion();
                    $funcion->Buscar($row2['id_funcion']);
                    array_push($arregloFuncion, $funcion);
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $arregloFuncion;
    }

    /**
     * Inserta una nueva instancia en la tabla funcion
     * @param
     * @return boolean $resp
     */
    public function insertar()
    {
        $base = new BaseDatos();
        $resp = false;
        $nombre = $this->getNombre();
        $precio = $this->getPrecio();
        $fecha = $this->getFecha();
        $hora = $this->getHoraInicio();
        $duracion = $this->getDuracion();
        $id_teatro = $this->getObjTeatro()->getIdTeatro();

        $consulta_insertar = "INSERT INTO funcion(nombre, precio, fecha, hora_inicio, duracion, id_teatro)
		VALUES ('$nombre', $precio, '$fecha', '$hora', $duracion, $id_teatro)";

        //debbugin
        //echo "\n".$consulta_insertar."\n";
        if ($base->Iniciar()) {
            if ($id = $base->devuelveIDInsercion($consulta_insertar)) {
                $this->setIdFuncion($id);
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
    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $consultaModifica = "UPDATE funcion SET nombre = '" . $this->getNombre() . "', precio = " . $this->getPrecio() . ", fecha = '" . $this->getFecha() . "', hora_inicio = '" . $this->getHoraInicio() .
        "', duracion = " . $this->getDuracion() . " WHERE id_funcion = " . $this->getIdFuncion();
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
    public function eliminar($id_funcion)
    {
        $base = new BaseDatos();
        $resp = false;
        if ($base->Iniciar()) {
            $consultaBorra = "DELETE FROM funcion WHERE id_funcion = " . $id_funcion;
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
