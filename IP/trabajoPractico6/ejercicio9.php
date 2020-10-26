<?php
//PROGRAMA PRINCIPAL
/*Este programa lee una cantidad n de numeros y retorna la suma entre ellos*/
//int $cantidad, $num, $suma
$suma = 0;
echo "Ingrese la cantidad de numeros: ";
$cantidad = trim(fgets(STDIN));

for ($i = 0; $i < $cantidad; $i++) {
    echo "Ingrese un numero: ";
    $num = trim(fgets(STDIN));
    $suma += $num;
}

echo "La suma de los numeros ingresados es: " . $suma;
