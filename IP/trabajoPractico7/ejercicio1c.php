<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo lee una cantidad N de temperaturas,
las carga en un arreglo e imprime la temperatura promedio*/
//int $cantTemperaturas
//array float $arregloTemperaturas
$arregloTemperaturas = [];
echo "Ingrese la cantidad de temperaturas a cargar: ";
$cantTemperaturas = trim(fgets(STDIN));

$arregloTemperaturas = leerTemperaturas($cantTemperaturas);

echo "La temperatura promedio es: ", promTemperaturas($arregloTemperaturas);

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
 * MODULO promTemperaturas
 *
 * Este modulo recibe por parametro un arreglo de temperaturas y calcula el promedio entre ellas
 *
 * @param array float $arreglo
 * @return float $promedio
 */
function promTemperaturas($arreglo)
{
    //float $promedio
    $promedio = 0;
    for ($i = 0; $i < count($arreglo); $i++) {
        $promedio += $arreglo[$i];
    }
    $promedio /= count($arreglo);
    return $promedio;
}
