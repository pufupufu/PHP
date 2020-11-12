<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo lee una cantidad N de temperaturas, las carga
en un arreglo y las muestra por pantalla*/
//int $cantTemperaturas
//array float $arregloTemperaturas
$arregloTemperaturas = [];
echo "Ingrese la cantidad de temperaturas a cargar: ";
$cantTemperaturas = trim(fgets(STDIN));

$arregloTemperaturas = leerTemperaturas($cantTemperaturas);

listarTemperaturas($arregloTemperaturas);

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

/**
 * MODULO listarTemeperaturas
 *
 * Este modulo recibe un arreglo por parametro e imprime las temperaturas que contiene
 *
 * @param array float $arreglo
 */
function listarTemperaturas($arreglo)
{
    for ($i = 0; $i < count($arreglo); $i++) {
        echo "Temperatura ", $i + 1, ": ", $arreglo[$i], "\n";
    }
}
