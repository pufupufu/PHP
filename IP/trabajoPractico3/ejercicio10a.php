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
$es10 = $aux >= 10; //Verifico si el auxiliar es mayor o igual a 10 despues de la suma
$es10 ? $aux = $aux % 10 : $aux = $aux; //Si es mayor saca el resto de dividir por 10, sino lo deja
$encriptadoAux += $aux;

//SEGUNDO DIGITO
$aux = ((int)(($num % 100) / 10) % 10) + 7;
$es10 = $aux >= 10;
$es10 ? $aux = $aux % 10 : $aux = $aux;
$encriptadoAux += ((int)$aux * 10);

//TERCER DIGITO
$aux = ((int)(($num % 1000) / 100) % 10) + 7;
$es10 = $aux >= 10;
$es10 ? $aux = $aux % 10 : $aux = $aux;
$encriptadoAux += ((int)$aux * 100);

//TERCER DIGITO
$aux = ((int)($num / 1000) % 10) + 7;
$es10 = $aux >= 10; 
$es10 ? $aux = $aux % 10 : $aux = $aux;
$encriptadoAux += (int)($aux * 1000);

$aux = (int)($encriptadoAux / 1000);
$aux2 = (int)(($encriptadoAux % 100) / 10);
$encriptado += ($aux * 10);
$encriptado += ($aux2 * 1000);
$aux = $encriptadoAux % 10;
$aux2 = (int)(($encriptadoAux % 1000) / 100);
$encriptado += ($aux * 100);
$encriptado += $aux2;

$menorMil = $encriptado < 1000; //Verifico si al numero le quedo un 0 adelante, por lo que seria menor a 1.000
$menorMil ? $encriptado = "0".$encriptado : $encriptado = $encriptado; //Si es menor le concatena un 0 al principio

echo $num. " encriptado es: ". $encriptado;