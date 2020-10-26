<?php
//PROGRAMA PRINCIPAL
/*Este programa lee un numero N e imprime la sumatoria de los primeros N numeros impares*/
//int $num, $sumatoria, $suma
echo "Ingrese la cantidad de numeros impares de la sumatoria: ";
$num = trim(fgets(STDIN));
$sumatoria = 0;
$suma = 1;

for ($i = 0; $i < $num; $i++) {
    $sumatoria += $suma;
    $suma += 2;
}

echo "La sumatoria de los primeros " . $num . " impares es: " . $sumatoria;