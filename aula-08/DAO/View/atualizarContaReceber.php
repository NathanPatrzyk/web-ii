<?php
include "../Conexao.php";
include "../Classes/ContasReceber.php";
include "../DAO/ContasReceberDAO.php";

$CR = new ContasReceber();
$CR->setId_contasreceber($_GET["ID"]);
$CR->setCliente_contasreceber($CR->getCliente_contasreceber());

$CRDAO = ContasReceberDAO::getInstance();

if (isset($_GET['atualizar'])) {
    $CR->setDocumento_contasreceber($_POST['txtDocumento']);
    $CR->setValor_contasreceber($_POST['txtValor']);
    $CR->setCliente_contasreceber($_POST['cbCliente']);
    $CR->setVencimento_contasreceber($_POST['txtData']);
    $CR->setStatus_contasreceber($_POST['txtStatus']);

    if ($CRDAO->UpdateContasReceber($CR)) {
        echo "<script>alert('Conta a receber, atualizada com succeso!');</script>";
        echo "<script>window.location = 'listar.php';</script>";
    }
}

$CRDAO->ShowContasReceber($CR);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATUALIZAR</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="text-slate-200 bg-slate-950 flex gap-8 items-center justify-center min-h-screen">
    <div class="bg-slate-900 p-8 pb-4 w-[35%] min-w-[480px] rounded-md">
        <h2 class="text-lime-500 text-3xl border-b-2 border-slate-950 pb-4">Atualizar contas a receber</h2>

        <form class="pt-4" action="atualizarContaReceber.php?atualizar&ID=<?= $_GET["ID"]; ?>" method="post">
            <table class="w-full" class="ms-classic3-main">
                <tr>
                    <td class="py-2" style="width: 136px" class="ms-classic3-tl">Documento:</td>
                    <td class="ms-classic3-top">
                        <input class="bg-slate-900 w-full bg-slate-950 p-1 rounded-md" name="txtDocumento"
                            value="<?= $CR->getDocumento_contasreceber(); ?>" type="text" />
                    </td>
                </tr>
                <tr>
                    <td class="py-2" style="width: 136px" class="ms-classic3-left">Valor:</td>
                    <td class="ms-classic3-even">
                        <input class="bg-slate-900 w-full bg-slate-950 p-1 rounded-md" name="txtValor"
                            value="<?= $CR->getValor_contasreceber(); ?>" type="text" />
                    </td>
                </tr>
                <tr>
                    <td class="py-2" style="width: 136px" class="ms-classic3-left">Cliente</td>
                    <td class="ms-classic3-even">
                        <select class="bg-slate-900 w-full bg-slate-950 p-1 rounded-md" name="cbCliente">
                            <?php
                            foreach ($CRDAO->ShowClientes($CR) as $exibir) {
                                echo $exibir;
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="py-2" style="width: 166px" class="ms-classic3-left">Data de Vencimento:</td>
                    <td class="ms-classic3-even">
                        <input class="bg-slate-900 w-full bg-slate-950 p-1 rounded-md" name="txtData"
                            value="<?= $CR->getVencimento_contasreceber(); ?>" type="text" />
                    </td>
                </tr>
                <tr>
                    <td class="py-2" style="width: 136px" class="ms-classic3-left">Status:</td>
                    <td class="ms-classic3-even">
                        <input class="bg-slate-900 w-full bg-slate-950 p-1 rounded-md" name="txtStatus"
                            value="<?= $CR->getStatus_contasreceber(); ?>" type="text" />
                        (Sim/Não)
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