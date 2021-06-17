<?php

class Cine extends Funcion
{
    //ATRIBUTOS
    private $genero;
    private $pais_origen;

    //CONSTRUCTOR
    public function __construct()
    {
        parent::__construct();
        $this->genero = "";
        $this->pais_origen = "";
    }

    public function cargar($datosFuncion)
    {
        parent::cargar($datosFuncion);
        $this->setGenero($datosFuncion['genero']);
        $this->setPaisOrigen($datosFuncion['pais_origen']);
    }

    //OBSERVADORES
    public function getGenero()
    {
        return $this->genero;
    }

    public function getPaisOrigen()
    {
        return $this->pais_origen;
    }

    public function getMensajeOperacion()
    {
        return $this->mensaje_operacion;
    }

    //MODIFICADORES
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function setPaisOrigen($paisOrigen)
    {
        $this->pais_origen = $paisOrigen;
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
        "\n\tGenero: " . $this->getGenero() .
        "\n\tPais de origen: " . $this->getPaisOrigen();
    }

    /**
     * Retorna el costo de la funcion con el porcentaje adicional
     * @param
     * @return float $costo
     */
    public function darCostos()
    {
        $costo = parent::darCostos();
        $costo += $costo * 0.65;
        return $costo;
    }

    /********************************************************************************************************************************************************************* */

    /**
     * Recupera los datos de un cine por id
     * @param int $id_funcion
     * @return boolean $resp
     */
    public function Buscar($id_funcion)
    {
        $base = new BaseDatos();
        $consulta = "SELECT * FROM cine WHERE id_funcion = " . $id_funcion;
        $resp = false;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                if ($row2 = $base->Registro()) {
                    parent::Buscar($id_funcion);
                    $this->setGenero($row2['genero']);
                    $this->setPaisOrigen($row2['pais_origen']);
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
     * Lista todos los cines que cumplen con una condicion dada
     * @param String $condicion
     * @return Array $arregloCine
     */
    public function listar($condicion)
    {
        $arregloCine = [];
        $base = new BaseDatos();
        $consulta = "SELECT * FROM cine ";
        if ($condicion != "") {
            $consulta = $consulta . ' WHERE ' . $condicion;
        }
        $consulta .= " ORDER BY genero ";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $arregloCine = array();
                while ($row2 = $base->Registro()) {
                    $obj = new Cine();
                    $obj->Buscar($row2['id_funcion']);
                    array_push($arregloCine, $obj);
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $arregloCine;
    }

    /**
     * Inserta una instancia en la tabla cine
     * @param
     * @return boolean $resp
     */
    public function insertar()
    {
        $base = new BaseDatos();
        $resp = false;

        if (parent::insertar()) {
            $consultaInsertar = "INSERT INTO cine(id_funcion, genero, pais_origen)
				VALUES (" . parent::getIdFuncion() . ", '" . $this->getGenero() . "', '" . $this->getPaisOrigen() . "')";
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
     * Modifica una instancia en la tabla cine
     * @param
     * @return boolean $resp
     */
    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        if (parent::modificar()) {
            $consultaModifica = "UPDATE cine SET genero = '" . $this->getGenero() . "', pais_origen = '" . $this->getPaisOrigen() . "' WHERE id_funcion = " . parent::getIdFuncion();
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
     * Elimina una instancia de la tabla cine
     * @param
     * @return boolean $resp
     */
    public function eliminar($id_funcion)
    {
        $base = new BaseDatos();
        $resp = false;
        if ($base->Iniciar()) {
            $consultaBorra = "DELETE FROM cine WHERE id_funcion = " . parent::getIdFuncion();
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
