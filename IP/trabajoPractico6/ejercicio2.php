<?php
//PROGRAMA PRINCIPAL
/*Este programa lee una serie de numeros hasta que se le ingresa un 0,
y muestra la suma total de todos los numeros ingresados*/
//int $n, $suma
$suma = 0;
do{
    echo "Ingrese un numero: ";
    $n = trim(fgets(STDIN));
    $suma += $n;
}while($n != 0);
echo "La suma de los numeros es: " . $suma;