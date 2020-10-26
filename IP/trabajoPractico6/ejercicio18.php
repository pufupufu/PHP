<?php
//PROGRAMA PRINCIPAL
/*Este programa lee una secuencia de palabras hasta
un "." e imprime las palabras en una oracion*/
//String $palabra. $oracion
$oracion = "";
do {
    echo "Ingrese una palabra: ";
    $palabra = trim(fgets(STDIN));
    if ($palabra != "." && $oracion != "") {
        $oracion .= " " . $palabra;
    } else if ($palabra != ".") {
        $oracion .= $palabra;
    } else {
        $oracion .= $palabra;
    }
} while ($palabra != ".");

echo $oracion;
