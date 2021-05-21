<?php

class Aerolinea
{
    //ATRIBUTOS
    private $nombreAerolinea;
    private $coleccionVuelos;

    //CONSTRUCTOR
    public function __construct($nombreAerolinea, $coleccionVuelos)
    {
        $this->nombreAerolinea = $nombreAerolinea;
        $this->coleccionVuelos = $coleccionVuelos;
    }

    //OBSERVADORES
    public function getNombreAerolinea()
    {
        return $this->nombreAerolinea;
    }

    public function getColeccionVuelos()
    {
        return $this->coleccionVuelos;
    }

    //MODIFICADORES
    public function setNombreAerolinea($nombreAerolinea)
    {
        $this->nombreAerolinea = $nombreAerolinea;
    }

    public function setColeccionVuelos($coleccionVuelos)
    {
        $this->coleccionVuelos = $coleccionVuelos;
    }

    public function __toString()
    {
        return "Nombre: " . $this->getNombreAerolinea() . "\n" .
        "VUELOS:\n" .
        $this->colAString($this->getColeccionVuelos());
    }

    public function colAString($coleccion)
    {
        $retorno = "";
        foreach ($coleccion as $obj) {
            $retorno .= $obj . "\n------------------------------\n";
        }
        return $retorno;
    }

    public function configurarVuelo($objDestino, $objAvion, $coleccion, $tipoVuelo)
    {
        $horaPartida = $coleccion["partida"];
        $horaLlegada = $coleccion["hora de llegada al destino"];
        $importe = $coleccion["importe"];
        $numeroVuelo = count($this->getColeccionVuelos());
        $plazasEconomicas = $objAvion->getCantPlazasEconomicas();
        $plazasEjecutivas = $objAvion->getCantPlazasEjecutivas();
        $coleccionPasajeros = [];

        if ($tipoVuelo == "Internacional") {
            $vuelo = new Internacional($numeroVuelo, $plazasEconomicas, $plazasEjecutivas, $horaPartida, $horaLlegada, $objDestino, $objAvion, $importe, $coleccionPasajeros, 0);
        } else {
            $vuelo = new Nacional($numeroVuelo, $plazasEconomicas, $plazasEjecutivas, $horaPartida, $horaLlegada, $objDestino, $objAvion, $importe, $coleccionPasajeros);
        }
        return $vuelo;
    }

    public function venderVuelo($numeroVuelo, $objPasajero, $clase)
    {
        $coleccionVuelos = $this->getColeccionVuelos();
        $encontrado = false;
        $i = -1;
        $costo = -1; //En caso de que no se pueda vender el vuelo, retorna -1
        do { //Verifico si existe el numero de vuelo ingresado
            $i++;
            if ($coleccionVuelos[$i]->getNumeroVuelo() == $numeroVuelo) {
                $encontrado = true;
            }
        } while (!$encontrado && $i < count($coleccionVuelos));

        if ($encontrado) { //Si existe asigno el vuelo a una variable
            $objVuelo = $coleccionVuelos[$i];
            $pasajerosVuelo = $objVuelo->getColeccionPasajeros();
            if ($clase == "Economica") { //Si la clase es economica verifico que queden plazas disponibles
                $plazasEc = $objVuelo->getPlazasEconomicasDisponibles();
                if ($plazasEc > 0) { //Si hay plazas disponibles modifica la cantidad y agrega el pasajero a las colecciones
                    $plazasEc--;
                    $objVuelo->setPlazasEconomicasDisponibles($plazasEc);
                    $costo = $objVuelo->calcularImporte($objPasajero);
                    array_push($pasajerosVuelo, $objPasajero);
                }
            } else {
                $plazasEj = $objVuelo->getPlazasEjecutivasDisponibles();
                if ($plazasEj > 0) { //Si hay plazas disponibles modifica la cantidad y agrega el pasajero a las colecciones
                    $plazasEj--;
                    $objVuelo->setPlazasEjecutivasDisponibles($plazasEj);
                    $costo = $objVuelo->calcularImporte($objPasajero);
                    array_push($pasajerosVuelo, $objPasajero);
                }
            }
            //Actualizo las colecciones segun los cambios realizados
            $objVuelo->setColeccionPasajeros($pasajerosVuelo);
            $coleccionVuelos[$i] = $objVuelo;
            $this->setColeccionVuelos($coleccionVuelos);
        }
        return $costo;
    }
}
