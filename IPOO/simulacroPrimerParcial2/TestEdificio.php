<?php
include 'Inquilino.php';
include 'Inmueble.php';
include 'Edificio.php';

$inquilino1 = new Inquilino("DNI", 12333456, "Pepe", "Suarez", 4456722);
$inquilino2 = new Inquilino("DNI", 12333422, "Pedro", "Suarez", 446678);
$administrador = new Inquilino("DNI", 27432561, "Carlos", "Martinez", 154321233);

$inmueble1 = new Inmueble(11, 1, "local comercial", 50000, $inquilino1);
$inmueble2 = new Inmueble(12, 1, "local comercial", 50000, null);
$inmueble3 = new Inmueble(13, 2, "departamento", 35000, $inquilino2);
$inmueble4 = new Inmueble(14, 2, "departamento", 35000, null);
$inmueble5 = new Inmueble(15, 3, "departamento", 35000, null);

$coleccionInmuebles = [$inmueble1, $inmueble2, $inmueble3, $inmueble4, $inmueble5];

$edificio = new Edificio("Juan B. Justo 3456", $coleccionInmuebles, $administrador);
$edificio->ordenarPorPiso();

//INCISO 4
echo "EJECUTANDO INCISO 4...";
$inmueblesDisponibles = $edificio->darInmueblesDisponiblesParaAlquiler("local comercial", 4000);
mostrarColeccion($inmueblesDisponibles);

//INCISO 5
echo "EJECUTANDO INCISO 5...";
$inquilino3 = new Inquilino("DNI", 28765436, "Mariela", "Suarez", 25543562);
($edificio->registrarAlquilerInmueble($inmueble5, $Inquilino3)) ? "OK!" : "ERROR";

//INCISO 6
echo "EJECUTANDO INCISO 6...";
($edificio->registrarAlquilerInmueble($inmueble4, $Inquilino3)) ? "OK!" : "ERROR";

//INCISO 7
echo "EJECUTANDO INCISO 7...";
echo $edificio->calcularCostoEdificio();

//INCISO 8
echo "EJECUTANDO INCISO 8...";
echo $edificio;

function mostrarColeccion($coleccion)
{
    for ($i = 0; $i < count($coleccion); $i++) {
        echo $coleccion[$i] . "\n";
    }
}
