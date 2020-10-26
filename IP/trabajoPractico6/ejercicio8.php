<?php
//PROGRAMA PRINCIPAL
/*Este programa lee dos numeros e imprime la sumatoria de los numeros impares entre ambos*/
//int $a, $b, $sumatoria
//boolean $par
$sumatoria = 0;
do{
    echo "Ingrese el valor de a: ";
    $a = trim(fgets(STDIN));
    echo "Ingrese el valor de b: ";
    $b = trim(fgets(STDIN));
}while ($a >= $b || $a <= 0 || $b <= 0);

for ($i = $a + 1; $i < $b; $i++) {
    $par = esPar($i);
    iF(!$par) {
        $sumatoria += $i;
    }
}

echo "La sumatoria de todos los numeros impares entre a y b es: " . $sumatoria;


/**
 * MODULO esPar
 * 
 * 
 */
function esPar($n) {
    $esPar = ($n % 2 == 0);
    return $esPar;
}