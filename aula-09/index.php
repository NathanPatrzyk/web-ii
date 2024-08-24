<?php
require_once("autoload.php");

$produto = new Produto();
$produto->setDescricao("Arroz");
$produto->setValor(20);

echo "Produto Cadastrado: ";
echo $produto->getDescricao();
echo "<br>";
echo "Valor: ";
echo $produto->getValor();

echo "<br><br>";

$cliente = new Cliente();
$cliente->setNome("Nathan");
$cliente->setCidade("Irati");

echo "Cliente Cadastrado: ";
echo $cliente->getNome();
echo "<br>";
echo "Cidade: ";
echo $cliente->getCidade();

echo "<br><br>";

echo Data_hora::agora();