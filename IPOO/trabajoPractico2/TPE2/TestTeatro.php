<?php
include "Teatro.php";
include "Funcion.php";
main();

function main()
{
    //String $nombre, $direccion
    //Teatro $teatro
    echo "Ingrese el nombre del teatro: ";
    $nombre = trim(fgets(STDIN));
    echo "Ingrese la direccion del teatro: ";
    $direccion = trim(fgets(STDIN));
    $teatro = new Teatro($nombre, $direccion);

    do {
        menu();
        $continuar = opciones($teatro);
    } while ($continuar);
}

//Muestra todas las opciones disponibles
function menu()
{
    echo "Ingrese la opcion que desea realizar:\n";
    echo "1: Cargar una funcion\n";
    echo "2: Mostrar las funciones\n";
    echo "3: Cambiar el nombre del teatro\n";
    echo "4: Cambiar la direccion del teatro\n";
    echo "5: Buscar una funcion\n";
    echo "6: Cambiar el nombre de una funcion\n";
    echo "7: Cambiar el precio de una funcion\n";
    echo "8: Cambiar el horario de una funcion\n";
    echo "9: Cambiar la duracion de una funcion\n";
    echo "0: SALIR \n";
}

//Lee una opcion y realiza la accion correspondiente
function opciones($teatro)
{
    $longitud = count($teatro->getFunciones());
    $retorno = true;
    $cargado = false;
    $opcion = trim(fgets(STDIN));
    switch ($opcion) {
        case 1:
            cargar($teatro);
            $cargado = true;
            break;
        case 2:
            if ($longitud > 0) {
                echo $teatro;
            } else {
                echo "No hay funciones cargadas!\n";
            }
            break;
        case 3:
            cambiarNombreTeatro($teatro);
            break;
        case 4:
            cambiarDireccionTeatro($teatro);
            break;
        case 5:
            buscarFuncion($teatro);
            break;
        case 6:
            cambiarNombreFuncion($teatro);
            break;
        case 7:
            cambiarPrecioFuncion($teatro);
            break;
        case 8:
            cambiarHorarioFuncion($teatro);
            break;
        case 9:
            cambiarDuracionFuncion($teatro);
            break;
        case 0:
            $retorno = false;
            break;
        default:
            echo "Opcion invalida, por favor ingrese una opcion valida\n";
    }
    return $retorno;
}

//OPCION 1
function cargar($teatro)
{
    //String $nombre, $horaInicio
    //int $precio, $duracion
    //Funcion $nuevaFuncion
    //boolean $seSolapa, $existe
    do {
        echo "Ingrese el nombre de la funcion: ";
        $nombre = trim(fgets(STDIN));
        $existe = $teatro->existeFuncion($nombre);
    } while ($existe != -1);
    echo "Ingrese el precio de la funcion: ";
    $precio = trim(fgets(STDIN));
    echo "Ingrese la hora de inicio de la funcion (hs:min): ";
    $horaInicio = trim(fgets(STDIN));
    echo "Ingrese la duracion de la funcion (en minutos): ";
    $duracion = trim(fgets(STDIN));

    $nuevaFuncion = new Funcion($nombre, $precio, $horaInicio, $duracion);
    $seSolapa = $teatro->seSolapan($nuevaFuncion);

    while ($seSolapa) {
        echo "Ingrese un nuevo horario para la funcion: ";
        $horaInicio = trim(fgets(STDIN));
        $nuevaFuncion->setHoraInicio($horaInicio);
        $seSolapa = $teatro->seSolapan($nuevaFuncion);
    }
    $arregloFunciones = $teatro->getFunciones();
    $arregloFunciones[count($arregloFunciones)] = $nuevaFuncion;
    $teatro->setFunciones($arregloFunciones);
}

//OPCION 3
function cambiarNombreTeatro($teatro)
{
    //String $nuevoNombre
    echo "Ingrese el nuevo nombre del teatro: ";
    $nuevoNombre = trim(fgets(STDIN));
    $teatro->setNombre($nuevoNombre);
}

//OPCION 4
function cambiarDireccionTeatro($teatro)
{
    //String $nuevaDireccion
    echo "Ingrese la nueva direccion del teatro: ";
    $nuevaDireccion = trim(fgets(STDIN));
    $teatro->setDireccion($nuevaDireccion);
}

