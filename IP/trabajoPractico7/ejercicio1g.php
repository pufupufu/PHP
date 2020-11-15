<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo lee una cantidad N de temperaturas, las carga en un arreglo y luego muestra
por pantalla la posicion de la menor temperatura ingresada*/
//int $cantTemperaturas, $menor, $mayor
//array float $arregloTemperaturas, $mayorYMenor
$arregloTemperaturas = [];
$mayorYMenor = [];
echo "Ingrese la cantidad de temperaturas a cargar: ";
$cantTemperaturas = trim(fgets(STDIN));

$arregloTemperaturas = leerTemperaturas($cantTemperaturas);

$mayorYMenor = extremosTemperatura($arregloTemperaturas);

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
 * MODULO minTemperatura
 *
 * Este modulo recibe por parametro un arreglo de temperaturas y retorna la menor temperatura guardada
 *
 * @param array float $arreglo
 * @return int $posMenor
 */
function minTemperatura($arreglo)
{
    //int $posMenor
    //float $menor
    $menor = $arreglo[0];
    for ($i = 0; $i < count($arreglo); $i++) {
        if ($arreglo[$i] < $menor) {
            $menor = $arreglo[$i];
        }
    }
    return $menor;
}

/**
 * MODULO maxTemperatura
 *
 * Este modulo recibe por parametro un arreglo de temperaturas y retorna la mayor temperatura guardada
 *
 * @param array float $arreglo
 * @return int $posMenor
 */
function maxTemperatura($arreglo)
{
    //int $posMenor
    //float $menor
    $mayor = $arreglo[0];
    $posMayor = 0;
    for ($i = 0; $i < count($arreglo); $i++) {
        if ($arreglo[$i] > $mayor) {
            $mayor = $arreglo[$i];
            $posMayor = $i;
        }
    }
    return $posMayor;
}

/**
 * MODULO extremosTemperatura
 *
 * Este modulo recibe por parametro un arreglo de temperauras y retorna un arreglo con
 * la mayor y la menor temperatura almacenadas
 *
 * @param array float $arreglo
 * @return array float $extremos
 */
function extremosTemperatura($arreglo)
{
    //array float $extremos
    $extremos = [];
    $extremos["min"] = minTemperatura($arreglo);
    $extremos["max"] = maxTemperatura($arreglo);
    return $extremos;
}
