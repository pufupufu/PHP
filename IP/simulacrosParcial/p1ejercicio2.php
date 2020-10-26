<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo lee el tipo de aviso y calcula el costo segun el aviso elegido*/
//int $cantLineas, $cantLetras
//float $costoTotal
//String $tipoAviso, $tipoColor
//boolean $p

echo "Ingrese el tipo de aviso que desea publicar: ";
$tipoAviso = trim(fgets(STDIN));

$p = esPublicidad($tipoAviso);

if($p) {
    echo "Ingrese la cantidad de caracteres: ";
    $cantLetras = trim(fgets(STDIN));
    echo "¿Anuncio en blanco y negro o a color?";
    $tipoColor = trim(fgets(STDIN));
    $costoTotal = costoAvisoPublicidad($cantLetras, $tipoColor);
} else {
    echo "Ingrese la cantidad de lineas: ";
    $cantLineas = trim(fgets(STDIN));
    $costoTotal = costoAvisoClasificado($cantLineas);
}

echo "El costo de su " , $tipoAviso , " es de $" , $costoTotal;


/**
 * MODULO esPublicidad
 * 
 * Recibe por parametro un String y retorna verdadero en caso de que diga "publicidad"
 * 
 * @param $tipo
 * @return boolean $retorno
 */
function esPublicidad($tipo) {
    //boolean retorno
    $retorno = false;
    if($tipo == "publicidad") {
        $retorno = true;
    }
    return $retorno;
}


/**
 * MODULO costoAvisoPublicidad
 * 
 * Este modulo recibe por parametro la cantidad de letras del 
 * aviso y el tipo de color, y retorna un costo en base a esto
 * 
 * @param $color
 * @param $letras
 * @return float $costo
 */
function costoAvisoPublicidad($letras, $color) {
    //float $costo
    if($letras <= 300) {
        $costo = 556.50;
    } else if($letras > 300 && $letras <= 500) {
        $costo = 950.00;
    } else {
        $costo = 2300.00;
    }

    if($color == "color") {
        $costo += $costo * 0.1;
    }
    return $costo;
}


/**
 * MODULO costoAvisoClasificado
 * 
 * Este modulo recibe por parametro la cantidad de lineas 
 * del aviso y retorna el costo en base a esto
 * 
 * @param $lineas
 * @return float $costo
 */
function costoAvisoClasificado($lineas) {
    //float $costo
    //int lineasExtra
    $costo = 150.00;

    if($lineas > 3) {
        $lineasExtra = $lineas - 3;
        $costo += ($lineasExtra * 25.00);
    }
    return $costo;
}