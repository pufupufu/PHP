<?php
//PROGRAMA PRINCIPAL
/*Se ingresan 2 numeros y se realiza 
M elevado a la N más la raíz cuadrada del valor absoluto de M*/
//int $n, $m

echo "Ingrese el valor de M: ";
$m = trim(fgets(STDIN));
echo "Ingrese el valor de N: ";
$n = trim(fgets(STDIN));

$potencia = pow($m, $n);
$absoluto = abs($m);
$raiz = sqrt($absoluto);
$suma = $potencia + $raiz;

echo $suma;