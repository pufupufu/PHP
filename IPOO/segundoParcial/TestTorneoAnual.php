<?php
include "Categoria.php";
include "Equipo.php";
include "Partido.php";
include "Torneo.php";
include "TorneoProvincial.php";
include "TorneoNacional.php";
include "MinisterioDeporte.php";

//INCISO 1
echo "EJECUTANDO INCISO 1...\n";
$objCategoria = new Categoria("mayores", "mas de 30 anios");
$objE1 = new Equipo("Sacachispas", "Jose", 11, $objCategoria);
$objE2 = new Equipo("River", "Pablo", 11, $objCategoria);
$objE3 = new Equipo("Boca", "Pedro", 11, $objCategoria);
$objE4 = new Equipo("Gimnasia", "Juan", 11, $objCategoria);
$objE5 = new Equipo("Estudiantes", "Martin", 11, $objCategoria);
$objE6 = new Equipo("Racing", "Luis", 11, $objCategoria);
$objE7 = new Equipo("Independiente", "Diego", 11, $objCategoria);
$objE8 = new Equipo("Argentinos", "Jorge", 11, $objCategoria);
$objE9 = new Equipo("Colon", "Matias", 11, $objCategoria);
$objE10 = new Equipo("Sacachispas", "Jose", 11, $objCategoria);
$objE11 = new Equipo("Huracan", "Rodrigo", 11, $objCategoria);
$objE12 = new Equipo("San Lorenzo", "Miguel", 11, $objCategoria);

$objPart1 = new Partido(0, $objE7, $objE8, "10/02/10", 80, 120);
$objPart2 = new Partido(1, $objE9, $objE10, "11/02/10", 81, 110);
$objPart3 = new Partido(2, $objE11, $objE12, "11/02/10", 115, 85);
$objPart4 = new Partido(3, $objE1, $objE2, "10/02/10", 3, 2);
$objPart5 = new Partido(4, $objE3, $objE4, "11/02/10", 0, 1);
$objPart6 = new Partido(5, $objE5, $objE6, "10/02/10", 2, 3);

//INCISO 2
echo "EJECUTANDO INCISO 2...\n";
$partidosProvinciales = [$objPart1, $objPart2, $objPart3];

//INCISO 3
echo "EJECUTANDO INCISO 3...\n";
$partidosNacionales = [$objPart4, $objPart5, $objPart6];

//INCISO 4
echo "EJECUTANDO INCISO 4...\n";
$ministerioDeporte = new MinisterioDeporte(2010, []);

//INCISO 5
echo "EJECUTANDO INCISO 5...\n";
$arrayAsociativo1 = [
    "idTorneo" => 0,
    "premio" => 1000,
    "localidad" => "Neuquen",
    "provincia" => "Neuquen",
];

$torneo1 = $ministerioDeporte->registrarTorneo($partidosProvinciales, "provincial", $arrayAsociativo1);
echo "TORNEO 1 CREADO:\n" . $torneo1;

//INCISO 6
echo "EJECUTANDO INCISO 6...\n";
$arrayAsociativo2 = [
    "idTorneo" => 1,
    "premio" => 1000,
    "localidad" => "La Plata",
];

$torneo2 = $ministerioDeporte->registrarTorneo($partidosNacionales, "nacional", $arrayAsociativo2);
echo "TORNEO 2 CREADO:\n" . $torneo2;

//INCISO 7
echo "EJECUTANDO INCISO 7...\n";
$premioTorneo1 = $ministerioDeporte->otorgarPremioTorneo($torneo1->getIdTorneo());
echo "PREMIO DEL TORNEO:\n" . asociativoAString($premioTorneo1) . "\n";

//INCISO 8
echo "EJECUTANDO INCISO 8...\n";
$premioTorneo2 = $ministerioDeporte->otorgarPremioTorneo($torneo2->getIdTorneo());
echo "PREMIO DEL TORNEO:\n" . asociativoAString($premioTorneo2) . "\n";

//INCISO 9
echo "EJECUTANDO INCISO 9...\n";
echo $ministerioDeporte;

echo ($objE1 == $objE10) ? "true" : "false";

//Metodo que retorna el arreglo asociativo del ganador como un string
function asociativoAString($coleccion)
{
    $retorno1 = $coleccion['ganador'];
    $retorno2 = $coleccion['premio'];
    echo $retorno1 . "\n";
    echo $retorno2 . "\n";
    return $retorno1;
}
