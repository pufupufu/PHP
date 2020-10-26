<?php
//PROGRAMA PRINCIPAL
/*Este algoritmo lee si se va a ingresar un empleado y luego lee el sueldo que recibe hasta 
que no se ingresen mas para luego calcular el promedio del sueldo de todos los empleados*/
//float $sueldo, $sueldoTotal, $promedio
//int $cantEmpleados
//char $continuar
$sueldoTotal = 0;
$cantEmpleados = 0;

do{
    echo "Ingrese el sueldo que cobra el empleado: ";
    $sueldo = trim(fgets(STDIN));
    $cantEmpleados++;
    $sueldoTotal += $sueldo;
    echo "¿Va a ingresar otro sueldo? (s/n): ";
    $continuar = trim(fgets(STDIN));
}while($continuar != 'n');

$promedio = $sueldoTotal / $cantEmpleados;

echo "El sueldo promedio es de: " . $promedio;