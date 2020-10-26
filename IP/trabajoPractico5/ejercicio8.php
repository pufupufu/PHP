<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo lee nombres y edades, y muestra si son contemporaneos*/
//String $nom1, $nom2, $nom3
//int $edad1, $edad2, $edad3
echo "Ingrese el primer nombre: ";
$nom1 = trim(fgets(STDIN));
echo "Ingrese la edad: ";
$edad1 = trim(fgets(STDIN));

echo "Ingrese el segundo nombre: ";
$nom2 = trim(fgets(STDIN));
echo "Ingrese la edad: ";
$edad2 = trim(fgets(STDIN));

echo "Ingrese el tercer nombre: ";
$nom3 = trim(fgets(STDIN));
echo "Ingrese la edad: ";
$edad3 = trim(fgets(STDIN));

$contemporaneos = verificarContemporaneos($edad1, $edad2, $edad3);

if($contemporaneos) {
    echo $nom1 , ", " , $nom2 , " y " , $nom3 , " son contemporaneos";
} else {
    $dosContemporaneos1 = verificarDos($edad1, $edad2);
    $dosContemporaneos2 = verificarDos($edad1, $edad3);
    $dosContemporaneos3 = verificarDos($edad2, $edad3);
    if($dosContemporaneos1) {
        echo $nom1 , " y " , $nom2 , " son contemporaneos";
    } else if($dosContemporaneos2) {
        echo $nom1 , " y " , $nom3 , " son contemporaneos";
    } else if($dosContemporaneos3) {
        echo $nom2 , " y " , $nom3 , " son contemporaneos";
    } else {
        echo "Ninguno es contemporaneo";
    }
}


/**
 * MODULO verificarContemporaneos
 * 
 * Este modulo recibe 3 edades y retorna si son contemporaneas o no
 * 
 * @param $e1, $e2, $e3
 * @return $contemporaneos
 */
function verificarContemporaneos($e1, $e2, $e3) {
    $contemporaneos = ($e1 == $e2) && ($e1 == $e3);
    return $contemporaneos;
}


/**
 * MODULO verificarDos
 * 
 * Este modulo recibe 2 edades y verifica si son contemporaneos o no
 * 
 * @param $e1, $e2
 * @return $contemporaneos
 */
function verificarDos($e1, $e2) {
    $contemporaneos = $e1 == $e2;
    return $contemporaneos;
}