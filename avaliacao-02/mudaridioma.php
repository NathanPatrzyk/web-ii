<?php

require_once 'idioma.php';

$idiomaEscolhido = $_POST["idioma"];

$idioma = new Idioma();
$idioma->mudarIdioma($idiomaEscolhido);

header("Location: index.php");
