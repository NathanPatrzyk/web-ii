<?php
    session_start();
    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];
    echo $nome ."<br>";
    echo $email . "<br>";
?>