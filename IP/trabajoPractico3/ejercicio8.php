<?php
//PROGRAMA geometria
//Este algoritmo realiza varias formulas geometricas
//float radio, diametro, perimetro, supCirculo, volumen, supEsfera
echo "Ingrese el valor del radio: ";
$radio = trim(fgets(STDIN));

$diametro = $radio * 2;
$perimetro = (2 * M_PI) * $radio;
$supCirculo = ($radio * $radio) * M_PI;
$volumen = ((2/3) * M_PI) * ($radio * $radio * $radio);
$supEsfera = (4* M_PI) * ($radio * $radio);

echo "El diametro de la circunferencia es: ". $diametro. "\n";
echo "El perimetro de la circunferencia es: ". $perimetro. "\n";
echo "La superficie del circulo es: ". $supCirculo. "\n";
echo "El volumen de la esfera es: ". $volumen. "\n";
echo "La superficie de la esfera es: ".$supEsfera. "\n";