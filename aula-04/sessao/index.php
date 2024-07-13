<?php
//COMEÇAR SESSÃO:
session_start();

//CRIAR SESSÃO: $SESSION[‘<nome da variável>’]

$_SESSION['nome'] = 'Nathan Willian Patrzyk';
$_SESSION['email'] = 'nathan@email.com';

echo "<h1>Sessão iniciada aqui</h1>";
echo "<a href='sessao/dados-da-sessao.php'>Clique aqui para continuar</a>";