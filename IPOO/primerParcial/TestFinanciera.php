<?php
include 'Financiera.php';
include 'Prestamo.php';
include 'Cuota.php';
include 'Persona.php';

main();

function main()
{
    //INCISO 1
    echo "EJECUTANDO INCISO 1...\n";
    $financiera = new Financiera("Money", "Av. Arg 1234");

    //INCISO 2
    echo "EJECUTANDO INCISO 2...\n";
    $persona1 = new Persona("Pepe", "Flores", 45325745, "Bs As 12", "dir@mail.com", 299444567, 40000);
    $persona2 = new Persona("Luis", "Suarez", 23586432, "Bs As 123", "dir@mail.com", 2994455, 6250);
    $prestamo1 = new Prestamo(1, 50000, 5, 0.1, $persona1);
    $prestamo2 = new Prestamo(2, 10000, 4, 0.1, $persona2);
    $prestamo3 = new Prestamo(3, 10000, 2, 0.1, $persona2);

    //INCISO 3
    echo "EJECUTANDO INCISO 3...\n";
    $financiera->incorporarPrestamo($prestamo1);
    $financiera->incorporarPrestamo($prestamo2);
    $financiera->incorporarPrestamo($prestamo3);

    //INCISO 4
    echo "EJECUTANDO INCISO 4...\n";
    echo $financiera . "\n";

    //INCISO 5
    echo "EJECUTANDO INCISO 5...\n";
    $financiera->otorgarPrestamoSiCalifica();

    //INCISO 6
    echo "EJECUTANDO INCISO 6...\n";
    echo $financiera . "\n";

    //INCISO 7
    echo "EJECUTANDO INCISO 7...\n";
    $objCuota = $financiera->informarCuotaAPagar(2);

    //INCISO 8
    echo "EJECUTANDO INCISO 8...\n";
    echo (is_null($objCuota)) ? "ERROR\n" : $objCuota . "\n";

    //INCISO 9
    echo "EJECUTANDO INCISO 9...\n";
    //Esto lo hago porque sino va a tener referencias nulas. Con el ejemplo del parcial, los incisos 10, 11 y 12 nunca se ejecutaran.
    //Con un valor superior a 6250 de neto, los incisos se ejecutan sin problemas
    if (is_null($objCuota)) {
        echo "LOS SIGUIENTES INCISOS NO SE VAN A EJECUTAR\n"; 
    } else {
        echo "$" . $objCuota->darMontoFinalCuota() . "\n";

        //INCISO 10
        echo "EJECUTANDO INCISO 10...\n";
        $objCuota->setCancelada(true);

        //INCISO 11
        echo "EJECUTANDO INCISO 11...\n";
        $objCuota = $financiera->informarCuotaAPagar(2);

        //INCISO 12
        echo "EJECUTANDO INCISO 12...\n";
        echo (is_null($objCuota)) ? "ERROR\n" : $objCuota . "\n";
    }
}
