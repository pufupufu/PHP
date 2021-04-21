<?php
class Tienda
{
    //ATRIBUTOS
    private $nombre;
    private $direccion;
    private $telefono;
    private $colProductos;
    private $colVentasRealizadas;

    //CONSTRUCTOR
    public function __construct($n, $d, $t, $cP, $cVR)
    {
        $this->nombre = $n;
        $this->direccion = $d;
        $this->telefono = $t;
        $this->colProductos = $cP;
        $this->colVentasRealizadas = $cVR;
    }

    //OBSERVADORES
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getColProductos()
    {
        return $this->colProductos;
    }

    public function getColVentasRealizadas()
    {
        return $this->colVentasRealizadas;
    }

    //MODIFICADORES
    public function setNombre($n)
    {
        $this->nombre = $n;
    }

    public function setDireccion($d)
    {
        $this->direccion = $d;
    }

    public function setTelefono($t)
    {
        $this->telefono = $t;
    }

    public function setColProductos($cP)
    {
        $this->colProductos = $cP;
    }

    public function setColVentasRealizadas($cVR)
    {
        $this->colVentasRealizadas = $cVR;
    }

    public function __toString()
    {
        return "Nombre: " . $this->getNombre() . "\n" . 
        "Direccion: " . $this->getDireccion() . "\n" . 
        "Telefono: " . $this->getTelefono() . "\n" .
        "Productos:\n" . $this->colAString($this->getColProductos) . "\n" .
        "Ventas realizadas:\n" . $this->colAString($this->getColVentasRealizadas);
    }

    public function colAString($coleccion) {
        $retorno = "";
        for ($i=0; $i < count($coleccion); $i++) { 
            $retorno .= $coleccion[$i] . "\n";
            $retorno .= "--------------------\n";
        }
        return $retorno;
    }

    public function buscarProducto($codigoBuscado) {
        $producto = null;
        $coleccion = $this->getColProductos();
        foreach($coleccion as $productoDisponible) {
            if($productoDisponible->getCodigoBarra() == $codigoBuscado) {
                $producto = $productoDisponible;
            }
        }
        return $producto;
    }

    public function realizarVenta($colProductosAVender) {
        $numVenta = count($this->getColVentasRealizadas());
        $fecha = date("d-m-Y");
        $nuevaVenta = new Venta();
        foreach ($colProductosAVender as $producto) {
            if($this->buscarProducto($producto->getCodigoBarra()) != null) {

            }
        }
    }
}
