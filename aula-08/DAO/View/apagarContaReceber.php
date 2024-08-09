<?php

include "../Conexao.php";
include "../Classes/ContasReceber.php";
include "../DAO/ContasReceberDAO.php";

if (isset($_GET['ID'])) {
    $CR = new ContasReceber();
    $CR->setId_contasreceber($_GET["ID"]);
    $CRDAO = ContasReceberDAO::getInstance();

    if ($CRDAO->DeleteContasReceber($CR)) {
        echo "<script>alert('Conta a receber, deletada com succeso!');</script>";
        echo "<script>window.location = 'listar.php';</script>";
    }
}
