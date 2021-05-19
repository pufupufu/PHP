<?php

class Aerolinea
{
    //ATRIBUTOS
    private $nombreAerolinea;
    private $coleccionVuelos;
    private $coleccionPasajeros;

    //CONSTRUCTOR
    public function __construct($nombreAerolinea, $coleccionVuelos, $coleccionPasajeros)
    {
        $this->nombreAerolinea = $nombreAerolinea;
        $this->coleccionVuelos = $coleccionVuelos;
        $this->coleccionPasajeros = $coleccionPasajeros;
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

    public function getColeccionPasajeros()
    {
        return $this->coleccionPasajeros;
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

    public function setColeccionPasajeros($coleccionPasajeros)
    {
        $this->coleccionPasajeros = $coleccionPasajeros;
    }

    public function __toString()
    {
        return "Nombre: " . $this->getNombreAerolinea() . "\n" .
        "VUELOS:\n" .
        $this->colAString($this->getColeccionVuelos()) .
        "PASAJEROS:\n" .
        $this->colAString($this->getColeccionPasajeros());
    }

    public function colAString($coleccion)
    {
        $retorno = "";
        foreach ($coleccion as $obj) {
            $retorno .= $obj . "\n------------------------------\n";
        }
        return $retorno;
    }

    public function configurarVuelo($objDestino, $objAvion, $coleccion)
    {
        $horaPartida = $coleccion["partida"];
        $horaLlegada = $coleccion["hora de llegada al destino"];
        $importe = $coleccion["importe"];
        $numeroVuelo = count($this->getColeccionVuelos());
        $plazasEconomicas = $objAvion->getCantPlazasEconomicas();
        $plazasEjecutivas = $objAvion->getCantPlazasEjecutivas();
        $coleccionPasajeros = [];

        //OBS: en el enunciado nunca se especifica como diferenciar si es un vuelo internacional o nacional
        $vuelo = new Vuelo($numeroVuelo, $plazasEconomicas, $plazasEjecutivas, $horaPartida, $horaLlegada, $objDestino, $objAvion, $importe, $coleccionPasajeros);
        return $vuelo;
    }

    public function venderVuelo($numeroVuelo, $objPasajero, $clase)
    {
        $coleccionVuelos = $this->getColeccionVuelos();
        $coleccionPasajeros = $this->getColeccionPasajeros();
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
                    array_push($coleccionPasajeros, $objPasajero);
                }
            } else {
                $plazasEj = $objVuelo->getPlazasEjecutivasDisponibles();
                if ($plazasEj > 0) { //Si hay plazas disponibles modifica la cantidad y agrega el pasajero a las colecciones
                    $plazasEj--;
                    $objVuelo->setPlazasEjecutivasDisponibles($plazasEj);
                    $costo = $objVuelo->calcularImporte($objPasajero);
                    array_push($pasajerosVuelo, $objPasajero);
                    array_push($coleccionPasajeros, $objPasajero);
                }
            }
            //Actualizo las colecciones segun los cambios realizados
            $objVuelo->setColeccionPasajeros($pasajerosVuelo);
            $coleccionVuelos[$i] = $objVuelo;
            $this->setColeccionVuelos($coleccionVuelos);
            $this->setColeccionPasajeros($coleccionPasajeros);
        }
        return $costo;
    }
}
