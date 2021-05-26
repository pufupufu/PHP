<?php
class Canal
{
    //ATRIBUTOS
    private $tipoCanal;
    private $importe;
    private $esHD;

    //CONSTRUCTOR
    public function __construct($tipoCanal, $importe, $esHD)
    {
        $this->tipoCanal = $tipoCanal;
        $this->importe = $importe;
        $this->esHD = $esHD;
    }

    //OBSERVADORES
    public function getTipoCanal()
    {
        return $this->tipoCanal;
    }

    public function getImporte()
    {
        return $this->importe;
    }

    public function getEsHD()
    {
        return $this->esHD;
    }

    //MODIFICADORES
    public function setTipoCanal($tipoCanal)
    {
        $this->tipoCanal = $tipoCanal;
    }

    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    public function setEsHD($esHD)
    {
        $this->esHD = $esHD;
    }

    public function __toString() {
        return "Tipo: " . $this->getTipoCanal() .
        "\nImporte: $" . $this->getImporte() .
        "\nHD: " . ($this->getEsHD()) ? "Si" : "No";
    }
}
