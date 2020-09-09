<?php
//PROGRAMA mayoriaEdad
//boolean esMayor
//int edad
//String nombre, mensaje
echo "Ingrese su nombre: ";
$nombre = trim(fgets(STDIN));
echo "Ingrese su edad: ";
$edad = trim(fgets(STDIN));

$esMayor = $edad >= 18;
$mensaje = $esMayor ? $nombre. " es mayor de edad" : "Es menor de edad";
echo $mensaje;
?>