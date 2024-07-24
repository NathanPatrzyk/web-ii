<?php
    // TESTE de Sessão...
    include_once("class_sessao.inc");
    include_once("class_usuario.inc");
    include_once("class_bd.inc");

    $s = new sessao(TRUE);

    if ($s->getNVars() > 0) {
        // Sessão Existe, e o usuário está OK
        $user = $s->getVars("Usuário");
        $nome = $s->getVars("Nome");
    } else {
        // Validar o usuário
        $u = $_GET["login"];
        $p = $_GET["password"];
        $con = new bd("MySQL");
        $con->conecta("localhost", "bdTeste", "root", "");
        $usr = new usuario($con);

        if ($usr->valida($u, $p)) {
            $s->setVars("Usuário", $usr->usr_login);
            $s->setVars("Nome", $usr->usr_nome);
        } else {
            echo "<b>Usuário ou senha Inválido</b>";
            exit;
        }
    }
    // Restante do script...
?>
