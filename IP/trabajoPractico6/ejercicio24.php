<?php
//PROGRAMA PRINCIPAL
/*Este programa lee una serie de datos de alumnos de un secundario e imprime la altura y edad
del alumno de mayor edad, el peso y la edad del alumno con menor edad, y el peso promedio*/
//int $edad, $anioNacimiento, $mayorEdad, $menorEdad, $cantAlumnos
//float $altura, $peso, $pesoMenorEdad, $alturaMayorEdad, $pesoPromedio, $pesoTotal
//char $continuar
$mayorEdad = 0;
$menorEdad = 999;
$cantAlumnos = 0;

do {
    echo "Ingrese el anio de nacimiento: ";
    $anioNacimiento = trim(fgets(STDIN));
    $edad = 2020 - $anioNacimiento;
    echo "Ingrese la altura (metros): ";
    $altura = trim(fgets(STDIN));
    echo "Ingrese el peso: ";
    $peso = trim(fgets(STDIN));
    $cantAlumnos++;
    $pesoTotal += $peso;

    if ($edad >= $mayorEdad) {
        $mayorEdad = $edad;
        $alturaMayorEdad = $altura;
    }

    if ($edad <= $menorEdad) {
        $menorEdad = $edad;
        $pesoMenorEdad = $peso;
    }

    echo "¿Desea ingresar otro alumno? (S/N): ";
    $continuar = trim(fgets(STDIN));

} while ($continuar != "N");

$pesoPromedio = $pesoTotal / $cantAlumnos;

echo "El alumno mayor tiene " . $mayorEdad . " anios y mide " . $alturaMayorEdad . " metros de altura \n";
echo "El alumno menor tiene " . $menorEdad . " anios y pesa " . $pesoMenorEdad . " kilos \n";
echo "El peso promedio es de: " . $pesoPromedio . " kilos";