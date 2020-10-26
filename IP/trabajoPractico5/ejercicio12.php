<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo lee un numero de un dado y muestra el valor de la cara opuesta*/
//int $num
echo "Ingrese el valor obtenido: ";
$num = trim(fgets(STDIN));

switch($num) {
    case 1:
        echo "El valor opuesto es 6";
    break;
    case 2:
        echo "El valor opuesto es 5";
    break;
    case 3:
        echo "El valor opuesto es 4";
    break;
    case 4:
        echo "El valor opuesto es 3";
    break;
    case 5:
        echo "El valor opuesto es 2";
    break;
    case 6:
        echo "El valor opuesto es 1";
    break;
    default:
        echo "Numero invalido";
}