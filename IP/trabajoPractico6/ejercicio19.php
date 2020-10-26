<?php
//PROGRAMA PRINCIPAL
/*Este programa lee una secuencia de letras e imprime la cantidad de vocales ingresadas*/
//int $contador
//char $letra
$contador = 0;

do{
    echo "Ingrese una letra: ";
    $letra = trim(fgets(STDIN));

    if($letra == 'a' || $letra == 'e' || $letra == 'i' || $letra == 'o' || $letra == 'u') {
        $contador++;
    }
}while ($letra != '-');

echo "Se ingresaron " . $contador . " vocales";