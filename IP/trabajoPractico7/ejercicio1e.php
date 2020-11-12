<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo lee una cantidad N de temperaturas, las carga en un arreglo y luego muestra
por pantalla la posicion de la menor temperatura ingresada*/
//int $cantTemperaturas, $indiceMenor
//array float $arregloTemperaturas
$arregloTemperaturas = [];
echo "Ingrese la cantidad de temperaturas a cargar: ";
$cantTemperaturas = trim(fgets(STDIN));

$arregloTemperaturas = leerTemperaturas($cantTemperaturas);

$indiceMenor = minTemperatura($arregloTemperaturas);

echo "La menor temperatura (", $arregloTemperaturas[$indiceMenor], "°C) se encuentra en la posicion ", $indiceMenor;

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
 * Este modulo recibe por parametro un arreglo de temperaturas y retorna la posicion de la
 * menor temperatura guardada
 *
 * @param array float $arreglo
 * @return int $posMenor
 */
function minTemperatura($arreglo)
{
    //int $posMenor
    //float $menor
    $menor = $arreglo[0];
    $posMenor = 0;
    for ($i = 0; $i < count($arreglo); $i++) {
        if ($arreglo[$i] < $menor) {
            $menor = $arreglo[$i];
            $posMenor = $i;
        }
    }
    return $posMenor;
}
