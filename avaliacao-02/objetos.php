<?php
require_once 'idioma.php';

if ((!isset($_COOKIE["idioma"])) || ($_COOKIE['idioma'] == "portugues")) {
    $objetos = array("Livro", "Caneta", "Mesa");
    $titulo = "Objetos";
}
if ($_COOKIE['idioma'] == 'ingles') {
    $objetos = array("Book", "Pen", "Table");
    $titulo = "Objects";
}
if ($_COOKIE['idioma'] == 'espanhol') {
    $objetos = array("Libro", "Pluma", "Mesa");
    $titulo = "Objetos";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objetos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex justify-center items-center">
    <div class="flex flex-col gap-2 text-center">
        <?php
        echo '<strong class="text-sky-700">' . $titulo . '</strong>';
        foreach ($objetos as $objeto) {
            echo '<span class="text-sky-950">' . $objeto . '</span>';
        }
        ?>
    </div>
</body>

</html>