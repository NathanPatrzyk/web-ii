<?php
require_once 'idioma.php';

if ((!isset($_COOKIE["idioma"])) || ($_COOKIE['idioma'] == "portugues")) {
    $numeros = array("Um", "Dois", "Três", "Quatro");
    $titulo = "Números";
}
if ($_COOKIE['idioma'] == 'ingles') {
    $numeros = array("One", "Two", "Three", "Four");
    $titulo = "Numbers";
}
if ($_COOKIE['idioma'] == 'espanhol') {
    $numeros = array("Uno", "Dos", "Tres", "Cuatro");
    $titulo = "Números";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex justify-center items-center">
    <div class="flex flex-col gap-2 text-center">
        <?php
        echo '<strong class="text-sky-700">' . $titulo . '</strong>';
        foreach ($numeros as $numero) {
            echo '<span class="text-sky-950">' . $numero . '</span>';
        }
        ?>
    </div>
</body>

</html>