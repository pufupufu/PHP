<?php
//PROGRAMA PRINCIPAL
//int posicion
//array $coleccionVinos
//array $datosVinos

$coleccionVinos = [
    "Malbec" => [
        0 => ["cantidadBotellas" => 25, "anioProd" => 2001, "precioU" => 251.3],
        1 => ["cantidadBotellas" => 30, "anioProd" => 1999, "precioU" => 230.5],
        2 => ["cantidadBotellas" => 2, "anioProd" => 2018, "precioU" => 198.6],
    ],
    "Merlot" => [
        0 => ["cantidadBotellas" => 21, "anioProd" => 2005, "precioU" => 323.0],
        1 => ["cantidadBotellas" => 15, "anioProd" => 2015, "precioU" => 315.1],
    ],
    "Cabernet Sauvignon" => [
        0 => ["cantidadBotellas" => 40, "anioProd" => 2008, "precioU" => 255.0],
        1 => ["cantidadBotellas" => 26, "anioProd" => 2019, "precioU" => 243.7],
    ],
];

print_r($coleccionVinos);
$datosVinos = cantidadYPromedio($coleccionVinos);

print_r($datosVinos);

/**
 * MODULO cantidadYPromedio
 * @param array $colVinos
 * @return array $datos
 */
function cantidadYPromedio($colVinos)
{
    //String $vino
    //int $i, $j, $sumaBotellas, $contador
    //float $precioTotal, $precioPromedio
    $datos = [];
    $i = 0;
    while ($i < count($colVinos)) {
        switch ($i) {
            case 0:
                $vino = "Malbec";
                break;
            case 1:
                $vino = "Merlot";
                break;
            case 2:
                $vino = "Cabernet Sauvignon";
                break;
        }

        $sumaBotellas = 0;
        $precioTotal = 0;
        for ($j = 0; $j < count($colVinos[$vino]); $j++) {
            $sumaBotellas += $colVinos[$vino][$j]["cantidadBotellas"];
            $precioTotal += $colVinos[$vino][$j]["precioU"];
        }
        $precioPromedio = $precioTotal / $sumaBotellas;
        $botellasYPrecio = [
            "totalBotellas" => $sumaBotellas,
            "precioPromedio" => $precioPromedio,
        ];
        $datos[count($datos)] = $botellasYPrecio;
        $i++;
    }
    return $datos;
}
