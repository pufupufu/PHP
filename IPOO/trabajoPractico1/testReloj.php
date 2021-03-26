<?php
include 'Reloj.php';
$reloj = new Reloj(25, 59, 58);
echo $reloj . "\n";
$reloj->incremento();
echo $reloj . "\n";
$reloj->incremento();
echo $reloj . "\n";
$reloj2 = new Reloj(12, 25, 13);
echo $reloj2 . "\n";
$reloj2->puestaACero();
echo $reloj2 . "\n";
