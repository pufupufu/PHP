<?php
class Canal
{
    //ATRIBUTOS
    private $tipo;
    private $importe;
    private $esHD;

    //CONSTRUCTOR
    public function __construct($tipo, $importe, $esHD)
    {
        $this->tipo = $tipo;
        $this->importe = $importe;
        $this->esHD = $esHD;
    }

    //OBSERVADORES
    public function getTipo()
    {
        return $this->tipo;
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
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    public function setEsHD($esHD)
    {
        $this->esHD = $esHD;
    }

    //METODO toString
    public function __toString()
    {
        return "Tipo: " . $this->getTipo() .
        "\nImporte: $" . $this->getImporte() .
        "\nHD: " . ($this->getEsHD()) ? "Si" : "No";
    }
}
