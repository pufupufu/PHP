<?php
//PROGRAMA PRINCIPAL
/*Este programa lee dos numeros y verifica si el primero es mayor al segundo*/
//int $num1, $num2
//boolean $esMayor
echo "Ingrese el primer numero: ";
$num1 = trim(fgets(STDIN));
echo "Ingrese el segundo numero: ";
$num2 = trim(fgets(STDIN));

$esMayor = verificarMayor($num1, $num2);
echo $esMayor;

/**
 * MODULO verificarMayor
 * 
 * Este modulo recibe por parametro 2 numeros y verifica si el primero es mayor al segundo
 * 
 * @param $n1, $n2
 * @return $esMayor
 */
function verificarMayor($n1, $n2) {
    $esMayor = ($n1 > $n2);
    return $esMayor;
}