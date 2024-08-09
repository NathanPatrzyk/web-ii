<?php

include "../Conexao.php";
include "../Classes/ContasPagar.php";
include "../DAO/ContasPagarDAO.php";

if (isset($_GET['ID'])) {
    $CP = new ContasPagar();
    $CP->setId_contaspagar($_GET["ID"]);
    $CPDAO = ContasPagarDAO::getInstance();

    if ($CPDAO->DeleteContasPagar($CP)) {
        echo "<script>alert('Conta a pagar, deletada com succeso!');</script>";
        echo "<script>window.location = 'listar.php';</script>";
    }
}
