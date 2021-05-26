<?php
class Plan
{
    //ATRIBUTOS
    private $codigo;
    private $coleccionCanales;
    private $importe;
    private $datosIncluidos;

    //CONSTRUCTOR
    public function __construct($codigo, $coleccionCanales, $importe)
    {
        $this->codigo = $codigo;
        $this->colCanales = $coleccionCanales;
        $this->importe = $importe;
        $this->datosIncluidos = 50;
    }

    //OBSERVADORES
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getColeccionCanales()
    {
        return $this->coleccionCanales;
    }

    public function getImporte()
    {
        return $this->importe;
    }

    public function getDatosIncluidos()
    {
        return $this->datosIncluidos;
    }

    //MODIFICADORES
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setColeccionCanales($coleccionCanales) {
        $this->coleccionCanales = $coleccionCanales;
    }

    public function setImporte($importe) {
        $this->importe = $importe;
    }

    public function setDatosIncluidos($datosIncluidos) {
        $this->datosIncluidos = $datosIncluidos;
    }

    public function __toString()
    {
        return "Codigo: " . $this->getCodigo() .
        "\n----------CANALES----------\n" . $this->colAString() .
        "Importe: $" . $this->getImporte() .
        "\nDatos incluidos: " . $this->getDatosIncluidos() . " MG";
    }

    public function colAString() {
        $retorno = "";
        $coleccion = $this->getColeccionCanales();
        foreach ($coleccion as $objCanal) {
            $retorno .= $objCanal . "--------------------\n";
        }
        return $retorno;
    }
}
