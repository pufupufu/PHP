<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo lee los terminos cuadratico, lineal 
e independiente y muestra las raices de la funcion*/
//float $a, $b, $c
echo "Ingrese el termino cuadratico: ";
$a = trim(fgets(STDIN));
echo "Ingrese el termino lineal: ";
$b = trim(fgets(STDIN));
echo "Ingrese el termino independiente: ";
$c = trim(fgets(STDIN));

calculoDiscriminantes($a, $b, $c);


/**
 * MODULO calculoDiscriminantes
 * 
 * Este algoritmo recibe los 3 terminos de una funcion cuadratica y muestra sus raices
 * 
 * @param $a, $b, $c
 */
function calculoDiscriminantes($a, $b, $c) {
    $discriminante = ($b * $b) - (4 * $a * $c);
    if($discriminante < 0) {
        echo "No es posible calcular raices reales";
    } else {
        $raiz1 = ((-1 * $b) + sqrt($discriminante)) / (2 * $a);
        $raiz2 = ((-1 * $b) - sqrt($discriminante)) / (2 * $a);

        if($raiz1 == $raiz2) {
            echo "Las raices son dobles en " , $raiz1;
        } else {
            echo "Las raices son: \n" , "X1 = " , $raiz1 , "\n" , "X2 = " , $raiz2;
        }
    }
}