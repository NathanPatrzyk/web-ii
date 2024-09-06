<?php

include_once("autoload.php");

/* Conecta o banco de dados, neste exemplo MySQL. */
$_con = new consulta("mysqli");
$_con->setBD("BD_PHP");
$_con->setServidor("127.0.0.1");
$_con->setUsuario("root");
$_con->setSenha("");
$_con->setPorta(3306);
$_con->conecta();
$_con->setSQL("SELECT userId, userLogin, userName, userEmail FROM Usuario ORDER BY userName");
$_con->executa();

/* Cria a classe HTML */
$_html = new HTML();
$_id[0] = $_html->AddTag("HTML");
$_html->AddTag("TITLE", NULL, TRUE, "PHP5 - Editora Erica");

$_id[1] = $_html->AddTag("BODY");
$_html->AddTag("P", NULL, TRUE, "<b>Relação de Usuários</b>");

$_id[2] = $_html->AddTag(
    "TABLE",
    array(
        "border" => 0,
        "cellspacing" => 0,
        "cellpadding" => 2,
        "width" => "600",
        "valign" => "top"
    )
);

$_id[3] = $_html->AddTag("TR", array("style" => "background-color:Navy; color:White"));
$_html->AddTag("TD", NULL, TRUE, "Código");
$_html->AddTag("TD", NULL, TRUE, "Login");
$_html->AddTag("TD", NULL, TRUE, "Nome do Usuário");
$_html->AddTag("TD", NULL, TRUE, "E-mail");
$_html->EndTag($_id[3]);
$_cor = "#ffffff";


while (($dados = $_con->getDados()) !== FALSE) {
    $_id[3] = $_html->AddTag("TR", array("bgcolor" => $_cor));
    $_html->AddTag("TD", NULL, TRUE, $dados["userId"]);
    $_html->AddTag("TD", NULL, TRUE, $dados["userLogin"]);
    $_html->AddTag("TD", NULL, TRUE, $dados["userName"]);
    $_html->AddTag("TD", NULL, TRUE, $dados["userEmail"]);
    $_html->EndTag($_id[3]);
    $_cor = ($_cor == "#ffffff" ? "#d0d0d0" : "#ffffff");
}

$_html->EndTag($_id[2]);
$_html->AddTag(
    "P",
    array("style" => "font-size:10px; color:Navy;"),
    TRUE,
    "Total de {$_con->getNumRows()} Usuários"
);

$_id[2] = $_html->AddTag(
    "FORM",
    array("action" => "processarDados.php", "method" => "POST"),
    FALSE,
    null
);

$_html->AddTag(
    "P",
    null,
    TRUE,
    "Login:"
);

$_html->AddTag(
    "INPUT",
    array("type" => "text", "name" => "login")
);

$_html->AddTag(
    "P",
    null,
    TRUE,
    "Nome do Usuário:"
);

$_html->AddTag(
    "INPUT",
    array("type" => "text", "name" => "nome")
);


$_html->AddTag(
    "P",
    null,
    TRUE,
    "E-mail:"
);

$_html->AddTag(
    "INPUT",
    array("type" => "email", "name" => "email")
);

$_html->AddTag(
    "BUTTON",
    array("type" => "submit"),
    TRUE,
    "ENVIAR"
);


$_html->EndTag($_id[2]);

$_html->EndTag($_id[1]);
$_html->EndTag($_id[0]);
echo $_html->toHTML();

?>