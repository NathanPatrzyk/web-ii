<?php

// CRIAR COOKIE: setcookie(nome, valor, vencimento);
setcookie("usuario", "Nathan Willian Patrzyk", time() + 86400);

// EXCLUIR COOKIE: setcookie(nome);
// setcookie("usuario");

if (isset($_COOKIE["usuario"])) {
    echo "<h1>Bem vindo " . $_COOKIE["usuario"] . "!</h1><br>";
} else {
    echo "<h1>Usuário novo, seja bem-vindo!</h1><br>";
}