<?php
include "Aerolinea.php";
include "Vuelo.php";
include "Avion.php";
include "Destino.php";
include "Pasajero.php";
include "Internacional.php";
include "Nacional.php";

//INCISO 1
echo "EJECUTANDO INCISO 1...\n";
$d1 = new Destino("Neuquen", "Neuquen");
$d2 = new Destino("Bariloche", "Rio Negro");

//INCISO 2
echo "EJECUTANDO INCISO 2...\n";
$av1 = new Avion(0, 1, 1);
$av2 = new Avion(1, 1, 1);

//INCISO 3
echo "EJECUTANDO INCISO 3...\n";
$aerolinea = new Aerolinea("Aerolineas Argentinas", []);

//INCISO 4
echo "EJECUTANDO INCISO 4...\n";
$p1 = new Pasajero(123456, 21581720, "Argentina", "Juan", "Perez");
$p2 = new Pasajero(456789, 41591884, "Argentina", "Maria", "Rodriguez");

//INCISO 5
echo "EJECUTANDO INCISO 5...\n";
$coleccion = [
    "partida" => "22:00",
    "hora de llegada al destino" => "23:50",
    "importe" => 1000,
];
$vuelo1 = $aerolinea->configurarVuelo($d1, $av1, $coleccion);
$coleccionVuelos = $aerolinea->getColeccionVuelos();
array_push($coleccionVuelos, $vuelo1);
$aerolinea->setColeccionVuelos($coleccionVuelos);

echo "VUELO 1:\n" . $vuelo1 . "\n";

$vuelo2 = $aerolinea->configurarVuelo($d2, $av2, $coleccion);
$coleccionVuelos = $aerolinea->getColeccionVuelos();
array_push($coleccionVuelos, $vuelo2);
$aerolinea->setColeccionVuelos($coleccionVuelos);

echo "VUELO 2:\n" . $vuelo2 . "\n";

//INCISO 6
echo "EJECUTANDO INCISO 6...\n";
$costo1 = $aerolinea->venderVuelo(0, $p1, "Economica");
echo "$" . $costo1 . "\n";

//INCISO 7
echo "EJECUTANDO INCISO 7...\n";
$costo2 = $aerolinea->venderVuelo(0, $p2, "Economica");
echo "$" . $costo2 . "\n";
