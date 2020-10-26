<?php
//PROGRAMA PRINCIPAL
/*Este programa lee una secuencia de palabras e
imprime una oracion con las palabras en orden inverso*/
//String $palabra, $oracion
$oracion = "";

do {
    echo "Ingrese una palabra: ";
    $palabra = trim(fgets(STDIN));
    if ($palabra != "." && $oracion != "") {
        $oracion = $palabra . " " . $oracion;
    } else if ($palabra != ".") {
        $oracion = $palabra . $oracion;
    } else {
        $oracion = $palabra . $oracion;
    }
} while ($palabra != ".");

echo $oracion;