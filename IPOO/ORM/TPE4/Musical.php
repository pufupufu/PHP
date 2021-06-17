<?php
class Musical extends Funcion
{
    //ATRIBUTOS
    private $director;
    private $cant_personas_escena;

    //CONSTRUCTOR
    public function __construct()
    {
        parent::__construct();
        $this->director = "";
        $this->cant_personas_escena = "";
    }

    public function cargar($datosFuncion)
    {
        parent::cargar($datosFuncion);
        $this->setDirector($datosFuncion['director']);
        $this->setCantPersonasEscena($datosFuncion['cant_personas_escena']);
    }

    //OBSERVADORES
    public function getDirector()
    {
        return $this->director;
    }

    public function getCantPersonasEscena()
    {
        return $this->cant_personas_escena;
    }

    public function getMensajeOperacion()
    {
        return $this->mensaje_operacion;
    }

    //MODIFICADORES
    public function setDirector($d)
    {
        $this->director = $d;
    }

    public function setCantPersonasEscena($cantPersonasEscena)
    {
        $this->cant_personas_escena = $cantPersonasEscena;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensaje_operacion = $mensajeOperacion;
    }

    /**
     * Metodo toString
     * @param
     * @return String
     */
    public function __toString()
    {
        return parent::__toString() .
        "\n\tDirector: " . $this->getDirector() .
        "\n\tCantidad de personas en escena: " . $this->getCantPersonasEscena();
    }

    /**
     * Retorna el costo de la funcion con el porcentaje adicional
     * @param
     * @return float $costo
     */
    public function darCostos()
    {
        $costo = parent::darCostos();
        $costo += $costo * 0.12;
        return $costo;
    }

    /********************************************************************************************************************************************************************* */

    /**
     * Recupera los datos de un musical por id
     * @param int $id_funcion
     * @return boolean $resp
     */
    public function Buscar($id_funcion)
    {
        $base = new BaseDatos();
        $consulta = "SELECT * FROM musical WHERE id_funcion = " . $id_funcion;
        $resp = false;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                if ($row2 = $base->Registro()) {
                    parent::Buscar($id_funcion);
                    $this->setDirector($row2['director']);
                    $this->setCantPersonasEscena($row2['cant_personas_escena']);
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
     * Lista todos los musicales que cumplen con una condicion dada
     * @param String $condicion
     * @return Array $arregloMusical
     */
    public function listar($condicion)
    {
        $arregloMusical = [];
        $base = new BaseDatos();
        $consulta = "SELECT * FROM musical ";
        if ($condicion != "") {
            $consulta = $consulta . ' WHERE ' . $condicion;
        }
        $consulta .= " ORDER BY director ";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $arregloMusical = array();
                while ($row2 = $base->Registro()) {
                    $obj = new Musical();
                    $obj->Buscar($row2['id_funcion']);
                    array_push($arregloMusical, $obj);
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $arregloMusical;
    }

    /**
     * Inserta una instancia en la tabla musical
     * @param
     * @return boolean $resp
     */
    public function insertar()
    {
        $base = new BaseDatos();
        $resp = false;

        if (parent::insertar()) {
            $consultaInsertar = "INSERT INTO musical(id_funcion, director, cant_personas_escena)
				VALUES (" . parent::getIdFuncion() . ", '" . $this->getDirector() . "', " . $this->getCantPersonasEscena() . ")";
            if ($base->Iniciar()) {
                if ($base->Ejecutar($consultaInsertar)) {
                    $resp = true;
                } else {
                    $this->setmensajeoperacion($base->getError());
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        }
        return $resp;
    }

    /**
     * Modifica una instancia en la tabla musical
     * @param
     * @return boolean $resp
     */
    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        if (parent::modificar()) {
            $consultaModifica = "UPDATE musical SET director = '" . $this->getDirector() . "', cant_personas_escena = " . $this->getCantPersonasEscena() . "WHERE id_funcion = " . parent::getIdFuncion();
            if ($base->Iniciar()) {
                if ($base->Ejecutar($consultaModifica)) {
                    $resp = true;
                } else {
                    $this->setmensajeoperacion($base->getError());
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        }
        return $resp;
    }

    /**
     * Elimina una instancia de la tabla musical
     * @param
     * @return boolean $resp
     */
    public function eliminar($id_funcion)
    {
        $base = new BaseDatos();
        $resp = false;
        if ($base->Iniciar()) {
            $consultaBorra = "DELETE FROM musical WHERE id_funcion = " . parent::getIdFuncion();
            if ($base->Ejecutar($consultaBorra)) {
                if (parent::eliminar($id_funcion)) {
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
}