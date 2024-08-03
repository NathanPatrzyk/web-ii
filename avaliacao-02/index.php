<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex justify-center items-center">
    <div class="flex flex-col gap-4">
        <form class="flex flex-col gap-4" action="mudaridioma.php" method="post">
            <div class="text-sky-950 flex gap-4 justify-center flex-wrap">
                <?php
                if ((!isset($_COOKIE["idioma"])) || ($_COOKIE['idioma'] == "portugues")) {
                    echo '<div class="flex gap-1"><input class="accent-sky-700" type="radio" name="idioma" value="portugues" checked>Português</div>';
                    echo '<div class="flex gap-1"><input class="accent-sky-700" type="radio" name="idioma" value="ingles">Inglês</div>';
                    echo '<div class="flex gap-1"><input class="accent-sky-700" type="radio" name="idioma" value="espanhol">Espanhol</div>';
                }
                if ($_COOKIE['idioma'] == 'ingles') {
                    echo '<div class="flex gap-1"><input class="accent-sky-700" type="radio" name="idioma" value="portugues">Portuguese</div>';
                    echo '<div class="flex gap-1"><input class="accent-sky-700" type="radio" name="idioma" value="ingles" checked>English</div>';
                    echo '<div class="flex gap-1"><input class="accent-sky-700" type="radio" name="idioma" value="espanhol">Spanish</div>';
                }
                if ($_COOKIE['idioma'] == 'espanhol') {
                    echo '<div class="flex gap-1"><input class="accent-sky-700" type="radio" name="idioma" value="portugues">Portugués</div>';
                    echo '<div class="flex gap-1"><input class="accent-sky-700" type="radio" name="idioma" value="ingles">Inglés</div>';
                    echo '<div class="flex gap-1"><input class="accent-sky-700" type="radio" name="idioma" value="espanhol" checked>Español</div>';
                }
                ?>
            </div>
            <?php
            if ((!isset($_COOKIE["idioma"])) || ($_COOKIE['idioma'] == "portugues")) {
                echo '<button class="bg-sky-700 text-white px-4 py-2 hover:bg-sky-800 rounded-md self-center w-full max-w-[80vw]"
                type="submit">Escolher Idioma</button>';
            }
            if ($_COOKIE['idioma'] == 'ingles') {
                echo '<button class="bg-sky-700 text-white px-4 py-2 hover:bg-sky-800 rounded-md self-center w-full max-w-[80vw]"
                type="submit">Choose Language</button>';
            }
            if ($_COOKIE['idioma'] == 'espanhol') {
                echo '<button class="bg-sky-700 text-white px-4 py-2 hover:bg-sky-800 rounded-md self-center w-full max-w-[80vw]"
                type="submit">Elige lengua</button>';
            }
            ?>
        </form>
        <div class="flex gap-4 justify-center flex-wrap">
            <?php
            if ((!isset($_COOKIE["idioma"])) || ($_COOKIE['idioma'] == "portugues")) {
                echo '<a class="text-sky-700 hover:text-sky-800" href="cores.php">Cores</a>';
                echo '<span class="text-sky-700/70">|</span>';
                echo '<a class="text-sky-700 hover:text-sky-800" href="numeros.php">Números</a>';
                echo '<span class="text-sky-700/70">|</span>';
                echo '<a class="text-sky-700 hover:text-sky-800" href="objetos.php">Objetos</a>';
            }
            if ($_COOKIE['idioma'] == 'ingles') {
                echo '<a class="text-sky-700 hover:text-sky-800" href="cores.php">Colors</a>';
                echo '<span class="text-sky-700/70">|</span>';
                echo '<a class="text-sky-700 hover:text-sky-800" href="numeros.php">Numbers</a>';
                echo '<span class="text-sky-700/70">|</span>';
                echo '<a class="text-sky-700 hover:text-sky-800" href="objetos.php">Objects</a>';
            }
            if ($_COOKIE['idioma'] == 'espanhol') {
                echo '<a class="text-sky-700 hover:text-sky-800" href="cores.php">Colores</a>';
                echo '<span class="text-sky-700/70">|</span>';
                echo '<a class="text-sky-700 hover:text-sky-800" href="numeros.php">Números</a>';
                echo '<span class="text-sky-700/70">|</span>';
                echo '<a class="text-sky-700 hover:text-sky-800" href="objetos.php">Objetos</a>';
            }
            ?>
        </div>
    </div>
</body>

</html>