<?php
    $ginastas[0]["nome"] = "Jade";
    $ginastas[0]["nota"] = 12.95;
    $ginastas[0]["pais"] = "Brasil";
    $ginastas[1]["nome"] = "Shawn";
    $ginastas[1]["nota"] = 13.50;
    $ginastas[1]["pais"] = "EUA";
    $ginastas[2]["nome"] = "Daiane";
    $ginastas[2]["nota"] = 14.35;
    $ginastas[2]["pais"] = "Brasil";
    $ginastas[3]["nome"] = "Nadia";
    $ginastas[3]["nota"] = 12.90;
    $ginastas[3]["pais"] = "Romênia";

    echo "Nome das ginastas: <br>";
    foreach ($ginastas as $ginasta) {
        echo $ginasta["nome"] . "<br>";
    }
    echo "<br>";

    $somamedias = 0;
    $contador = 0;

    $maiornota = 0;
    $nomemaiornota = "";
    foreach ($ginastas as $ginasta) {
        $somamedias += $ginasta["nota"];
        $contador += 1;

        if ($ginasta["nota"] > $maiornota) {
            $maiornota = $ginasta["nota"];
            $nomemaiornota = $ginasta["nome"];
        }
    }
    $media = $somamedias / $contador;
    echo "Média de notas: <br>" . $media . "<br><br>";

    echo "Ginastas com notas superiores a 13: <br>";
    foreach ($ginastas as $ginasta) {
        if ($ginasta["nota"] >= 13) {
            echo $ginasta["nome"] . "<br>";
        }
    }
    echo "<br>";

    echo "Ginastas brasileiras: <br>";
    foreach ($ginastas as $ginasta) {
        if ($ginasta["pais"] == "Brasil") {
            echo $ginasta["nome"] . "<br>";
        }
    }
    echo "<br>";

    $brasil = 0;
    $eua = 0;
    $romenia = 0;
    echo "Quantidade de ginastas por pais";
    foreach ($ginastas as $ginasta) {
        if ($ginasta["pais"] == "Brasil") {
            $brasil += 1;
        }
        elseif ($ginasta["pais"] == "EUA") {
            $eua += 1;
        }
        elseif ($ginasta["pais"] == "Romênia") {
            $romenia += 1;
        }
    }
    echo "<br> Brasil: " . $brasil;
    echo "<br> EUA: " . $eua;
    echo "<br> Romênia: " . $romenia . "<br><br>";

    echo "Ginasta com a nota mais alta: <br>" . $nomemaiornota;