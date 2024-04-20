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

$sql = "INSERT INTO usuario (nome, telefone, email, usuario, senha)
        VALUES ('nathan','4212341234', 'nathan@email.com', 'nathan', 'senha123')";

$result = mysqli_query($conn, $sql);

//print_r($result);
//echo"<br>";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white">
    <div class="p-8">
        <div class="grid grid-cols-6 gap-2 font-medium text-center">
            <div>Id</div>
            <div>Nome</div>
            <div>Telefone</div>
            <div>Email</div>
            <div>Usuario</div>
            <div>Senha</div>
        </div>
    
        <?php
            $sql = "SELECT * FROM usuario";

            $result = mysqli_query($conn, $sql);

            //print_r($result);
            //echo"<br>";

            //echo mysqli_num_rows($result) . " linhas existentes na tabela.<br>";
            while ($linha = mysqli_fetch_array($result)) {
                echo "<div class='grid grid-cols-6 gap-2 text-center'>";
                    echo "<div>".$linha[0]."</div>";
                    echo "<div>".$linha[1]."</div>";
                    echo "<div>".$linha[2]."</div>";
                    echo "<div>".$linha[3]."</div>";
                    echo "<div>".$linha[4]."</div>";
                    echo "<div>".$linha[5]."</div>";
                echo "</div>";
            }
            
        ?>

    </div>
</body>
</html>