<?php
//PROGRAMA encriptar
//Este programa encripta un numero de 4 digitos
//int num, encriptado, encriptadoAux, aux, aux2, es10, menorMil
$encriptadoAux = 0;
$encriptado = 0;

echo "Ingrese un numero: ";
$num = trim(fgets(STDIN));

//ULTIMO DIGITO
$aux = (($num % 10) % 10) + 7;
$es10 = $aux >= 10;
$es10 ? $aux = $aux % 10 : $aux = $aux;
$encriptadoAux = $encriptadoAux + $aux;

$aux = ((int)(($num % 100) / 10) % 10) + 7;
$es10 = $aux >= 10;
$es10 ? $aux = $aux % 10 : $aux = $aux;
$encriptadoAux = $encriptadoAux + ((int)$aux * 10);

$aux = ((int)(($num % 1000) / 100) % 10) + 7;
$es10 = $aux >= 10;
$es10 ? $aux = $aux % 10 : $aux = $aux;
$encriptadoAux = $encriptadoAux + ((int)$aux * 100);

$aux = ((int)($num / 1000) % 10) + 7;
$es10 = $aux >= 10;
$es10 ? $aux = $aux % 10 : $aux = $aux;
$encriptadoAux = $encriptadoAux + (int)($aux * 1000);

echo "ENCRIPTADO AUXILIAR: ". $encriptadoAux. " \n";

$aux = (int)($encriptadoAux / 1000);
$aux2 = (int)(($encriptadoAux % 100) / 10);
$encriptado += (String)($aux * 10);
$encriptado += (String)($aux2 * 1000);
$aux = $encriptadoAux % 10;
$aux2 = (int)(($encriptadoAux % 1000) / 100);
$encriptado += ($aux * 100);
$encriptado += $aux2;

$menorMil = $encriptado < 1000;
$menorMil ? $encriptado = "0".$encriptado : $encriptado = $encriptado;

echo $num. " encriptado es: ". $encriptado;