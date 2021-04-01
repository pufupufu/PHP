<?php
class Persona {
    private $nombre;
    private $apellido;
    private $tipoDoc;
    private $dni;

    public function __construct($nom, $ap, $tDoc, $doc) {
        $this->nombre = $nom;
        $this->apellido = $ap;
        $this->tipoDoc = $tDoc;
        $this->dni = $doc;
    }

    //OBSERVADORES
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getTipoDoc() {
        return $this->tipoDoc;
    }

    public function getDni() {
        return $this->dni;
    }

    //MODIFICADORES
    public function setNombre($nom) {
        $this->nombre = $nom;
    }

    public function setApellido($ap) {
        $this->apellido = $ap;
    }

    public function setTipoDoc($tDoc) {
        $this->tipoDoc = $tDoc;
    }

    public function setDni($doc) {
        $this->dni = $doc;
    }

    public function __toString() {
        return "Nombre: " . $this->nombre . "\n" . 
        "Apellido: " . $this->apellido . "\n" . 
        $this->tipoDoc . " " . $this->dni;
    }
}