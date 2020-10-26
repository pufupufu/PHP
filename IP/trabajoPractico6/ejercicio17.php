<?php
//PROGRAMA PRINCIPAL
/*Este programa lee una secuencia de numeros y verifica si esta ordenada de forma creciente o no*/
//int $num1, $num2
//boolean $creciente, $decreciente, $continuar
echo "Ingrese un numero: ";
$num1 = trim(fgets(STDIN));
$continuar = true;
$decreciente = false;
$creciente = true;

do {
    echo "Ingrese otro numero: ";
    $num2 = trim(fgets(STDIN));
    if ($num2 != -1) {
        if ($num2 < $num1 && $creciente) {
            $creciente = false;
            $decreciente = true;
        } else if ($num2 >= $num1 && $creciente) {
            $num1 = $num2;
        } else if($num2 >= $num1 && $decreciente) {
            $decreciente = false;
        }
    } else {
        $continuar = false;
    }

} while ($continuar);

if ($creciente && !$decreciente) {
    echo "Los numeros fueron ingresados de forma creciente";
} else if (!$creciente && $decreciente) {
    echo "Los numeros fueron ingresados de forma decreciente";
} else {
    echo "Los numeros fueron ingresados de forma desordenada";
}
