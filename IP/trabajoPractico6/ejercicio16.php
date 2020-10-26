<?php
//PROGRAMA PRINCIPAL
/*Este programa lee un numero y una secuencia de numeros,
e imprime si el numero se encuentra en la secuencia*/
//int $num, $secuencia
//boolean $encontrado
echo "Ingrese un numero para verificar si se ingresa en la secuencia: ";
$num = trim(fgets(STDIN));
$encontrado = false;

do {
    echo "Ingrese un numero: ";
    $secuencia = trim(fgets(STDIN));

    if ($num == $secuencia) {
        $encontrado = true;
    }

} while (!$encontrado && $secuencia != -1);

if ($encontrado) {
    echo "Numero encontrado";
} else {
    echo "Numero no encontrado";
}
