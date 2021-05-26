<?php
class MinisterioDeporte
{
    //ATRIBUTOS
    private $anio;
    private $coleccionTorneosNacionales;
    private $coleccionTorneosProvinciales;

    //CONSTRUCTOR
    public function __construct($anio, $coleccionTorneos)
    {
        $this->anio = $anio;
        $this->coleccionTorneos = $coleccionTorneos;
    }

    //OBSERVADORES
    public function getAnio()
    {
        return $this->anio;
    }

    public function getColeccionTorneos()
    {
        return $this->coleccionTorneos;
    }

    //MODIFICADORES
    public function setAnio($anio)
    {
        $this->anio = $anio;
    }

    public function setColeccionTorneos($coleccionTorneos)
    {
        $this->coleccionTorneos = $coleccionTorneos;
    }

    //toString
    public function __toString()
    {
        return "Anio: " . $this->getAnio() .
        "\n----------TORNEOS----------\n" . $this->coleccionAString();
    }

    //Metodo auxiliar para el toString, que retorna a la coleccion en una cadena de caracteres
    private function coleccionAString()
    {
        $coleccion = $this->getColeccionTorneos();
        $retorno = "";
        foreach ($coleccion as $objTorneo) {
            $retorno .= $objTorneo . "\n------------------------------\n";
        }
        return $retorno;
    }

    //Metodo registrarTorneo
    public function registrarTorneo($coleccionPartidos, $tipo, $arrayAsociativo)
    {
        $coleccionTorneos = $this->getColeccionTorneos();
        $idTorneo = $arrayAsociativo["idTorneo"];
        $premio = $arrayAsociativo["premio"];
        $localidad = $arrayAsociativo["localidad"];
        if ($tipo == "nacional") {
            $nuevoTorneo = new TorneoNacional($idTorneo, $premio, $coleccionPartidos, $localidad);
        } else {
            $provincia = $arrayAsociativo["provincia"];
            $nuevoTorneo = new TorneoProvincial($idTorneo, $premio, $coleccionPartidos, $localidad, $provincia);
        }
        array_push($coleccionTorneos, $nuevoTorneo);
        $this->setColeccionTorneos($coleccionTorneos);
        return $nuevoTorneo;
    }

    //Metodo otorgarPremioTorneo
    public function otorgarPremioTorneo($idTorneo)
    {
        $retorno = [];
        $i = 0;
        $existe = false;
        $coleccionTorneos = $this->getColeccionTorneos();
        do {
            $existe = ($coleccionTorneos[$i]->getIdTorneo() == $idTorneo);
            $i++;
        } while ($i < count($coleccionTorneos));

        if ($existe) {
            $premio = $coleccionTorneos[$i - 1]->obtenerPremioTorneo();
            $ganador = $coleccionTorneos[$i - 1]->obtenerEquipoGanadorTorneo();
            $retorno = [
                'ganador' => $ganador['equipo'],
                'premio' => $premio,
            ];
        }
        return $retorno;
    }
}
