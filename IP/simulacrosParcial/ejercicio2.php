<?php
//PROGRAMA PRINCIPAL
/*Este programa lee todos los valores referidos a envios y luego invoca 
a los modulos que se encargan de calcular los costos de dichos envios*/
//float $kmRecorrido, $costoTotal, $valorDescuento, $costoConDescuento
//String $formaDePago, $cuponDeDescuento, $diaSemana
echo "Ingrese la distancia del recorrido: ";
$kmRecorrido = trim(fgets(STDIN));

$costoTotal = calcularCostoEnvio($kmRecorrido);

echo "Ingrese el dia del envio (LU, MA, MI, JU, VI, SA, DO): ";
$diaSemana = trim(fgets(STDIN));
echo "Ingrese el medio de pago (efectivo, credito, debito): ";
$formaDePago = trim(fgets(STDIN));
echo "¿Posee un cupon de descuento? (si/no)";
$cuponDeDescuento = trim(fgets(STDIN));

$valorDescuento = calcularDescuento($costoTotal, $diaSemana, $formaDePago, $cuponDeDescuento);

echo "Para una distancia de " , $kmRecorrido , "km el costo es $" , $costoTotal , ", con un descuento de $" , $valorDescuento , ", el valor final es $" , $costoTotal - $valorDescuento;



/**
 * MODULO calcularCostoEnvio
 * 
 * Este modulo recibe por parametro una cantidad de 
 * kilometros y retorna el costo del envio con esa distacia
 * 
 * @param $km
 * @return float $costo
 */
function calcularCostoEnvio($km) {
    //float $costo
    if ($km < 1.5) {
        $costo = 65.5;
    } else if ($km >= 1.5 && $km < 4.5) {
        $costo = 98.6;
    } else if ($km >= 4.5 && $km < 10) {
        $costo = 156.00;
    } else {
        $costo = 170.5 + ($km - 10) * 6.5;
    }
    return $costo;
}


/**
 * MODULO calcularDescuento
 * 
 * Este modulo recibe por parametro el costo del envio, el dia de la semana, la forma de pago
 * y si tiene un cupon de descuento, y retorna el descuento que se le aplica al envio
 * 
 * @param $costo, $dia, $medioDePago, $cupon
 * @return $porcentajeDescuento
 */
function calcularDescuento($costo, $dia, $medioDePago, $cupon) {
    //float $descuento
    if ($medioDePago == "credito") {
        if ($dia == "MI" || $dia == "VI") {
            $porcentajeDescuento = 25;
        } else {
            $porcentajeDescuento = 3;
        }
    } else {
        $porcentajeDescuento = 5;
    }

    if ($cupon == "si") {
        $porcentajeDescuento += 10;
    }

    $descuento = ($costo * $porcentajeDescuento) / 100;
    return $descuento;
}