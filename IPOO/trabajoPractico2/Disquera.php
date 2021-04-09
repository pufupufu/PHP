<?php
class Disquera {
    private $duenio;
    private $horaDesde;
    private $hroaHasta;
    private $abierta;
    private $direccion;

    public function __construct($persona, $desde, $hasta, $dir, $hora) {
        $this->duenio = $persona;
        $this->horaDesde = $desde;
        $this->horaHasta = $hasta;
        $this->direccion = $dir;
    }

    public function verificarAbierta($hora) {
        //boolean $retorno
        if($hora > $this->horaDesde && $hora < $this->horaHasta) {
            $retorno = true;
        } else {
            $retorno = false;
        }
        return $retorno;
    }
}