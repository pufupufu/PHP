<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo recibe la cantidad de kilometros 
recorrida por un auto y muestra el precio total*/
//int $km
//double $precio
echo "Ingrese la cantidad de kilometros recorridos: ";
$km = trim(fgets(STDIN));

$precio = calcularPrecio($km);

echo "El precio por " , $km , "km es de: $" , $precio;


/**
 * MODULO calcularPrecio
 * 
 * Este algoritmo recibe por parametro una cantidad de kilometros
 * y retorna el precio total por esos kilometros
 * 
 * @param $km
 * @return $precioTotal
 */
function calcularPrecio($km) {
    if($km <= 300) {
        $precioTotal = 850;
    } else if($km > 300 && $km <= 1000) {
        $adicionales = $km - 300;
        $precioTotal = 850 + ($adicionales * 10.5);
    } else {
        $adicionales1 = $km - 300 - ($km - 1000);
        $adicionales2 = $km - 1000;
        $precioTotal = 850 + ($adicionales1 * 10.5) + ($adicionales2 * 8.5);
    }
    return $precioTotal;
}