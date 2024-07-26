<?php
    $nome = $_POST["nome"];
    $acertos = $_POST["q1"] + $_POST["q2"];

    echo "<h1><span style='text-decoration: underline;'>Nome:</span> $nome</h1>";
    echo "<h1><span style='text-decoration: underline;'>Quantidade de Acertos:</span> $acertos</h1>";