<?php
class Empresa
{
    //VARIABLES
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colProductos;
    private $colVentas;

    //CONSTRUCTOR
    public function __construct($den, $dir, $cC, $cP, $cV)
    {
        $this->denominacion = $den;
        $this->direccion = $dir;
        $this->colClientes = $cC;
        $this->colProductos = $cP;
        $this->colVentas = $cV;
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

    public function getColClientes()
    {
        return $this->colClientes;
    }

    public function getColProductos()
    {
        return $this->colProductos;
    }

    public function getColVentas()
    {
        return $this->colVentas;
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

    public function setColClientes($cC)
    {
        $this->colClientes = $cC;
    }

    public function setColProductos($cP)
    {
        $this->colProductos = $cP;
    }

    public function setColVentas($cV)
    {
        $this->colVentas = $cV;
    }

    public function __toString()
    {
        return "Denominacion: " . $this->getDenominacion() . "\n" .
        "Direccion: " . $this->getDireccion() . "\n" .
        "Clientes:\n" . $this->colClientesAString() .
        "Productos:\n" . $this->colProductosAString() .
        "Ventas:\n" . $this->colVentasAString();
    }

    public function colClientesAString()
    {
        //String $retorno
        //Array Cliente $col
        $retorno = "";
        $col = $this->getColClientes();
        for ($i = 0; $i < count($col); $i++) {
            $retorno .= $col[$i] . "\n";
            $retorno .= "----------------------------\n";
        }
        return $retorno;
    }

    public function colProductosAString()
    {
        //String $retorno
        //Array Producto $col
        $retorno = "";
        $col = $this->getColProductos();
        for ($i = 0; $i < count($col); $i++) {
            $retorno .= $col[$i] . "\n";
            $retorno .= "-------------------------\n";
        }
        return $retorno;
    }

    public function colVentasAString()
    {
        //String $retorno
        //Array Venta $col
        $retorno = "";
        $col = $this->getColVentas();
        for ($i = 0; $i < count($col); $i++) {
            $retorno .= $col[$i] . "\n";
            $retorno .= "-------------------------\n";
        }
        return $retorno;
    }

    public function retornarProducto($codigoProducto)
    {
        //Producto $retorno
        //int $i
        //boolean $encontrado
        $i = 0;
        $encontrado = false;
        $retorno = null;
        while ($i < count($this->getColProductos()) && !$encontrado) {
            if ($this->colProductos[$i]->getCodigo() == $codigoProducto) {
                $retorno = $this->colProductos[$i];
                $encontrado = true;
            }
            $i++;
        }
        return $retorno;
    }

    public function registrarVenta($colCodigosProductos, $cliente)
    {
        //Venta $nuevaVenta
        //Producto $nuevoProducto
        //int $codigoProducto
        //Array Venta $colVentas

        $precioFinal = 0;
        $colVentas = $this->getColVentas();
        if (!$cliente->getDadoDeBaja()) {
            $numero = count($this->colVentas);
            $fecha = date('Y');
            $nuevaVenta = new Venta($numero, $fecha, $cliente);
            for ($i = 0; $i < count($colCodigosProductos); $i++) {
                $codigoProducto = $colCodigosProductos[$i];
                $nuevoProducto = $this->retornarProducto($codigoProducto);
                if ($nuevoProducto != null) {
                    $nuevaVenta->incorporarProducto($nuevoProducto);
                }
            }
            if (count($nuevaVenta->getColProductos()) != 0) {
                $colVentas[count($colVentas)] = $nuevaVenta;
                $this->setColVentas($colVentas);
                $precioFinal = $nuevaVenta->getPrecioFinal();
            }
        }
        return $precioFinal;
    }

    public function retornarVentasPorCliente($tipo, $numDoc)
    {
        //Array Venta $ventasRealizadas
        //Venta $objVenta
        //Cliente $cliente
        $ventasRealizadas = [];
        foreach($this->getColVentas() as $objVenta) {
            $cliente = $objVenta->getCliente();
            if ($cliente->getTipoDoc() == $tipo && $cliente->getNumeroDoc() == $numDoc) {
                array_push($ventasRealizadas, $objVenta); // Igual a $ventasRealizadas[count($ventasRealizadas)] = $objVenta;
            }
        }
        return $ventasRealizadas;
    }
}
