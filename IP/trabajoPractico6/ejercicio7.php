<?php
//PROGRAMA PRINCIPAL
/*Este programa lee una cantidad n de numeros em imprime si los numeros son pares o impares*/
//int $num, $cantidad
echo "Ingrese la cantidad de numeros: ";
$cantidad = trim(fgets(STDIN));

for ($i=0; $i < $cantidad; $i++) { 
    echo "Ingrese un numero: ";
    $num = trim(fgets(STDIN));
    esPar($num);
}

/**
 * MODULO esPar
 * 
 * Este modulo recibe por parametro un numero e imprime si el numero es par o impar
 * 
 * @param $n
 */
function esPar($n) {
    $esPar = ($n % 2 == 0);
    if($esPar) {
        echo "El numero " . $n . " es par" . "\n";
    } else {
        echo "El numero " . $n . " no es par" . "\n";
    }
}