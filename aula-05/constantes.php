<?php
// $VALOR = 20;
// define("VALOR", 10);

// echo "\n\n";
// echo $VALOR;
// echo "\n\n";
// echo VALOR;

// define("PI", 3.14);

// if (defined("PI")) {
// echo "\nConstante valor já existe";
// } else {
// echo "\nConstante valor NÃO existe";
// }

// echo "\n";
// echo __FILE__;
// echo "\n";
// echo __DIR__;
// echo "\n";
// echo __LINE__;
// echo "\n";
// echo __FUNCTION__;

// function calcularIMC() {
// $x = 10;
// echo "\n";
// echo __FUNCTION__;
// }

// calcularIMC();

// function CalcularRaizQuadrada($x) {
// echo "\nO valor da raiz é: " . sqrt($x);
// echo "\n";
// echo __NAMESPACE__;
// }

// CalcularRaizQuadrada(9);
// echo "\n";

print_r(get_defined_constants());
