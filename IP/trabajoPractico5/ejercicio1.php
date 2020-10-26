<?php
//PROGRAMA PRINCIPAL
/*Este programa recibe un numero y verifica si es par*/
//int $num
//boolean $par
echo "Ingrese un numero: ";
$num = trim(fgets(STDIN));

$par = esPar($num);

if($par) {
    echo "El numero " , $num , " es par";
} else {
    echo "El numero " , $num , " no es par";
}

/**
 * MODULO esPar
 * 
 * Este modulo recibe por parametro un numero y verifica si es par
 * 
 * @param $n
 * @return $esPar;
 */
function esPar($n) {
    $esPar = ($n % 2 == 0);
    return $esPar;
}