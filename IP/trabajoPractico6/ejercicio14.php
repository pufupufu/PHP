<?php
//PROGRAMA PRINCIPAL
/*Este programa lee un numero N e imprime los N primeros numeros de la sucesion de Fibonacci*/
//int $num, $aux1, $aux2, $suma
echo "Ingrese cuantos numeros quiere ver de la sucesion de Fibonacci: ";
$num = trim(fgets(STDIN));
$aux1 = 0;
$aux2 = 1;
$suma = 1;

for ($i = 0; $i < $num; $i++) {
    echo $suma . " ";
    $suma = $aux1 + $aux2;
    $aux1 = $aux2;
    $aux2 = $suma;
}