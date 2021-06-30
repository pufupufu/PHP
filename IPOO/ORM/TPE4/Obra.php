<?php
class Obra extends Funcion
{
    //CONSTRUCTOR
    public function __construct()
    {
        parent::__construct();
    }

    public function cargar($datosFuncion)
    {
        parent::cargar($datosFuncion);
    }

    //OBSERVADORES
    public function getMensajeOperacion()
    {
        return $this->mensaje_operacion;
    }

    //MODIFICADORES
    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensaje_operacion = $mensajeOperacion;
    }

    /**
     * Metodo toString
     */
    public function __toString()
    {
        return parent::__toString();
    }

    /**
     * Retorna el costo de la funcion con el porcentaje adicional
     * @param
     * @return float $costo
     */
    public function darCostos()
    {
        $costo = parent::darCostos();
        $costo += $costo * 0.45;
    }

    /**********************************************************************************************************************************************************************/

    /**
     * Recupera los datos de un cine por id
     * @param int $id_funcion
     * @return boolean $resp
     */
    public function Buscar($id_funcion)
    {
        $base = new BaseDatos();
        $consulta = "SELECT * FROM obra WHERE id_funcion = " . $id_funcion;
        $resp = false;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                if ($row2 = $base->Registro()) {
                    parent::Buscar($id_funcion);
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
     * @param string $condicion
     * @return array $arregloObra
     */
    public function listar($condicion)
    {
        $arregloObra = [];
        $base = new BaseDatos();
        $consulta = "SELECT * FROM obra ";
        if ($condicion != "") {
            $consulta = $consulta . ' WHERE ' . $condicion;
        }
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $arregloObra = array();
                while ($row2 = $base->Registro()) {
                    $obj = new Obra();
                    $obj->Buscar($row2['id_funcion']);
                    array_push($arregloObra, $obj);
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $arregloObra;
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
            $consultaInsertar = "INSERT INTO obra(id_funcion)
				VALUES (" . parent::getIdFuncion() . ")";
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
     * Elimina una instancia de la tabla obra
     * @param
     * @return boolean $resp
     */
    public function eliminar($id_funcion)
    {
        $base = new BaseDatos();
        $resp = false;
        if ($base->Iniciar()) {
            $consultaBorra = "DELETE FROM obra WHERE id_funcion = " . parent::getIdFuncion();
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
