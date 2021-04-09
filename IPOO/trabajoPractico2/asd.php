<?php
include 'Tramite.php';
echo strtotime("now"), "\n";
//$asd = strtotime("10 September 2000");
$asd = time() - 10800;
echo date('r', $asd);
echo strtotime("+1 day"), "\n";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n\n\n\n\n";

$fechaI = "2 July 1999";
$fechaC = "10 July 2001";
$tipo = "caca";



$fI = "2 July 1999 22:00:01";
$fI = strtotime($fI);
echo $fechaI , " == " , $fI , "\n";

$fechaI = strtotime($fI);
$fechaC = strtotime($fechaC);

$tramite = new Tramite($tipo, $fechaI, $fechaC);
echo $tramite;