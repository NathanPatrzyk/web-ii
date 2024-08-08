<?php
include "../Conexao.php";
include "../Classes/ContasPagar.php";
include "../DAO/ContasPagarDAO.php";

$CP = new ContasPagar();
$CP->setId_contaspagar($_GET["ID"]);
$CP->setFornecedor_contaspagar($CP->getFornecedor_contaspagar());

$CPDAO = ContasPagarDAO::getInstance();

if (isset($_GET['atualizar'])) {
    $CP->setDocumento_contaspagar($_POST['txtDocumento']);
    $CP->setValor_contaspagar($_POST['txtValor']);
    $CP->setFornecedor_contaspagar($_POST['cbFornecedor']);
    $CP->setVencimento_contaspagar($_POST['txtData']);
    $CP->setStatus_contaspagar($_POST['txtStatus']);

    if ($CPDAO->UpdateContasPagar($CP)) {
        echo "<script>alert('Conta a pagar, atualizada com succeso!');</script>";
        echo "<script>window.location = 'listar.php';</script>";
    }
}

$CPDAO->ShowContasPagar($CP);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATUALIZAR</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="text-slate-200 bg-slate-950 flex gap-8 items-center justify-center min-h-screen">
    <div class="bg-slate-900 p-8 pb-4 w-[35%] min-w-[480px] rounded-md">
        <h2 class="text-lime-500 text-3xl border-b-2 border-slate-950 pb-4">Atualizar contas a pagar</h2>

        <form class="pt-4" action="atualizarContaPagar.php?atualizar&ID=<?= $_GET["ID"]; ?>" method="post">
            <table class="w-full" class="ms-classic3-main">
                <tr>
                    <td class="py-2" style="width: 136px" class="ms-classic3-tl">Documento:</td>
                    <td class="ms-classic3-top">
                        <input class="bg-slate-900  w-full bg-slate-950  p-1 rounded-md" name="txtDocumento"
                            value="<?= $CP->getDocumento_contaspagar(); ?>" type="text" />
                    </td>
                </tr>
                <tr>
                    <td class="py-2" style="width: 136px" class="ms-classic3-left">Valor:</td>
                    <td class="ms-classic3-even">
                        <input class="bg-slate-900  w-full bg-slate-950  p-1 rounded-md" name="txtValor"
                            value="<?= $CP->getValor_contaspagar(); ?>" type="text" />
                    </td>
                </tr>
                <tr>
                    <td class="py-2" style="width: 136px" class="ms-classic3-left">Fornecedor:</td>
                    <td class="ms-classic3-even">
                        <select class="bg-slate-900  w-full bg-slate-950  p-1 rounded-md" name="cbFornecedor">
                            <?php
                            foreach ($CPDAO->ShowFornecedores($CP) as $exibir) {
                                echo $exibir;
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="py-2" style="width: 166px" class="ms-classic3-left">Data de Vencimento:</td>
                    <td class="ms-classic3-even">
                        <input class="bg-slate-900  w-full bg-slate-950  p-1 rounded-md" name="txtData"
                            value="<?= $CP->getVencimento_contaspagar(); ?>" type="text" />
                    </td>
                </tr>
                <tr>
                    <td class="py-2" style="width: 136px" class="ms-classic3-left">Status:</td>
                    <td class="ms-classic3-even">
                        <input class="bg-slate-900  w-full bg-slate-950  p-1 rounded-md" name="txtStatus"
                            value="<?= $CP->getStatus_contaspagar(); ?>" type="text" /> (Sim/Não)
                    </td>
                </tr>
            </table>

            <input
                class="bg-lime-500 hover:bg-lime-600 transition-all ease-in-out duration-500 text-slate-950 font-bold w-full rounded-md px-4 py-2 mt-4"
                name="btAtualizar" type="submit" value="Atualizar" />
        </form>
    </div>
</body>

</html>