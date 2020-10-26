<?php
/*Este programa lee coordenadas de una escuela, 
una casa, y un radio e imprime si la casa se encuentra fuera o dentro del radio*/
//int $x1, $x2, $y1, $y2, $r
//String $posicion

echo "Ingrese el punto x de la escuela: ";
$x1 = trim(fgets(STDIN));
echo"Ingrese el punto y de la escuela: ";
$y1 = trim(fgets(STDIN));
echo "Ingrese el radio: ";
$r = trim(fgets(STDIN));

echo "Ingrese el punto x de la casa: ";
$x2 = trim(fgets(STDIN));
echo "Ingrese el punto y de la casa: ";
$y2 = trim(fgets(STDIN));

$posicion = dentroOFuera($r, $x1, $y1, $x2, $y2);

echo "La casa se encuentra " , $posicion , " del radio";


/**
 * MODULO dentroOFuera
 * 
 * Este modulo recibe dos coordenadas y un radio y retorna un 
 * String dependiendo de si estan dentro o fuera del radio
 * 
 * @param $r, $x1, $y1, $x2, $y2
 * @return $retorno
 */
function dentroOFuera($r, $x1, $y1, $x2, $y2) {
    //float $d
    //String $retorno

    $d = distanciaPuntos($x1, $y1, $x2, $y2);
    if($d <= $r) {
        $retorno = "dentro";
    } else {
        $retorno = "fuera";
    }
    return $retorno;
}


/**
 * MODULO distanciaPuntos
 * 
 * Este modulo recibe dos coordenadas y retorna la distancia entre los puntos
 * 
 * @param $x1, $y1, $x2, $y2
 * @return $retorno
 */
function distanciaPuntos($x1, $y1, $x2, $y2) {
    //float $retorno
    //int $d1, $d2
    $d1 = $x2 - $x1;
    $d2 = $y2 - $y1;

    $retorno = sqrt(($d1 * $d1) + ($d2 * $d2));
    return $retorno;
}