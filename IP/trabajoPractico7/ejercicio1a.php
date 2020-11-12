<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo lee una cantidad N de temperaturas y las carga en un arreglo indexado*/
//int $cantTemperaturas
//array float $arregloTemperaturas
$arregloTemperaturas = [];
echo "Ingrese la cantidad de temperaturas a cargar: ";
$cantTemperaturas = trim(fgets(STDIN));

$arregloTemperaturas = leerTemperaturas($cantTemperaturas);

/**
 * MODULO leerTemperaturas
 *
 * Este modulo recibe por parametros una cantidad de temperaturas y una arreglo al que las carga
 *
 * @param int $cant
 * @return array float $arreglo;
 */
function leerTemperaturas($cant)
{
    //array float $arreglo
    $arreglo = [];
    for ($i = 0; $i < $cant; $i++) {
        echo "Ingrese una temperatura: ";
        $arreglo[$i] = trim(fgets(STDIN));
    }
    return $arreglo;
}
