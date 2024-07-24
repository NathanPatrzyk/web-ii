<?php
    //setcookie("usuario", "Joaquim da silva");
    //setcookie("usuario2", "Marcos de Melo", time()+86400);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p>Página padrão</p>

    <?php
        // echo $_COOKIE["usuario"];
        // echo "<br>";
        // echo $_COOKIE["usuario2"];

        if (isset($_COOKIE["usuario2"])) 
            echo "Bem vindo " . $_COOKIE["usuario"] . "!<br>";
        else
            echo "Usuário novo, seja bem-vindo!<br>";


        setcookie("usuario2");
        
    ?>
</body>
</html>