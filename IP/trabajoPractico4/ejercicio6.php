<?php
//PROGRAMA PRINCIPAL
/*Este programa solicita el radio de 2 circulos e imprime el valor de 
la superficie circular y el de la superficie de la corona circular*/
//float $r1, $r2, $supCorona, $supC1, $supC2

echo "Ingrese el radio de un circulo: ";
$r1 = trim(fgets(STDIN));
echo "Ingrese el radio de otro circulo: ";
$r2 = trim(fgets(STDIN));

$supC1 = calcularSuperficie($r1);
echo "La superficie del primer circulo es: " , $supC1 , "\n";

$supC2 = calcularSuperficie($r2);
echo "La superficie del primer circulo es: " , $supC2 , "\n";

$supCorona = calcularCorona($supC1, $supC2);
echo "La superficie de la corona circular es: " , $supCorona , "\n";

/**
 * MODULO calcularSuperficie
 * @param float $radio
 * @return $superficie
 */
function calcularSuperficie($radio) {
    $superficie = M_PI * ($radio * $radio);
    return $superficie;
}

/**
 * MODULO calcularCorona
 * @param float $sup1
 * @param float $sup2
 * @return $supCorona
 */
function calcularCorona($sup1, $sup2) {
    $supCorona = abs($sup1 - $sup2);
    return $supCorona;
}