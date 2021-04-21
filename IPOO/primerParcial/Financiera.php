<?php
class Financiera
{
    //ATRIBUTOS
    private $denominacion;
    private $direccion;
    private $coleccionPrestamosOtorgados;

    //CONSTRUCTOR
    public function __construct($den, $dir)
    {
        $this->denominacion = $den;
        $this->direccion = $dir;
        $this->coleccionPrestamosOtorgados = [];
    }

    //OBSERVADORES
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getColeccionPrestamosOtorgados()
    {
        return $this->coleccionPrestamosOtorgados;
    }

    //MODIFICADORES
    public function setDenominacion($den)
    {
        $this->denominacion = $den;
    }

    public function setDireccion($dir)
    {
        $this->direccion = $dir;
    }

    public function setColeccionPrestamosOtorgados($pO)
    {
        $this->coleccionPrestamosOtorgados = $pO;
    }

    public function __toString()
    {
        return "Denominacion: " . $this->getDenominacion() . "\n" .
        "Direccion: " . $this->getDireccion() . "\n" .
        "----------PRESTAMOS----------\n" . $this->colPrestamosAString();
    }

    public function colPrestamosAString()
    {
        $coleccion = $this->getColeccionPrestamosOtorgados();
        $retorno = "";
        for ($i = 0; $i < count($coleccion); $i++) {
            $retorno .= $coleccion[$i] . "\n--------------------\n";
        }
        return $retorno;
    }

    public function incorporarPrestamo($nuevoPrestamo)
    {
        $coleccion = $this->getColeccionPrestamosOtorgados(); //Obtengo la coleccion de prestamos
        array_push($coleccion, $nuevoPrestamo); //Agrego el nuevo prestamo
        $this->setColeccionPrestamosOtorgados($coleccion); //Actualizo la coleccion de la instancia
    }

    public function otorgarPrestamoSiCalifica()
    {
        $coleccion = $this->getColeccionPrestamosOtorgados();
        foreach ($coleccion as $prestamo) {
            if (count($prestamo->getColeccionCuotas()) == 0) { //Verifica que aun no se haya aprobado el prestamo
                $monto = $prestamo->getMonto();
                $cantCuotas = $prestamo->getCantidadCuotas();
                $persona = $prestamo->getPersonaSolicitante();
                if (($monto / $cantCuotas) <= ($persona->getNeto() * 0.4)) { //Verifica que el valor de las cuotas no supere el 40% del neto de la persona solicitante
                    $prestamo->otorgarPrestamo();
                }
            }
        }
        $this->setColeccionPrestamosOtorgados($coleccion); //Actualizo la coleccion de prestamos luego de las modificaciones
    }

    public function informarCuotaAPagar($idPrestamo)
    {
        $retorno = null;
        $coleccion = $this->getColeccionPrestamosOtorgados();
        $posPrestamo = $this->buscarPrestamo($coleccion, $idPrestamo);
        if ($posPrestamo != -1) { //Si el prestamo buscado existe, retorna la siguiente cuota a pagar
            $retorno = $coleccion[$posPrestamo]->darSiguienteCuotaAPagar();
        }
        return $retorno;
    }

    public function buscarPrestamo($coleccion, $idPrestamo)
    {
        $retorno = -1; //Se retorna -1 en caso de que no se encuentre el id buscado
        $i = 0;
        while ($i < count($coleccion) && $retorno == -1) { //Recorro la coleccion mientras que el id no se haya encontrado y aun este dentro de la coleccion
            if ($coleccion[$i]->getIdentificacion() == $idPrestamo) { //Si los id's coinciden, se actualiza el valor de retorno
                $retorno = $i;
            }
            $i++;
        }
        return $retorno;
    }
}
