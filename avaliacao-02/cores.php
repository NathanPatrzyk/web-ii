<?php
require_once 'idioma.php';

if ((!isset($_COOKIE["idioma"])) || ($_COOKIE['idioma'] == "portugues")) {
    $cores = array("Azul", "Verde", "Vermelho", "Branco");
    $titulo = "Cores";
}
if ($_COOKIE['idioma'] == 'ingles') {
    $objetos = array("Blue", "Green", "Red", "White");
    $titulo = "Colors";
}
if ($_COOKIE['idioma'] == 'espanhol') {
    $objetos = array("Azul", "Verde", "Rojo", "Blanco");
    $titulo = "Colores";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cores</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex justify-center items-center">
    <div class="flex flex-col gap-2 text-center">
        <?php
        echo '<strong class="text-sky-700">' . $titulo . '</strong>';
        foreach ($cores as $cor) {
            echo '<span class="text-sky-950">' . $cor . '</span>';
        }
        ?>
    </div>
</body>

</html>