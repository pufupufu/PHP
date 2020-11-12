<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo lee una cantidad N de temperaturas, las carga en un arreglo e imprime el
porcentaje de las temperaturas que superan a una dada*/
//int $cantTemperaturas
//float $porcentajeTemperaturas, $temperatura
//array float $arregloTemperaturas
$arregloTemperaturas = [];
echo "Ingrese la cantidad de temperaturas a cargar (°C): ";
$cantTemperaturas = trim(fgets(STDIN));

$arregloTemperaturas = leerTemperaturas($cantTemperaturas);

echo "Ingrese la temperatura con la que desea comparar: ";
$temperatura = trim(fgets(STDIN));
$porcentajeTemperaturas = porcTemperaturasSuperiores($arregloTemperaturas, $temperatura);

echo "Hay un ", $porcentajeTemperaturas, "% de temperaturas superiores a los ", $temperatura, "°C";

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
 * MODULO porcTemperaturasSuperiores
 *
 * Este modulo recibe por parametro un arreglo y una temperatura y retorna el porcentaje de
 * temperaturas superiores a la dada
 *
 * @param float $arreglo
 * @param float $temp
 * @return float $porcentaje
 */

function porcTemperaturasSuperiores($arreglo, $temp)
{
    //float $porcentaje
    //int $contador
    $contador = 0;
    for ($i = 0; $i < count($arreglo); $i++) {
        if($arreglo[$i] > $temp) {
            $contador++;
        }
    }
    $porcentaje = ($contador * 100) / count($arreglo);
    return $porcentaje;
}
