<?php
//PROGRAMA PRINCIPAL
/*Este programa lee un numero e imprime su factorial*/
//int $num, $factorial
echo "Ingrese el numero del que quiere calcular el factorial: ";
$num = trim(fgets(STDIN));
$factorial = 1;

for ($i = 1; $i <= $num; $i++) {
    $factorial *= $i;
}

echo $num . "! = " . $factorial;