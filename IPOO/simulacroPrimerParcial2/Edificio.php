<?php
class Edificio
{
    //VARIABLES
    private $direccion;
    private $colInmuebles;
    private $administrador;

    //CONSTRUCTOR
    public function __construct($d, $cI, $a)
    {
        $this->direccion = $d;
        $this->colInmuebles = $cI;
        $this->administrador = $a;
    }

    //OBSERVADORES
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getColInmuebles()
    {
        return $this->colInmuebles;
    }

    public function getAdministrador()
    {
        return $this->administrador;
    }

    //MODIFICADORES
    public function setDireccion($d)
    {
        $this->direccion = $d;
    }

    public function setColInmuebles($cI)
    {
        $this->colInmuebles = $cI;
    }

    public function setAdministrador($a)
    {
        $this->administrador = $a;
    }

    public function __toString()
    {
        return "Direccion: " . $this->getDireccion() . "\n" .
        "----------INMUEBLES----------\n" . $this->colInmueblesAsString() . "\n" .
        "----------ADMINISTRADOR----------\n" . $this->getAdministrador();
    }

    public function colInmueblesAsString()
    {
        $retorno = "";
        $coleccion = $this->getColInmuebles();
        for ($i = 0; $i < count($coleccion); $i++) {
            $retorno .= $coleccion[$i] . "\n";
            $retorno .= "------------------------------\n";
        }
        return $retorno;
    }

    public function darInmueblesDisponiblesParaAlquiler($tipoInmueble, $costo)
    {
        $colInmueblesDisponibles = [];
        $colInmuebles = $this->getColInmuebles();
        $i = 0;
        $inmueble = $colInmuebles[$i];
        while ($inmueble->getCostoMensual() <= $costo && $i < count($colInmuebles)) {
            if ($inmueble->getInquilino() == null && $inmueble->getTipoInmueble() == $tipoInmueble) {
                $colInmueblesDisponibles[count($colInmueblesDisponibles)] = $inmueble;
            }
            $i++;
            $inmueble = $colInmuebles[$i];
        }
        return $colInmueblesDisponibles;
    }

    public function registrarAlquilerInmueble($objInmueble, $objPersona)
    {
        $exito = false;
        if ($this->verificarPisos($objInmueble->getNumeroPiso() - 1)) {
            $colInmuebles = $this->getColInmuebles();
            $i = 0;
            while ($i < count($colInmuebles)) {
                if ($colInmuebles[$i]->getCodigoReferencia() == $objInmueble->getCodigoReferencia() && $colInmuebles[$i]->getInquilino() == null) {
                    $colInmuebles[$i]->setInquilino($objPersona);
                    $exito = true;
                    $i = count($colInmuebles);
                }
                $i++;
            }
        }
        return $exito;
    }

    public function verificarPisos($nroPiso)
    {
        $lleno = true;
        $coleccion = $this->getColInmuebles();
        $i = 0;
        while ($coleccion[$i]->getNumeroPiso() < $nroPiso) {
            $i++;
        }
        while ($coleccion[$i]->getNumeroPiso() == $nroPiso && $lleno) {
            if ($coleccion[$i]->getInquilino() == null) {
                $lleno = false;
            }
            $i++;
        }
        return $lleno;
    }

    public function ordenarPorPiso()
    {
        $coleccion = $this->getColInmuebles();
        $sinCambio = false;
        $i = 0;
        $largo = count($coleccion);

        while ($i < $largo && !$sinCambio) {
            $sinCambio = true;
            for ($j = 0; $j < $largo - $i - 1; $j++) {
                if ($coleccion[$j]->getNumeroPiso() > $coleccion[$j + 1]->getNumeroPiso()) {
                    $aux = $coleccion[$j];
                    $coleccion[$j] = $coleccion[$j + 1];
                    $coleccion[$j + 1] = $aux;
                    $sinCambio = false;
                }
            }
            $i++;
        }
        $this->setColInmuebles($coleccion);
    }

    public function calcularCostoEdificio()
    {
        $total = 0;
        foreach ($this->getColInmuebles() as $inmueble) {
            if ($inmueble->getInquilino() != null) {
                $total += $inmueble->getCostoMensual();
            }
        }
        return $total;
    }
}
