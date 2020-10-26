<?php
//PROGRAMA PRINCIPAL
/*Este programa lee un numero e imprime la sumatoria*/
//int $num, $sumatoria
echo "Ingrese el numero con el que quiere hacer la sumatoria: ";
$num = trim(fgets(STDIN));
$sumatoria = 0;

for ($i = 1; $i <= $num; $i++) {+
    $sumatoria += $i;
}

echo "La sumatoria de " . $num . " es igual a: " . $sumatoria;