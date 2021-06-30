<?php
class Torneo
{
    //ATRIBUTOS
    private $idTorneo;
    private $premio;
    private $coleccionPartidos;
    private $localidad;

    //CONSTRUCTOR
    public function __construct($idTorneo, $premio, $coleccionPartidos, $localidad)
    {
        $this->idTorneo = $idTorneo;
        $this->premio = $premio;
        $this->coleccionPartidos = $coleccionPartidos;
        $this->localidad = $localidad;
    }

    //OBSERVADORES
    public function getIdTorneo()
    {
        return $this->idTorneo;
    }

    public function getPremio()
    {
        return $this->premio;
    }

    public function getColeccionPartidos()
    {
        return $this->coleccionPartidos;
    }

    public function getLocalidad()
    {
        return $this->localidad;
    }

    //MODIFICADORES
    public function setIdTorneo($idTorneo)
    {
        $this->idTorneo = $idTorneo;
    }

    public function setPremio($premio)
    {
        $this->premio = $premio;
    }

    public function setColeccionPartidos($coleccionPartidos)
    {
        $this->coleccionPartidos = $coleccionPartidos;
    }

    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
    }

    //toString
    public function __toString()
    {
        return "Torneo: " . $this->getIdTorneo() .
        "\nPremio: $" . $this->getPremio() .
        "\n----------PARTIDOS----------\n" . $this->coleccionAString();
        "Localidad: " . $this->getLocalidad();
    }

    private function coleccionAString()
    {
        $coleccion = $this->getColeccionPartidos();
        $retorno = "";

        foreach ($coleccion as $objPartido) {
            $retorno .= $objPartido . "\n--------------------\n";
        }
        return $retorno;
    }

    //Metodo obtenerEquipoGanadorTorneo
    public function obtenerEquipoGanadorTorneo()
    {
        $coleccionGanadores = [];
        $coleccionPartidos = $this->getColeccionPartidos();

        foreach ($coleccionPartidos as $objPartido) {
            $ganador = $objPartido->ganador();
            if (!is_null($ganador)) {
                $posicionGanador = $this->buscarEquipo($ganador, $coleccionGanadores);
                $cantGoles = $objPartido->golesGanador();
                if ($posicionGanador == -1) {
                    $nuevoGanador = [
                        'equipo' => $ganador,
                        'goles' => $cantGoles,
                        'ganados' => 1,
                    ];
                    array_push($coleccionGanadores, $nuevoGanador);
                } else {
                    $goles = $coleccionGanadores[$posicionGanador]['goles'];
                    $ganados = $coleccionGanadores[$posicionGanador]['ganados'];
                    $goles += $cantGoles;
                    $ganados++;
                    $coleccionGanadores[$posicionGanador]['goles'] = $goles;
                    $coleccionGanadores[$posicionGanador]['ganados'] = $ganados;
                }
            }
        }

        $masPartidosGanados = $coleccionGanadores[0]['ganados'];
        $masGolesMetidos = $coleccionGanadores[0]['goles'];
        $ganadorTorneo = $coleccionGanadores[0]['equipo'];
        for ($i = 1; $i < count($coleccionGanadores); $i++) {
            if ($coleccionGanadores[$i]['ganados'] > $masPartidosGanados) {
                $masPartidosGanados = $coleccionGanadores[$i]['ganados'];
                $ganadorTorneo = $coleccionGanadores[$i]['equipo'];
            } else if ($coleccionGanadores[$i]['ganados'] == $masPartidosGanados) {
                if ($coleccionGanadores[$i]['goles'] >= $masGolesMetidos) {
                    $ganadorTorneo = $coleccionGanadores[$i]['equipo'];
                    $masGolesMetidos = $coleccionGanadores[$i]['goles'];
                }
            }
        }

        $arregloConGanador = [
            'ganados' => $masPartidosGanados,
            'equipo' => $ganadorTorneo,
            'goles' => $masGolesMetidos,
        ];

        return $arregloConGanador;
    }

    //Metodo auxiliar de obtenerEquipoGanadorTorneo, que recorre la coleccion de ganadores verificando si ya fue ingresado una vez el equipo
    private function buscarEquipo($objEquipo, $coleccionGanadores)
    {
        //int $j, $retorno
        //boolean $incluido
        $retorno = -1;
        $incluido = false;
        $j = 0;
        while ($j < count($coleccionGanadores) && !$incluido) {
            if ($coleccionGanadores[$j]['equipo'] == $objEquipo) {
                $incluido = true;
            } else {
                $j++;
            }
        }
        if ($incluido) {
            $retorno = $j;
        }
        return $retorno;
    }

    public function obtenerPremioTorneo()
    {
        return $this->getPremio();
    }
}
