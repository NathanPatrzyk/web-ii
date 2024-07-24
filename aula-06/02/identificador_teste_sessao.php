<?php
    // TESTE de Sessão...
    include_once("identificador_class_sessao.php");

    $a = Array("Codigo" => 100, "Valor" => 2500, "Tipo" => 10);
    $s = new sessao(TRUE);

    if ($s->getNVars() > 0) {
        $s->setVars("Codigo", $s->getVars("Codigo") + 10);
        $s->setVars("Valor", $s->getVars("Valor") * 1.25);
    } else {
        $s->setVars($a);
    }

    $s->printAll();

    // Salvar dados da sessão no arquivo padrão
    $s->saveSessionToFile();

    // Alterar o caminho do arquivo e salvar novamente
    $s->setSessionSavePath('novo_caminho_para_sessao.txt');
    $s->saveSessionToFile();

    // Gerar um novo identificador de sessão
    $s->regenerateSessionId();
    echo "Novo ID de sessão: " . $s->getId() . "<br/>";

    // Forçar a gravação dos dados da sessão atual
    $s->saveSession();
?>
