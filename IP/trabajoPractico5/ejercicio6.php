<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo lee un mes y la cantidad de 
articulos producidos para calcular la productividad*/
//String $mes
//int $cantArt, $productividad
echo "Ingrese el mes (incial con mayuscula): ";
$mes = trim(fgets(STDIN));
echo "Ingrese la cantidad de articulos producidos: ";
$cantArt = trim(fgets(STDIN));

$productividad = calcularProductividad($mes, $cantArt);

if($productividad != -1) {
    echo "La productividad en el mes de " , $mes , " fue de " , $productividad;
} else {
    echo $mes , " no es un mes valido";
}


/**
 * MODULO calcularProductividad
 * 
 * Este modulo recibe por parametro un mes y la cantidad de articulos 
 * producidos y retorna la productividad de ese mes segun el factor
 * 
 * @param $mes, $art
 * @return $productividad
 */
function calcularProductividad($mes, $art) {
    if($mes == "Enero" || $mes == "Febrero" || $mes == "Marzo") {
        $productividad = $art * 15;

    } else if($mes == "Abril" || $mes == "Mayo" || $mes == "Junio") {
        $productividad = $art * 17;

    } else if($mes == "Julio" || $mes == "Agosto") {
        $productividad = $art * 19;

    } else if($mes == "Septiembre" || $mes == "Octubre" || $mes == "Noviembre") {
        $productividad = $art * 20;

    } else if($mes == "Diciembre") {
        $productividad = $art * 21;

    } else {
        $productividad = -1;
    }

    return $productividad;
}