<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aulaweb2";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Conexão falhou" . mysqli_connect_error());
}

$sql = "INSERT INTO usuario (nome, telefone, email, senha)
        VALUES ('nathan','4212341234', 'nathan@email.com', 'senha123')";
$result = mysqli_query($conn, $sql);

print_r($result);