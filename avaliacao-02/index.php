<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <form action="mudaridioma.php" method="post">
        <?php
        if (!isset($_COOKIE["idioma"])) {
            echo '<input type="radio" name="idioma" value="portugues" checked> Português ';
            echo '<input type="radio" name="idioma" value="ingles"> Inglês ';
            echo '<input type="radio" name="idioma" value="espanhol"> Espanhol ';
        } elseif (isset($_COOKIE["idioma"])) {
            if ($_COOKIE['idioma'] == "portugues") {
                echo '<input type="radio" name="idioma" value="portugues" checked> Português ';
            } else {
                echo '<input type="radio" name="idioma" value="portugues"> Português ';
            }

            if ($_COOKIE['idioma'] == 'ingles') {
                echo '<input type="radio" name="idioma" value="ingles" checked> Inglês ';
            } else {
                echo '<input type="radio" name="idioma" value="ingles"> Inglês ';
            }

            if ($_COOKIE['idioma'] == 'espanhol') {
                echo '<input type="radio" name="idioma" value="espanhol" checked> Espanhol ';
            } else {
                echo '<input type="radio" name="idioma" value="espanhol"> Espanhol ';
            }
        }
        ?>
        <button type="submit"> Escolher idioma </button>
    </form>
    <a href="cores.php"> Cores </a> | <a href="numeros.php"> Números </a> | <a href="objetos.php"> Objetos </a>
</body>

</html>