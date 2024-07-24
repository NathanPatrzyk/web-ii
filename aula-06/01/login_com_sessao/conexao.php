<?php
    // $servidor   = "localhost";
    // $usuario    = "root";
    // $senha      = "password";
    // $banco      = "aulas";
    // $port       = 3307;
        
    // $conexao = mysqli_connect($servidor, $usuario, $senha, $banco, $port);

    $servername = "127.0.0.1";
    $username = "root";
    $password = "password";
    $dbname = "db_cadastro";
    $port = 3307;
    
    // Criar conexão
    $conexao = mysqli_connect($servername, $username, $password, $dbname, $port);

    if (!$conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }
?>