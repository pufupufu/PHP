<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo lee el peso y la altura de una persona 
y muestra la clasificacion de la OMS segun su IMC*/
//float $peso, $altura, $imc
echo "Ingrese su peso: ";
$peso = trim(fgets(STDIN));
echo "Ingrese la altura (en metros): ";
$altura = trim(fgets(STDIN));

$imc = calcularImc($peso, $altura);
echo clasificacion($imc) , " con un IMC de: " . $imc;


/**
 * MODULO calcularImc
 * 
 * Este modulo recibe por parametro el peso y la altura de una persona y retorna su IMC
 * 
 * @param $p, $h
 * @return $imc
 */
function calcularImc($p, $h) {
    $imc = $p / ($h * $h);
    return $imc;
}


/**
 * MODULO clasificacion
 * 
 * Este modulo recibe por parametro el IMC de una persona e imprime su categoria
 * 
 * @param $imc
 */
function clasificacion($imc) {
    if($imc < 18.5) {
        echo "Bajo peso";
    } else if($imc >= 18.5 && $imc < 25) {
        echo "Normal";
    } else if($imc >= 25 && $imc < 30) {
        echo "Sobrepeso";
    } else if($imc >= 30 && $imc < 35) {
        echo "Obesidad leve";
    } else if($imc >= 35 && $imc < 40) {
        echo "Obesidad media";
    } else {
        echo "Obesidad morbida";
    }
}