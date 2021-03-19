<?php
//PROGRAMA PRINCIPAL
//int posicion
//array $coleccionVinos
//array $datosVinos

$datosVinos = [];
//Realizo la carga de la coleccion de los vinos
$coleccionVinos = [
    //A cada posicion le asigno arreglos donde se almacenan los datos de los vinos
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

//Muestra por pantalla el contenido de la coleccion
print_r($coleccionVinos);
$datosVinos = cantidadYPromedio($coleccionVinos); //Invoco al modulo que va a crear el arreglo con los datos

//Muestra por pantalla la cantidad de botellas y precio promedio de cada tipo de vino
print_r($datosVinos);

/**
 * MODULO cantidadYPromedio
 *
 * Este modulo recibe la coleccion de vinos por parametro y retorna un arreglo con los datos
 * de la cantidad de botellas de cada tipo de vino y el precio promedio
 *
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
    while ($i < count($colVinos)) { //Itera mientras se encuentre dentro del arreglo
        switch ($i) { //Segun cada posicion del arreglo, se asigna un diferente tipo de vino
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
        for ($j = 0; $j < count($colVinos[$vino]); $j++) { //Realiza la suma de las botellas y los precios
            $sumaBotellas += $colVinos[$vino][$j]["cantidadBotellas"];
            $precioTotal += $colVinos[$vino][$j]["precioU"];
        }
        //Calcula el promedio del precio por botella
        $precioPromedio = $precioTotal / $sumaBotellas;
        //Asigna ambas variables al arreglo con los datos
        $botellasYPrecio = [
            "totalBotellas" => $sumaBotellas,
            "precioPromedio" => $precioPromedio,
        ];
        //Asigna el arreglo anterior a la ultima posicion del arreglo que sera retornado
        $datos[$vino] = $botellasYPrecio;
        //Pasa a la siguiente posicion
        $i++;
    }
    return $datos;
}
