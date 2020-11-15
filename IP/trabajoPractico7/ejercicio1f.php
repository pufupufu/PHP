<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo lee una cantidad N de temperaturas, las carga en un arreglo y luego muestra
por pantalla la posicion de la mayor temperatura ingresada*/
//int $cantTemperaturas, $indiceMayor
//array float $arregloTemperaturas
$arregloTemperaturas = [];
echo "Ingrese la cantidad de temperaturas a cargar: ";
$cantTemperaturas = trim(fgets(STDIN));

$arregloTemperaturas = leerTemperaturas($cantTemperaturas);

$indiceMayor = maxTemperatura($arregloTemperaturas);

echo "La mayor temperatura (", $arregloTemperaturas[$indiceMayor], "°C) se encuentra en la posicion ", $indiceMayor;

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
 * MODULO maxTemperatura
 *
 * Este modulo recibe por parametro un arreglo de temperaturas y retorna la posicion de la
 * mayor temperatura guardada
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
