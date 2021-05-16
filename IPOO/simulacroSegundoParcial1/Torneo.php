<?php
class Torneo
{
    //ATRIBUTOS
    private $coleccionPartidos;
    private $importePremio;

    //CONSTRUCTOR
    public function __construct($coleccionPartidos, $importePremio)
    {
        $this->coleccionPartidos = $coleccionPartidos;
        $this->importePremio = $importePremio;
    }

    //OBSERVADORES
    public function getColeccionPartidos()
    {
        return $this->coleccionPartidos;
    }

    public function getImportePremio()
    {
        return $this->importePremio;
    }

    //MODIFICADORES
    public function setColeccionPartidos($coleccionPartidos)
    {
        $this->coleccionPartidos = $coleccionPartidos;
    }

    public function setImportePremio($importePremio)
    {
        $this->importePremio = $importePremio;
    }

    public function __toString()
    {
        return "Partidos:\n" . $this->coleccionAString() .
        "Premio: $" . $this->getImportePremio();
    }

    public function coleccionAString()
    {
        $coleccion = $this->getColeccionPartidos();
        $retorno = "";
        for ($i = 0; $i < count($coleccion); $i++) {
            $retorno .= "\t" . $coleccion[$i] . "\n--------------------\n";
        }
        return $retorno;
    }

    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipo)
    {
        $coleccionPartidos = $this->getColeccionPartidos();
        $exito = false;
        $idPartido = count($coleccionPartidos);
        if ($objEquipo1->getCategoria() == $objEquipo2->getCategoria() && $objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores()) {
            if ($tipo == "futbol") {
                $partido = new Futbol($idPartido, $objEquipo1, $objEquipo2, $fecha, 0, 0);
                array_push($coleccionPartidos, $partido);
                $this->setColeccionPartidos($coleccionPartidos);
                $exito = true;
            } else if ($tipo == "basket") {
                $partido = new Basket($idPartido, $objEquipo1, $objEquipo2, $fecha, 0, 0, 0);
                array_push($coleccionPartidos, $partido);
                $this->setColeccionPartidos($coleccionPartidos);
                $exito = true;
            }
        }
        return $exito;
    }

    public function darGanadores($deporte)
    {
        $coleccionPartidos = $this->getColeccionPartidos();
        $coleccionGanadores = [];

        foreach ($coleccionPartidos as $objPartido) {
            if (get_class($objPartido) == $deporte) {
                $ganador = $objPartido->ganador();
                if (!is_null($ganador)) {
                    array_push($coleccionGanadores, $ganador);
                }
            }
        }
        return $coleccionGanadores;
    }

    public function calcularPremioPartido($objPartido)
    {
        $ganador = $objPartido->ganador();
        $importePremio = $this->getImportePremio();
        $retorno = [
            "equipoGanador" => null,
            "premioPartido" => 0,
        ];

        if (!is_null($ganador)) {
            $retorno = [
                "equipoGanador" => $ganador,
                "premioPartido" => $importePremio * $objPartido->coeficientePartido(),
            ];
        }
        return $retorno;
    }
}
