<?php
session_start();
if (isset($_POST["login"]) && isset($_POST["senha"])) {
    $login_user = $_POST["login"];
    $senha_user = $_POST["senha"];
    if (!(empty($login_user) or empty($senha_user))) {
        include("conexao.php");
        $sql = "select * from tb_usuarios where login_user = '$login_user' and
senha_user='$senha_user'";
        $res = mysqli_query($conexao, $sql);
        $linha = mysqli_num_rows($res);
        if ($linha == 0) {
            session_destroy();
            echo "Login ou senha incorretos!";
            exit;
        } else {
            $_SESSION["login_user"] = $_POST["login"];
            $_SESSION["senha_user"] = $_POST["senha"];
            header("Location: pagina-restrita1.php");
        }
    } else {
        session_destroy();
        echo "Você não efetuou o login!";
        exit;
    }
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sistema - Controle de acesso.</title>
</head>

<body>
    <h1>Digite seu login e senha para entrar nas páginas restritas</h1>
    <form id="form1" name="form1" method="post" action="login.php">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login">
        <label for="senha">Senha:</label>
        <input type="text" name="senha" id="senha"><input type="submit" name="button" id="button" value="Entrar">
    </form>
</body>

</html>