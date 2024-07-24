<?php

    // $variavel = "Carol";
    // $nome = &$variavel;

    // echo "\n".$nome;

    // $variavel = "Karina";
    // echo "\n".$nome;

    // print_r(get_defined_vars());


    $nome_var = "codigo";
    $codigo = 9000;

    echo "$nome_var = " . $$nome_var;
    echo "\n\n";
    echo "$nome_var = " . $codigo;
?>