<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aulaweb2";
$port = 3306;

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Conexão falhou. " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <table class="table table-hover table-striped">
        <th>
        <td>Nome</td>
        <td>Telefone</td>
        <td>Email</td>
        <td>Usuario</td>
        <td>Senha</td>
        </th>

        <?php
        $sql = "SELECT * FROM usuario";
        $result = mysqli_query($conn, $sql);

        while ($linha = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>$linha[0]</td>";
            echo "<td>$linha[1]</td>";
            echo "<td>$linha[2]</td>";
            echo "<td>$linha[3]</td>";
            echo "<td>$linha[4]</td>";
            echo "<td>$linha[5]</td>";
            echo "<tr>";
        }
        ?>
    </table>
    <p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample"
            aria-expanded="false" aria-controls="collapseWidthExample">
            Ver quantidade de linhas
        </button>
    </p>
    <div style="min-height: 120px;">
        <div class="collapse collapse-horizontal" id="collapseWidthExample">
            <div class="card card-body" style="width: 300px;">
                <?php
                echo mysqli_num_rows($result) . " linhas existentes na tabela.<br>";
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>