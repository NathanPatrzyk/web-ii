<?php

require_once 'classe_funcionario_comum.php';

function main() {
    // Obter a instância do Funcionario
    $var1 = new Funcionario();
    $var1->setValue(1000);
    
    // Obter a instância do Funcionario
    $var2 = new Funcionario();
    $var2->setValue(2000);

    echo 'Var1 value: ' . $var1->getValue() . "\n";
    echo 'Var2 value: ' . $var2->getValue() . "\n";

    // Verificar se ambos os objetos são a mesma instância
    if ($var1 === $var2) {
        echo "\nVar1 e Var2 são a mesma instância.\n";
    } else {
        echo "\nVar1 e Var2 são instâncias diferentes.\n";
    }
}

main();

?>
