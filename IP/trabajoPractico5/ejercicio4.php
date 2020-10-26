<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo recibe un numero de tres cifras y determina si es capicua*/
//int $num, $esCapicua
echo "Ingrese un numero de 3 cifras: ";
$num = trim(fgets(STDIN));

if($num < 100 || $num > 999) {
    echo "El numero no es de 3 cifras";
} else {
    $esCapicua = verificarCapicua($num);

    if($esCapicua) {
        echo "El numero " , $num , " es capicua";
    } else {
        echo "El numero " , $num , " no es capicua";
    }
}


/**
 * MODULO verificarCapicua
 * 
 * Este modulo recibe por parametro un numero de 3 cifras y verifica si es capicua
 * 
 * @param $n
 * @return $capicua
 */
function verificarCapicua($n) {
    $num1 = (int)($n / 100);
    $num2 = $n % 10;

    $capicua = ($num1 == $num2);
    return $capicua;
}