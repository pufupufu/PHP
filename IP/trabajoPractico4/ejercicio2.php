<?php
//Programa principal
/*En este programa se ingresa un numero e imprime true 
en caso de ser par y false en caso de ser impar*/
//int $num

echo "Ingrese un numero: ";
$num = trim(fgets(STDIN));

$resultado = esMultiploDe2($num);
echo $resultado ? "Es par" : "Es impar";

/**
 * MODULO esMultiploDe2
 * @param int $num
 * @return boolean
 */
function esMultiploDe2($num) {
    $esPar = (($num % 2) == 0);
    return boolval($esPar);
}