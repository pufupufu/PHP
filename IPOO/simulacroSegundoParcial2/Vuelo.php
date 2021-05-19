<?php

class Vuelo
{
    //ATRIBUTOS
    private $numeroVuelo;
    private $plazasEconomicasDisponibles;
    private $plazasEjecutivasDisponibles;
    private $horaPartida;
    private $horaLlegada;
    private $destino; //Referencia a un objeto de clase Destino
    private $avionAsignado; //Referencia a un objeto de clase Avion
    private $importe;
    private $coleccionPasajeros;

    //CONSTRUCTOR
    public function __construct($numeroVuelo, $plazasEconomicasDisponibles, $plazasEjecutivasDisponibles, $horaPartida, $horaLlegada, $destino, $avionAsignado, $importe, $coleccionPasajeros)
    {
        $this->numeroVuelo = $numeroVuelo;
        $this->plazasEconomicasDisponibles = $plazasEconomicasDisponibles;
        $this->plazasEjecutivasDisponibles = $plazasEjecutivasDisponibles;
        $this->horaPartida = $horaPartida;
        $this->horaLlegada = $horaLlegada;
        $this->destino = $destino;
        $this->avionAsignado = $avionAsignado;
        $this->importe = $importe;
        $this->coleccionPasajeros = $coleccionPasajeros;
    }

    //OBSERVADORES
    public function getNumeroVuelo()
    {
        return $this->numeroVuelo;
    }

    public function getPlazasEconomicasDisponibles()
    {
        return $this->plazasEconomicasDisponibles;
    }

    public function getPlazasEjecutivasDisponibles()
    {
        return $this->plazasEjecutivasDisponibles;
    }

    public function getHoraPartida()
    {
        return $this->horaPartida;
    }

    public function getHoraLlegada()
    {
        return $this->horaLlegada;
    }

    public function getDestino()
    {
        return $this->destino;
    }

    public function getAvionAsignado()
    {
        return $this->avionAsignado;
    }

    public function getImporte()
    {
        return $this->importe;
    }

    public function getColeccionPasajeros()
    {
        return $this->coleccionPasajeros;
    }

    //MODIFICADORES
    public function setNumeroVuelo($numeroVuelo)
    {
        $this->numeroVuelo = $numeroVuelo;
    }

    public function setPlazasEconomicasDisponibles($plazasEconomicasDisponibles)
    {
        $this->plazasEconomicasDisponibles = $plazasEconomicasDisponibles;
    }

    public function setPlazasEjecutivasDisponibles($plazasEjecutivasDisponibles)
    {
        $this->plazasEjecutivasDisponibles = $plazasEjecutivasDisponibles;
    }

    public function setHoraPartida($horaPartida)
    {
        $this->horaPartida = $horaPartida;
    }

    public function setHoraLlegada($horaLlegada)
    {
        $this->horaLlegada = $horaLlegada;
    }

    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    public function setAvionAsignado($avionAsignado)
    {
        $this->avionAsignado = $avionAsignado;
    }

    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    public function setColeccionPasajeros($coleccionPasajeros)
    {
        $this->coleccionPasajeros = $coleccionPasajeros;
    }

    public function __toString()
    {
        return "\tNumero vuelo: " . $this->getNumeroVuelo() .
        "\n\tPlazas economicas disponibles: " . $this->getPlazasEconomicasDisponibles() .
        "\n\tPlazas ejecutivas disponibles: " . $this->getPlazasEjecutivasDisponibles() .
        "\n\tHora partida: " . $this->getHoraPartida() .
        "\n\tHora llegada: " . $this->getHoraLlegada() .
        "\n\tDESTINO:\n" . $this->getDestino() .
        "\n\tAVION:\n" . $this->getAvionAsignado() .
        "\n\tImporte: $" . $this->getImporte() .
        "\n\tPASAJEROS:\n" . $this->colAString();
    }

    public function colAString()
    {
        $coleccion = $this->getColeccionPasajeros();
        $retorno = "\t";

        foreach ($coleccion as $pasajero) {
            $retorno .= $pasajero . "\n------------------------------\n\t";
        }
        return $retorno;
    }

    public function calcularImporte($objPasajero)
    {
        $costo = $this->getImporte();
        $nacionalidad = $objPasajero->getNacionalidad();
        if ($nacionalidad == "Argentina") {
            $costo += $this->getImporte() * 0.21;
        }
        return $costo;
    }
}
