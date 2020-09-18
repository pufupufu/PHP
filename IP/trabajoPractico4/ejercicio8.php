<?php
//PROGRAMA PRINCIPAL
/*Este programa imprime la cantidad de agua destilada 
para una cantidad dada de Loratadina y Betametasona*/
//int $cantL, $cantB, $cantAgua

echo "Ingrese la cantidad de Loratadina: ";
$cantL = trim(fgets(STDIN));

echo "Ingrese la cantidad de Betametasona: ";
$cantB = trim(fgets(STDIN));

$cantAgua = calcAguaDestilada($cantL, $cantB);
echo "La cantidad de agua que hace falta es: " , $cantAgua;

/**
 * MODULO calcAguaDestilada
 * 
 * Este modulo recibe por parametro la 
 * cantidad de loratadina y betametasona y retorna
 * la cantidad de agua necesaria en proporcion al 
 * 10% de loratadina + 15% de betametasona
 * 
 * @param int $loratadina
 * @param int $betametasona
 * @return $aguaTotal
 */
function calcAguaDestilada($loratadina, $betametasona) {
    $aguaTotal = ($loratadina * 0.1 + $betametasona * 0.15);
    return $aguaTotal;
}