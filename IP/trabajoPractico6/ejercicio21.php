<?php
//PROGRAMA PRINCIPAL
/*Este programa lee una secuencia de palabras e imprime
la palabra y la posicion en la que se encuentra*/
//int $posicion
//String $palabra
$posicion = 0;

do {
    echo "Ingrese una palabra: ";
    $palabra = trim(fgets(STDIN));
    $posicion++;

    echo "Su palabra numero " . $posicion . " es: " . $palabra . "\n";
} while ($palabra != ".");
