<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo verifica si un alumno esta aprobado o desaprobado*/
//int $nota
//boolean $aprobado
echo "Ingrese la nota del alumno: ";
$nota = trim(fgets(STDIN));

if($nota > 10 || $nota < 0) {
    echo "Nota invalida";
} else if ($nota >= 4){
    echo "El alumno esta aprobado";
} else {
    echo "El alumno esta desaprobado";
}