<?php
//PROGRAMA PRINCIPAL
/*Este programa lee un numero e imprime la sumatoria de usarlo como divisor*/
//int $num, $aux
//float $sumatoria
echo "Ingrese el numero hasta el que desea hacer la sumatoria: ";
$num = trim(fgets(STDIN));

$sumatoria = 0;
$aux = 2;

for ($i = 1; $i <= $num; $i++) {
    $sumatoria += ($aux / $i);
    $aux += $i;
}

echo "El resultado de la sumatoria es: " . $sumatoria;