<?php

    $frutas = array("maça", "banana", "laranja", "morangos");

    print_r($frutas);

    echo "<br>$frutas[2]";
    echo "<br>" . $frutas[2];

    $cor[1] = "vermelho";
    $cor[2] = "verde";
    $cor[3] = "azul";
    $cor["teste"] = 1;

    echo "<br>";
    print_r($cor);

    $cor = array(1 => "vermelho", 2 => "verde", 3 => "azul", "teste" => 1);

    echo "<br>";
    print_r($cor);

    foreach ($cor as $chave => $valor):
        echo "<br>Chave/indice: $chave Valor: $valor";
    endforeach;

    define("pi", 3.1415);

    echo "<br>" . pi . "<br>";

    for ($i = 0; $i < 10; $i = $i + 2) {
        echo $i . "<br>";
    }

    do {

    }
    while ($quant < 10);


    while ($quant < 10) {

    }

    if ($quant < 10) {

    } elseif ($quant < 10) {

    } else {

    }