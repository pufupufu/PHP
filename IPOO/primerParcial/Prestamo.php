<?php
class Prestamo
{
    //ATRIBUTOS
    private $identificacion;
    private $patenteVehiculo; //Nunca es utilizada. Dejo sus metodos de acceso y la variable pero nunca la utilizo
    private $fechaOtorgamiento;
    private $monto;
    private $cantidadCuotas;
    private $tazaInteres;
    private $coleccionCuotas;
    private $personaSolicitante;

    //CONSTRUCTOR
    public function __construct($id, $m, $cantC, $tazaI, $sol)
    {
        $this->identificacion = $id;
        $this->monto = $m;
        $this->cantidadCuotas = $cantC;
        $this->tazaInteres = $tazaI;
        $this->personaSolicitante = $sol;
        $this->coleccionCuotas = [];
    }

    //OBSERVADORES
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /*
    public function getPatenteVehiculo()
    {
    return $this->patenteVehiculo;
    }
    */

    public function getFechaOtorgamiento()
    {
        return $this->fechaOtorgamiento;
    }

    public function getMonto()
    {
        return $this->monto;
    }

    public function getCantidadCuotas()
    {
        return $this->cantidadCuotas;
    }

    public function getTazaInteres()
    {
        return $this->tazaInteres;
    }

    public function getColeccionCuotas()
    {
        return $this->coleccionCuotas;
    }

    public function getPersonaSolicitante()
    {
        return $this->personaSolicitante;
    }

    //MODIFICADORES
    public function setIdentificacion($id)
    {
        $this->identificacion = $id;
    }

    /*
    public function setPatenteVehiculo($pat)
    {
        $this->patenteVehiculo = $pat;
    }
    */
    public function setFechaOtorgamiento($fO)
    {
        $this->fechaOtorgamiento = $fO;
    }

    public function setMonto($m)
    {
        $this->monto = $m;
    }

    public function setCantidadCuotas($cantC)
    {
        $this->cantidadCuotas = $cantC;
    }

    public function setTazaInteres($tazaI)
    {
        $this->tazaInteres = $tazaI;
    }

    public function setColeccionCuotas($colCuotas)
    {
        $this->coleccionCuotas = $colCuotas;
    }

    public function setPersonaSolicitante($sol)
    {
        $this->personaSolicitante = $sol;
    }

    public function __toString()
    {
        return "Identificacion: " . $this->getIdentificacion() . "\n" .
        //"Patente: " . $this->getPatenteVehiculo() . "\n" .
        "Fecha otorgamiento: " . $this->getFechaOtorgamiento() . "\n" .
        "Monto: $" . $this->getMonto() . "\n" .
        "Cantidad cuotas: " . $this->getCantidadCuotas() . "\n" .
        "Taza interes: " . $this->getTazaInteres() . "\n" .
        "-------------------CUOTAS------------------\n" . $this->coleccionCuotasAString() .
        "Persona solicitante:\n" . $this->getPersonaSolicitante();
    }

    public function coleccionCuotasAString()
    {
        $coleccion = $this->getColeccionCuotas();
        $retorno = "";
        for ($i = 0; $i < count($coleccion); $i++) {
            $retorno .= $coleccion[$i] . "\n----------------------------\n";
        }
        return $retorno;
    }

    public function calcularInteresPrestamo($numCuota)
    {
        $monto = $this->getMonto();
        $cantCuotas = $this->getCantidadCuotas();
        $tazaInteres = $this->getTazaInteres();

        $interesCuota = ($monto - (($monto / $cantCuotas) * ($numCuota - 1))) * ($tazaInteres * 0.1);
        return $interesCuota;
    }

    public function otorgarPrestamo()
    {
        $colCuotas = [];
        $fecha = date('d-m-Y'); //Creo la variable $fecha con el formato (DD/MM/AAAA) y modifico la variable instacia
        $this->setFechaOtorgamiento($fecha);
        $importeCuota = $this->getMonto() / $this->getCantidadCuotas();
        for ($i = 1; $i <= $this->getCantidadCuotas(); $i++) {
            $montoInteres = $this->calcularInteresPrestamo($i);
            $cuota = new Cuota($i, $importeCuota, $montoInteres, false); //Creo una instacia de cuota y la guardo en la coleccion
            array_push($colCuotas, $cuota);
        }
        $this->setColeccionCuotas($colCuotas); //Modifico la coleccion de la instancia
    }

    public function darSiguienteCuotaAPagar()
    {
        $retorno = null;
        $cancelada = true;
        $colCuotas = $this->getColeccionCuotas();
        $i = 0;
        while ($i < count($colCuotas) && $cancelada) { //Itera mientras que las cuotas de la coleccion estén canceladas
            $cancelada = $colCuotas[$i]->getCancelada();
            if (!$cancelada) { //Si encuentra una cuota sin cancelar retorna la referencia
                $retorno = $colCuotas[$i];
            }
            $i++;
        }
        return $retorno;
    }
}
