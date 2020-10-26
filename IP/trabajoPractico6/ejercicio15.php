<?php
//PROGRAMA PRINCIPAL
/*Este programa lee un numero N y una secuencia de numeros
e imprime el porcentaje de numeros multiplos de N*/
//int $num, $secuencia, $contador, $multiplos
//float $porcentaje
//char $continuar
echo "Ingrese el numero con el que se va a comparar: ";
$num = trim(fgets(STDIN));
$contador = 0;
$multiplos = 0;

do {
    echo "Ingrese un numero: " . "\n";
    $secuencia = trim(fgets(STDIN));
    if ($secuencia % $num == 0) {
        $multiplos++;
    }
    $contador++;

    echo "¿Desea ingresar otro numero?(s/n): " . "\n";
    $continuar = trim(fgets(STDIN));
} while ($continuar != 'n');

$porcentaje = ($multiplos * 100) / $contador;

echo "El porcentaje de numeros multiplos de " . $num . " es: " . $porcentaje . "%";
