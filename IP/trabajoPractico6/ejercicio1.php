<?php
//PROGRAMA PRINCIPAL
/*Este prpgrama lee un numero e imprime todos 
los numeros pares menores o iguales al ingresado*/
//int $n
//String $numeros
echo "Ingrese un numero: ";
$n = trim(fgets(STDIN));
$numeros = "";
for ($i=1; $i <= $n; $i++) { 
    if($i % 2 == 0) {
        $numeros .= $i . " ";
    }
}
echo $numeros;