<?php
include "Teatro.php";
main();

function main() {
    //String $ok, $error
    //Teatro $teatro
    $error = "ERROR";
    $ok = "OK!";
    $teatro = new Teatro("Primer Nombre Teatro", "Primera Direccion");

    //CARGA DE LAS FUNCIONES
    echo "Cargo la primera funcion:\t\t\t" . (($teatro->cambiarFuncion(0, "Romeo y Julieta", 150)) ? $ok : $error). "\n";
    echo "Cargo la segunda funcion:\t\t\t" . (($teatro->cambiarFuncion(1, "Hamlet", 180)) ? $ok : $error) . "\n";
    echo "Cargo la tercera funcion:\t\t\t" . (($teatro->cambiarFuncion(2, "Divina Comedia", 172)) ? $ok : $error) . "\n";
    echo "Cargo la cuarta funcion:\t\t\t" . (($teatro->cambiarFuncion(3, "El Fantasma de la Opera", 147)) ? $ok : $error) . "\n";
    echo $teatro;

    //MUESTRO EL ARREGLO DE FUNCIONES CARGADO
    print_r($teatro->getFunciones()) . "\n";

    //CAMBIO DE NOMBRE DEL TEATRO
    $teatro->setNombre("Nuevo Nombre Teatro");
    //CAMBIO DE DIRECCION
    $teatro->setDireccion("Nueva Direccion");
    echo "Teatro con los cambios realizados: \n" . $teatro . "\n";

    echo "Cargo una quinta funcion:\t\t\t\t\t" . ((false == $teatro->cambiarFuncion(4, "La Celestina", 231)) ? $ok : $error) . "\n";

    //TEST METODO existeFuncion()
    echo "Busco una funcion que no esta cargada:\t\t\t\t" . ((-1 == $teatro->existeFuncion("La Celestina")) ? $ok : $error) . "\n";
    $pos = $teatro->existeFuncion("Hamlet");
    echo "Busco una funcion cargada:\t\t\t\t\t" . ((-1 != $pos) ? $ok : $error) . "\n";

    echo "Cambio la funcion buscada anteriormente:\t\t\t" . (($teatro->cambiarFuncion($pos, "La Celestina", 156)) ? $ok : $error) . "\n";

    print_r($teatro->getFunciones());
}