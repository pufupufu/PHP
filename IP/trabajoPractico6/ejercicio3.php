<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo lee un numero entero e imprime 
todos los numeros positivos menores a el*/
//int $n
//String $numeros
echo "Ingrese un numero: ";
$n = trim(fgets(STDIN));
$numeros = "";
for($i = 1; $i < $n; $i++) {
    $numeros .= $i . " ";
}
echo $numeros;