//OPCION 5
function buscarFuncion($teatro)
{
    //String $funcionBuscada
    //int $posFuncion
    echo "Ingrese el nombre de la funcion que busca: ";
    $funcionBuscada = trim(fgets(STDIN));
    $posFuncion = $teatro->existeFuncion($funcionBuscada); //Retorno la posicion en que se encuentra la funcion

    if ($posFuncion == -1) {
        echo "La funcion buscada no se encuentra en el teatro.\n";
    } else {
        echo "La funcion se encuentra en la posicion " . $posFuncion . ".\n";
    }
}

//OPCION 6
function cambiarNombreFuncion($teatro)
{
    //String $funcionBuscada, $nuevoNombre
    //int $posFuncion
    //Array Funcion $arregloFunciones
    echo "Ingrese el nombre de la funcion que quiere cambiar: ";
    $funcionBuscada = trim(fgets(STDIN));
    $posFuncion = $teatro->existeFuncion($funcionBuscada); //Retorno la posicion en que se encuentra la funcion

    if ($posFuncion == -1) {
        echo "La funcion ingresada no se encuentra en el teatro.\n";
    } else {
        $arregloFunciones = $teatro->getFunciones();
        echo "Ingrese el nombre por el que desea cambiarlo: ";
        $nuevoNombre = trim(fgets(STDIN));
        $arregloFunciones[$posFuncion]->setNombre($nuevoNombre);
        $teatro->setFunciones($arregloFunciones);
    }
}

//OPCION 7
function cambiarPrecioFuncion($teatro)
{
    //String $funcionBuscada
    //float $nuevoPrecio
    //int $posFuncion
    //Array Funcion $arregloFunciones
    echo "Ingrese el nombre de la funcion para modificar el precio: ";
    $funcionBuscada = trim(fgets(STDIN));
    $posFuncion = $teatro->existeFuncion($funcionBuscada);

    if ($posFuncion == -1) {
        echo "La funcion ingresada no se encuentra en el teatro.\n";
    } else {
        $arregloFunciones = $teatro->getFunciones();
        echo "Ingrese el precio por el que desea cambiarlo: ";
        $nuevoPrecio = trim(fgets(STDIN));
        $arregloFunciones[$posFuncion]->setPrecio($nuevoPrecio);
        $teatro->setFunciones($arregloFunciones);
    }
}

//OPCION 8
function cambiarHorarioFuncion($teatro)
{
    //String $funcionBuscada, $nuevoHorario
    //Funcion $f
    //int $posFuncion
    //Array Funcion $arregloFunciones
    //boolean $seSolapa
    echo "Ingrese el nombre de la funcion para modificar el horario: ";
    $funcionBuscada = trim(fgets(STDIN));
    $posFuncion = $teatro->existeFuncion($funcionBuscada);

    if ($posFuncion == -1) {
        echo "La funcion ingresada no se encuentra en el teatro.\n";
    } else {
        $arregloFunciones = $teatro->getFunciones();
        $f = $arregloFunciones[$posFuncion];
        do { //Itera mientras que hora ingresada haga que se solape con otra funcion
            echo "Ingrese el nuevo horario por el que desea cambiarlo (hs:min): ";
            $nuevoHorario = trim(fgets(STDIN));
            $f->setHoraInicio($nuevoHorario);
            $seSolapa = $arregloFunciones->seSolapan($f);
        } while ($seSolapa);
        $arregloFunciones[$posFuncion] = $f;
        $teatro->setFunciones($arregloFunciones);
    }
}

//OPCION 9
function cambiarDuracionFuncion($teatro)
{
    echo "Ingrese el nombre de la funcion para modificar la duracion: ";
    $funcionBuscada = trim(fgets(STDIN));
    $posFuncion = $teatro->existeFuncion($funcionBuscada);

    if ($posFuncion == -1) {
        echo "La funcion ingresada no se encuentra en el teatro.\n";
    } else {
        $arregloFunciones = $teatro->getFunciones();
        $f = $arregloFunciones[$posFuncion];
        do { //Itera mientras que la duracion ingresada haga que se solape con otra funcion
            echo "Ingrese la nueva duracion por la que desea cambiarla (en minutos): ";
            $nuevaDuracion = trim(fgets(STDIN));
            $f->setDuracion($nuevaDuracion);
            $seSolapa = $arregloFunciones->seSolapan($f);
        } while ($seSolapa);
        $arregloFunciones[$posFuncion] = $f;
        $teatro->setFunciones($arregloFunciones);
    }
}
