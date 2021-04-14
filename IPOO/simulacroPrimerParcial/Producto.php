<?php
class Producto
{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $incAnual;
    private $activo;

    public function __construct($cod, $cos, $aF, $desc, $iA, $act)
    {
        $this->codigo = $cod;
        $this->costo = $cos;
        $this->anioFabricacion = $aF;
        $this->descripcion = $desc;
        $this->incAnual = $iA;
        $this->activo = $act;
    }

    //OBSERVADORES
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getCosto()
    {
        return $this->costo;
    }

    public function getAnioFabricacion()
    {
        return $this->anioFabricacion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getIncAnual()
    {
        return $this->incAnual;
    }

    public function getActivo()
    {
        return $this->activo;
    }

    //MODIFICADORES
    public function setCodigo($cod)
    {
        $this->codigo = $cod;
    }

    public function setCosto($cos)
    {
        $this->costo = $cos;
    }

    public function setAnioFabricacion($aF)
    {
        $this->anioFabricacion = $aF;
    }

    public function setDescripcion($desc)
    {
        $this->descripcion = $desc;
    }

    public function setIncAnual($iA)
    {
        $this->incAnual = $iA;
    }

    public function setActivo($act)
    {
        $this->activo = $act;
    }

    public function __toString()
    {
        //String $si, $no
        $si = "Si";
        $no = "No";
        return "Codigo: " . $this->getCodigo() . "\n" .
        "Costo: $" . $this->getCosto() . "\n" .
        "Anio de fabricacion: " . $this->getAnioFabricacion() . "\n" .
        "Descripcion: " . $this->getDescripcion() . "\n" .
        "Incremento anual: " . $this->getIncAnual() . "%\n" . "Activo: " . (($this->getActivo()) ? $si : $no);
    }

    public function darPrecioVenta() {
        //float $retorno, $costo, $iA
        //int $anio
        if($this->getActivo()) {
            $costo = $this->getCosto();
            $anio = date('Y') - $this->getAnioFabricacion();
            $iA = $this->getIncAnual();
            $retorno = $costo + ($costo * $anio * ($iA / 100));
        } else {
            $retorno = -1;
        }
        return $retorno;
    }
}
