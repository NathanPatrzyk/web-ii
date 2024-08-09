<?php

include "../Conexao.php";

include "../Classes/ContasPagar.php";
include "../DAO/ContasPagarDAO.php";

include "../Classes/ContasReceber.php";
include "../DAO/ContasReceberDAO.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>LISTAR</title>
</head>

<body class="bg-slate-950 text-slate-200 flex flex-col items-center justify-center gap-8 py-8">
    <a href="./cadastrar.php">
        <button
            class="bg-lime-500 hover:bg-lime-600 rounded-full text-slate-900 font-semibold flex items-center justify-center gap-1 px-4 py-2 cursor-pointer transition-all duration-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-plus">
                <path d="M5 12h14" />
                <path d="M12 5v14" />
            </svg>
            Cadastrar Nova Conta
        </button>
    </a>

    <div class="bg-slate-900 rounded-md p-8 w-[80%]">
        <h2 class="text-lime-500 text-3xl border-b-2 border-slate-950 pb-4">Lista de Contas a Pagar</h2>

        <div class="text-slate-400 grid place-items-start grid-cols-4 pt-4">
            <div>Documento</div>
            <div>Valor</div>
            <div>Status</div>
            <div>Opções</div>
        </div>

        <?php

        $CP = new ContasPagar();
        $CPDAO = ContasPagarDAO::getInstance();

        $query = $CPDAO->ShowContasPagar($CP);

        while ($reg = $query->fetch_array()) {

            ?>
            <div class="text-slate-100 grid place-items-start grid-cols-4 pt-4">
                <div><?= $reg["documento_contaspagar"]; ?></div>
                <div><?= $reg["valor_contaspagar"]; ?></div>
                <div><?= $reg["status_contaspagar"]; ?></div>
                <div class="flex items-center justify-start gap-4">
                    <a href="atualizarContaPagar.php?ID=<?= $reg["id_contaspagar"]; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="#e2e8f0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-square-pen">
                            <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                            <path
                                d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                        </svg>
                    </a>
                    <a href="apagarContaPagar.php?ID=<?= $reg["id_contaspagar"]; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="#e2e8f0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-trash-2">
                            <path d="M3 6h18" />
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                            <line x1="10" x2="10" y1="11" y2="17" />
                            <line x1="14" x2="14" y1="11" y2="17" />
                        </svg>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="bg-slate-900 rounded-md p-8 w-[80%]">
        <h2 class="border-b-2 border-slate-950 text-lime-500 text-3xl pb-4">Lista de Contas a Receber</h2>

        <div class="text-slate-400 grid place-items-start grid-cols-4 pt-4">
            <div>Documento</div>
            <div>Valor</div>
            <div>Status</div>
            <div>Opções</div>
        </div>

        <?php

        $CR = new ContasReceber();
        $CRDAO = ContasReceberDAO::getInstance();

        $query = $CRDAO->ShowContasReceber($CR);

        while ($reg = $query->fetch_array()) {

            ?>
            <div class="text-slate-100 grid place-items-start grid-cols-4 pt-4">
                <div><?= $reg["documento_contasreceber"]; ?></div>
                <div><?= $reg["valor_contasreceber"]; ?></div>
                <div><?= $reg["status_contasreceber"]; ?></div>
                <div class="flex items-center justify-start gap-4">
                    <a href="atualizarContaReceber.php?ID=<?= $reg["id_contasreceber"]; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="#e2e8f0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-square-pen">
                            <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                            <path
                                d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                        </svg>
                    </a>
                    <a href="apagarContaReceber.php?ID=<?= $reg["id_contasreceber"]; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="#e2e8f0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-trash-2">
                            <path d="M3 6h18" />
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                            <line x1="10" x2="10" y1="11" y2="17" />
                            <line x1="14" x2="14" y1="11" y2="17" />
                        </svg>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
    
</body>