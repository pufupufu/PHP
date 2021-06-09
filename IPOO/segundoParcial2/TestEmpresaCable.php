<?php
include 'EmpresaCable.php';
include 'Contrato.php';
include 'ContratoWeb.php';
include 'ContratoMostrador.php';
include 'Plan.php';
include 'Canal.php';
include 'Cliente.php';
//INCISO A
echo "EJECUTANDO INCISO A...\n";
$empresaCable = new EmpresaCable([], []);

//INCISO B
echo "EJECUTANDO INCISO B...\n";
$canal1 = new Canal("noticias", 100, true);
$canal2 = new Canal("deportivo", 150, false);
$canal3 = new Canal("infantil", 70, true);

//INCISO C
echo "EJECUTANDO INCISO C...\n";
$arreglo1 = [$canal1, $canal2];
$arreglo2 = [$canal3];
$plan1 = new Plan(111, $arreglo1, 1000);
$plan2 = new Plan(123, $arreglo2, 1000);

//INCISO D
echo "EJECUTANDO INCISO D...\n";
$cliente = new Cliente(12345678, "Santiago", "Scantamburlo");

//INCISO E
echo "EJECUTANDO INCISO E...\n";
$fechaInicio1 = date('d-m-Y');
$fechaVencimiento1 = date('d-m-Y', strtotime($fechaInicio1 . "+ 1 month"));

$contrato1 = new ContratoWeb($fechaInicio1, $fechaVencimiento1, $plan1, "Al dia", 0, true, $cliente);
$contrato2 = new ContratoWeb($fechaInicio1, $fechaVencimiento1, $plan2, "Al dia", 0, true, $cliente);
$contrato3 = new ContratoMostrador($fechaInicio1, $fechaVencimiento1, $plan1, "Al dia", 0, true, $cliente);

//INCISO F
echo "EJECUTANDO INCISO F...\n";
echo "$" . $contrato1->calcularImporte() . "\n";
echo "$" . $contrato2->calcularImporte() . "\n";
echo "$" . $contrato3->calcularImporte() . "\n";

//INCISO G
echo "EJECUTANDO INCISO G...\n";
echo ($empresaCable->incorporarPlan($plan1)) ? "EXITO\n" : "ERROR\n";

//INCISO H
echo "EJECUTANDO INCISO H...\n";
//Si no se setea el valor de los datos incluidos a uno diferente de 50, devolvera error.
//$plan2->setDatosIncluidos(15);
//En caso de pasar por parametro el $plan1, retorna ERROR, sin importar si se cambia el valor de los datos incluidos
//$plan1->setDatosIncluidos(10);
echo ($empresaCable->incorporarPlan($plan2)) ? "EXITO\n" : "ERROR\n";

//INCISO I
echo "EJECUTANDO INCISO I...\n";
$fechaInicio2 = date('d-m-Y');
$fechaVencimiento2 = date('d-m-Y', strtotime($fechaInicio2 . "+ 1 month"));
$empresaCable->incorporarContrato($plan2, $cliente, $fechaInicio2, $fechaVencimiento2, false);

//INCISO J
echo "EJECUTANDO INCISO J...\n";
$empresaCable->incorporarContrato($plan1, $cliente, $fechaInicio2, $fechaVencimiento2, true);

//INCISO K
echo "EJECUTANDO INCISO K...\n";
echo "$" . $empresaCable->pagarContrato($contrato3) . "\n";

//INCISO L
echo "EJECUTANDO INCISO L...\n";
echo "$" . $empresaCable->pagarContrato($contrato1) . "\n";

//INCISO M
echo "EJECUTANDO INCISO M...\n";
echo "$" . $empresaCable->retornarImporteContratos(111);