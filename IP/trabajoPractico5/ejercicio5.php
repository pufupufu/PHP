<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo lee 2 numeros y verifica si el primero es multiplo del segundo*/
//int $a, $b
//boolean $esMultiplo
echo "Ingrese el primer numero: ";
$a = trim(fgets(STDIN));
echo "Ingrese el segundo numero: ";
$b = trim(fgets(STDIN));

$esMultiplo = verificarMultiplo($a, $b);

if($esMultiplo) {
    echo $a , " es multiplo de " , $b;
} else {
    echo $a , " no es multiplo de " , $b;
}


/**
 * MODULO verificarMultiplo
 * 
 * Este modulo recibe por parametro 2 numeros y verifica si el primero es multiplo del segundo
 * 
 * @param $a, $b
 * @return $esMultiplo
 */
function verificarMultiplo($a, $b) {
    $esMultiplo = ($a % $b == 0);
    return $esMultiplo;
}