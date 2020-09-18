<?php
//PROGRAMA PRINCIPAL

echo lineaBanda(), "\n";
echo campo(), "\n";
echo campo(), "\n";
echo canios(), "\n";
echo lineaMedia(), "\n";
echo lineaMedia(), "\n";
echo lineaMedia(), "\n";
echo lineaMedia(), "\n";
echo canios(), "\n";
echo campo(), "\n";
echo campo(), "\n";
echo lineaBanda(), "\n";

/**
 * MODULO lineaBanda
 * Retorna un string que representa la linea 
 * @return String
 */
function lineaBanda() {
    return "+-------------------+-------------------+";

}

/**
 * MODULO campo
 * @return String
 */
function campo() {
    return "|\t\t    |\t\t\t|";
}

function canios() {
    return "+-------+\t    |    \t+-------+";
}

/**
 * MODULO lineaMedia
 * @return String
 */
function lineaMedia() {
    return "|\t|\t    |\t\t|\t|";
}