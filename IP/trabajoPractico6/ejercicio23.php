<?php
//PROGRAMA PRINCIPAL
/*Este programa lee una secuencia de numeros hasta que se ingresa un 0, y muestra si el numero
ingresado es primo, su factorial y la lista de sus divisores*/
//int $num
do {
    echo "Ingrese un numero: ";
    $num = trim(fgets(STDIN));
    if ($num != 0) {
        primo($num);
        calcularFactorial($num);
        calcularDivisores($num);
    }
} while ($num != 0);
//FIN PROGRAMA PRINCIPAL

/**
 * MODULO primo
 *
 * Este modulo recibe un numero por parametro e imprime si es primo o no
 *
 * @param int $n
 */
function primo($n)
{
    //int $i
    //boolean $esPrimo
    $i = 1;
    $esPrimo = true;
    while ($esPrimo && $i <= $n) {
        if ($i != 1 && $i != $n && $n % $i == 0) {
            $esPrimo = false;
        } else {
            $i++;
        }
    }
    if ($esPrimo) {
        echo "El numero " . $n . " es primo \n";
    } else {
        echo "El numero " . $n . " no es primo \n";
    }
}
//FIN MODULO primo

/**
 * MODULO calcularFactorial
 *
 * Este modulo recibe un numero por parametro e imprime su factorial
 *
 * @param int $n
 */
function calcularFactorial($n)
{
    //int $factorial
    $factorial = 1;
    for ($i = 1; $i <= $n; $i++) {
        $factorial *= $i;
    }
    echo $n . "! = " . $factorial . "\n";
}
//FIN MODULO calcularFactorial

/**
 * MODULO calcularDivisores
 *
 * Este modulo recibe un numero por parametro e imprime sus divisores
 *
 * @param int $n
 */
function calcularDivisores($n)
{
    //String $divisores
    $divisores = "(";
    for ($i = 1; $i <= $n / 2; $i++) {
        if ($n % $i == 0) {
            $divisores .= $i . ",";
        }
    }
    $divisores .= $n . ")";
    echo "Los divisores de " . $n . " son: " . $divisores . "\n";
}
