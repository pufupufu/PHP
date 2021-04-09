<?php
include 'Funcion.php';

$funcion = new Funcion("asd", 123, "12:13", 120);
cambiarNombre($funcion);

echo $funcion;

function cambiarNombre($f) {
    $f->setNombre("caca");
}