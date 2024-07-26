<?php
    $nome = $_POST["nome"];
    $sexo = $_POST["sexo"] == "f" ? "Feminino" : "Masculino";
    $curso = $_POST["curso"] == "agro" ? "Agropecuária" : "Informática";
    $segredo = $_POST["segredo"];

    echo "<h1><span style='text-decoration: underline;'>Nome:</span> $nome</h1>";
    echo "<h1><span style='text-decoration: underline;'>Sexo:</span> $sexo</h1>";
    echo "<h1><span style='text-decoration: underline;'>Curso:</span> $curso</h1>";
    echo "<h1><span style='text-decoration: underline;'>Segredo:</span> $segredo</h1>";