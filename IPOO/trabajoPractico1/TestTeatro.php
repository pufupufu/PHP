<?php
include "Teatro.php";
main();

function main()
{
    //String $true, $false
    //Teatro $teatro
    $false = "false";
    $true = "true";
    $teatro = new Teatro("Primer Nombre Teatro", "Primera Direccion");

    //CARGA DE LAS FUNCIONES
    echo "Cargo la primera funcion. Espera true:\t\t\t" . (($teatro->cambiarFuncion(0, "Romeo y Julieta", 150)) ? $true : $false) . "\n";
    echo "Cargo la segunda funcion. Espera true:\t\t\t" . (($teatro->cambiarFuncion(1, "Hamlet", 180)) ? $true : $false) . "\n";
    echo "Cargo la tercera funcion. Espera true:\t\t\t" . (($teatro->cambiarFuncion(2, "Divina Comedia", 172)) ? $true : $false) . "\n";
    echo "Cargo la cuarta funcion. Espera true:\t\t\t" . (($teatro->cambiarFuncion(3, "El Fantasma de la Opera", 147)) ? $true : $false) . "\n\n";

    //MUESTRO LOS DATOS DEL TEATRO CON LAS FUNCIONES CARGADAS
    echo $teatro;

    //CAMBIO DE NOMBRE DEL TEATRO
    $teatro->setNombre("Nuevo Nombre Teatro");
    //CAMBIO DE DIRECCION
    $teatro->setDireccion("Nueva Direccion");
    echo "Teatro con los cambios realizados: \n" . $teatro . "\n";

    echo "Cargo una quinta funcion. Espera false:\t\t\t\t\t" . (($teatro->cambiarFuncion(4, "La Celestina", 231)) ? $true : $false) . "\n";

    //TEST METODO existeFuncion()
    echo "Busco una funcion que no esta cargada. Espera false:\t\t\t" . ((-1 != $teatro->existeFuncion("La Celestina")) ? $true : $false) . "\n";
    $pos = $teatro->existeFuncion("Hamlet");
    echo "Busco una funcion cargada. Espera true:\t\t\t\t\t" . ((-1 != $pos) ? $true : $false) . "\n";

    echo "Cambio la funcion buscada anteriormente. Espera true:\t\t\t" . (($teatro->cambiarFuncion($pos, "La Celestina", 156)) ? $true : $false) . "\n\n";

    echo $teatro;

    //TEST METODO cambiarPrecio()
    echo "Cambio el precio de una funcion que no está cargada. Espera false:\t" . (($teatro->cambiarPrecio(4, 125)) ? $true : $false) . "\n";
    echo "Cambio el precio de una funcion cargada. Espera true:\t\t\t" . (($teatro->cambiarPrecio(0, 213)) ? $true : $false) . "\n\n";

    echo $teatro;
}
