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
        $pos = -1;
        $colInmueblesDisponibles = [];
        $colInmuebles = $this->getColInmuebles();
        for ($i = 0; $i < count($colInmuebles); $i++) {
            $inmueble = $colInmuebles[$i];
            if ($inmueble->getInquilino() == null && $inmueble->getTipoInmueble() == $tipoInmueble && $inmueble->getCostoMensual() <= $costo) {
                $colInmueblesDisponibles[count($colInmueblesDisponibles)] = $inmueble;
            }
        }
        return $colInmueblesDisponibles;
    }

    public function registrarAlquilerInmueble($objInmueble, $objPersona)
    {
        $exito = false;
        if ($this->verificarPisos($objInmueble)) {
            $colInmuebles = $this->getColInmuebles();
            $i = 0;
            while ($i < count($colInmuebles)) {
                if ($colInmuebles[$i]->getCodigoReferencia() == $objInmueble->getCodigoReferencia()) {
                    $colInmuebles[$i]->alquilarInmueble($objPersona);
                    $exito = true;
                    $i = count($colInmuebles);
                }
                $i++;
            }
        }
        return $exito;
    }

    public function verificarPisos($objInmueble)
    {

        $lleno = true;
        $coleccion = $this->darInmueblesDisponiblesParaAlquiler($objInmueble->getTipoInmueble(), $objInmueble->getCostoMensual());
        if (count($coleccion) != 0) {
            $i = 0;
            while ($coleccion[$i]->getNumeroPiso() <= ($objInmueble->getNumeroPiso() - 1) && $lleno) {
                if ($coleccion[$i]->getInquilino() == null) {
                    $lleno = false;
                }
                $i++;
            }
        } else {
            $lleno = false;
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
