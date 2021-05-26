<?php
class TorneoNacional extends Torneo
{
    //CONSTRUCTOR
    public function __construct($iT, $p, $cP, $l) {
        parent::__construct($iT, $p, $cP, $l);
    }

    public function obtenerPremioTorneo() {
        $premio = parent::obtenerPremioTorneo();
        $ganador = $this->obtenerEquipoGanadorTorneo();
        $premio += (($premio * 0.1) * $ganador["ganados"]);
        return $premio;
    }
}
