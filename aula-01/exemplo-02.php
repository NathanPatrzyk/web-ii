<?php

    $nome = "Nathan";
    echo $nome . "<br>";

    $nome = 2;
    echo $nome . "<br>";
    
    echo gettype($nome) . "<br>";

    echo $nome . "<br>";

    echo "A variável nome é inteiro? ";
    echo is_integer($nome);

    if(is_integer($nome))
        echo "Sim";
    else
        echo "Não";

    echo is_integer($nome) ? "Sim" : "Não";