<?php
class Teatro
{
    private $funciones;
    private $nombre;
    private $direccion;

    public function __construct($nom, $dir)
    {
        $this->nombre = $nom;
        $this->direccion = $dir;
        $this->funciones = [
            ["nombre" => "", "precio" => 0],
            ["nombre" => "", "precio" => 0],
            ["nombre" => "", "precio" => 0],
            ["nombre" => "", "precio" => 0],
        ];
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getFunciones()
    {
        return $this->funciones;
    }

    public function setNombre($nom)
    {
        $this->nombre = $nom;
    }

    public function setDireccion($dir)
    {
        $this->direccion = $dir;
    }

    public function existeFuncion($funcionBuscada)
    {
        //int $pos, $i
        $pos = -1;
        $i = 0;
        while ($i < count($this->funciones) && $pos == -1) {
            if ($this->funciones[$i]["nombre"] == $funcionBuscada) {
                $pos = $i;
            } else {
                $i++;
            }
        }
        return $pos;
    }

    public function cambiarFuncion($pos, $nuevoNombre, $nuevoPrecio)
    {
        //boolean $exito
        if ($pos < 4 && $pos >= 0) {
            $this->funciones[$pos]["nombre"] = $nuevoNombre;
            $this->funciones[$pos]["precio"] = $nuevoPrecio;
            $exito = true;
        } else {
            $exito = false;
        }
        return $exito;
    }

    public function cambiarPrecio($pos, $nuevoPrecio)
    {
        //boolean $exito
        if ($pos < 4 && $pos >= 0) {
            $this->funciones[$pos]["precio"] = $nuevoPrecio;
            $exito = true;
        } else {
            $exito = false;
        }
        return $exito;
    }

    public function __toString()
    {
        return "Teatro: " . $this->getNombre() . "\n" . "Direccion: " . $this->getDireccion() . "\n\n" . $this->arrayToString() . "\n";
    }

    private function arrayToString()
    {
        //String $retorno, $funcion
        //Array $arregloFunciones
        //float $precio
        //int $i
        $j = 1;
        $retorno = "";
        $arregloFunciones = $this->getFunciones();
        foreach ($arregloFunciones as $i) {
            $funcion = $i["nombre"];
            $precio = $i["precio"];
            $retorno .= "Funcion " . ($j) . ":\nObra: $funcion\nPrecio: $precio\n";
            $retorno .= "-------------------------------------------------\n";
            $j++;
        }
        return $retorno;
    }
}
