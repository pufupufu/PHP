<?php
include "Empresa.php";
include "Venta.php";
include "Producto.php";
include "Cliente.php";

main();

function main() {
    //INCISO 1
    $cliente1 = new Cliente("Jose", "Perez", "DNI", 23568419, false);
    $cliente2 = new Cliente("Juan", "Hernandez", "DNI", 21581720, false);
    $colCliente = [$cliente1, $cliente2];

    //INCISO 2
    $producto1 = new Producto(11, 50000, 2018, "Cemento loma Negra", 70, true);
    $producto2 = new Producto(12, 10000, 2019, "Hierro del 12", 60, true);
    $producto3 = new Producto(13, 10000, 2020, "Cal Santa Clara", 50, false);
    $colProducto = [$producto1, $producto2, $producto3];

    $colVenta = [];

    //INCISO 3
    $empresa = new Empresa("Cosmos", "Av Argentina 123", $colCliente, $colProducto, $colVenta);

    //INCISO 4
    $colCodigosProductos = [11, 12, 13];
    $empresa->registrarVenta($colCodigosProductos, $cliente2);
    echo $empresa->colVentasAString();

    //INCISO 5
    $colCodigosProductos = [0];
    $empresa->registrarVenta($colCodigosProductos, $cliente2);
    echo $empresa->colVentasAString();

    //INCISO 6
    $colCodigosProductos = [2];
    $empresa->registrarVenta($colCodigosProductos, $cliente2);
    echo $empresa->colVentasAString();

    //INCISO 7
    $ventas = $empresa->retornarVentasPorCliente("DNI", 23568419);
    imprimirArreglo($ventas);

    //INCISO 8
    $ventas = $empresa->retornarVentasPorCliente("DNI", 21581720);
    imprimirArreglo($ventas);

    //INCISO 9
    echo $empresa;
}

function imprimirArreglo($ventas) {
    for ($i=0; $i < count($ventas); $i++) { 
        echo $ventas[$i] . "\n";
    }
}