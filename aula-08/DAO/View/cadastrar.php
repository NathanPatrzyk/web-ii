<?php
include "../Conexao.php";

include "../Classes/ContasPagar.php";
include "../DAO/ContasPagarDAO.php";

include "../Classes/ContasReceber.php";
include "../DAO/ContasReceberDAO.php";

if (isset($_GET['cadastroPagar'])) {
    $CP = new ContasPagar();
    $CP->setDocumento_contaspagar($_POST['txtDocumentoPagar']);
    $CP->setValor_contaspagar($_POST['txtValorPagar']);
    $CP->setFornecedor_contaspagar($_POST['cbFornecedorPagar']);
    $CP->setVencimento_contaspagar($_POST['txtDataPagar']);
    $CP->setStatus_contaspagar("N");

    $CPDAO = ContasPagarDAO::getInstance();

    if ($CPDAO->InsertContasPagar($CP)) {
        echo "<script>alert('Conta a pagar, cadastrada com succeso!');</script>";
        echo "<script>window.location = 'listar.php';</script>";
    }
}

if (isset($_GET['cadastroReceber'])) {
    $CR = new ContasReceber();
    $CR->setDocumento_contasreceber($_POST['txtDocumentoReceber']);
    $CR->setValor_contasreceber($_POST['txtValorReceber']);
    $CR->setCliente_contasreceber($_POST['cbClienteReceber']);
    $CR->setVencimento_contasreceber($_POST['txtDataReceber']);
    $CR->setStatus_contasreceber("N");

    $CRDAO = ContasReceberDAO::getInstance();

    if ($CRDAO->InsertContasReceber($CR)) {
        echo "<script>alert('Conta a receber, cadastrada com succeso!');</script>";
        echo "<script>window.location = 'listar.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRAR</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="text-slate-200 bg-slate-950 flex gap-8 items-center justify-center min-h-screen">
    <div class="bg-slate-900 p-8 w-[35%] min-w-[480px] rounded-md">
        <h2 class="text-lime-500 text-3xl border-b-2 border-slate-950 pb-4">Cadastro de contas a pagar</h2>

        <form class="pt-4" action="?cadastroPagar" method="post">
            <table class="w-full" class="ms-classic3-main">
                <tr>
                    <td class="py-2" style="width: 136px" class="ms-classic3-left">Fornecedor:</td>
                    <td>
                        <select class="bg-slate-900 w-full bg-slate-950 p-1 rounded-md" name="cbFornecedorPagar">
                            <?php
                            $CP = new ContasPagar();
                            $CPDAO = ContasPagarDAO::getInstance();
                            foreach ($CPDAO->ShowFornecedores($CP) as $exibir) {
                                echo $exibir;
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="py-2" style="width: 136px" class="ms-classic3-left">Documento:</td>
                    <td class="ms-classic3-even"><input class="bg-slate-900 w-full bg-slate-950 p-1 rounded-md" name="txtDocumentoPagar"
                            type="text" /></td>
                </tr>
                <tr>
                    <td class="py-2" style="width: 136px" class="ms-classic3-left">Valor:</td>
                    <td class="ms-classic3-even"><input class="bg-slate-900 w-full bg-slate-950 p-1 rounded-md" name="txtValorPagar" type="text" />
                    </td>
                </tr>
                <tr>
                    <td class="py-2" style="width: 166px" class="ms-classic3-left">Data de Vencimento:</td>
                    <td class="ms-classic3-even"><input class="bg-slate-900 w-full bg-slate-950 p-1 rounded-md" name="txtDataPagar" type="text" />
                    </td>
                </tr>
            </table>

            <input
                class="bg-lime-500 hover:bg-lime-600 transition-all ease-in-out duration-500 text-slate-950 font-bold w-full rounded-md px-4 py-2 mt-4"
                name="btCadastrarPagar" type="submit" value="Cadastrar" />
        </form>
    </div>
    <div class="bg-slate-900 p-8 w-[35%] min-w-[480px] rounded-md">
        <h2 class="text-lime-500 text-3xl border-b-2 border-slate-950 pb-4">Cadastro de contas a receber</h2>
           
            <form class="pt-4" action="?cadastroReceber" method="post">
                <table class="w-full" class="ms-classic3-main">
                    <tr>
                        <td class="py-2" style="width: 136px" class="ms-classic3-left">Cliente:</td>
                        <td>
                                <select class="bg-slate-900 w-full bg-slate-950 p-1 rounded-md" name="cbClienteReceber">
                                <?php
                                $CR = new ContasReceber();
                                $CRDAO = ContasReceberDAO::getInstance();
                                foreach ($CRDAO->ShowClientes($CR) as $exibir) {
                                    echo $exibir;
                                } 
                                ?>
                                </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2" style="width: 136px" class="ms-classic3-left">Documento:</td>
                        <td s="ms-classic3-even"><input class="bg-slate-900 w-full bg-slate-950 p-1 rounded-md" name="txtDocumentoReceber" type="text" /></td>
                    </tr>
                    <tr>
                        <td class="py-2" style="width: 136px" class="ms-classic3-left">Valor:</td>
                        <td s="ms-classic3-even"><input class="bg-slate-900 w-full bg-slate-950 p-1 rounded-md" name="txtValorReceber"
                            type="text" /></td>
                    </tr>
                    <tr>
                        <td class="py-2" style="width: 166px" class="ms-classic3-left">Data de Vencimento:</td>
                        <td s="ms-classic3-even"><input class="bg-slate-900  w-full bg-slate-950 p-1 rounded-md" name="txtDataReceber"
                            type="text" /></td>
                    </tr>
                </table>
                <input
                class="bg-lime-500 hover:bg-lime-600 transition-all ease-in-out duration-500 text-slate-950 font-bold w-full rounded-md px-4 py-2 mt-4"
                name="btCadastrarReceber" type="submit" value="Cadastrar" />
        </form>
</body>

</html>
