<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aulaweb2";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if (!$conn) {
	echo "Conexão falhou" . mysqli_connect_error();
} else {
	$sql = $conn->prepare("INSERT INTO usuario (nome, telefone, email, usuario, senha)
        VALUES (?, ?, ?, ?, ?)");

	$nome = $_POST['nome'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	$sql->bind_Param("sssss", $nome, $telefone, $email, $usuario, $senha);
	$sql->execute();

	echo "Usuario adicionado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Usuario adicionado com sucesso!</title>
</head>

<body>
	<table>
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Telefone</th>
			<th>Email</th>
			<th>Usuario</th>
			<th>Senha</th>
		</tr>

		<?php
		$sql = "SELECT * FROM usuario";
		$result = mysqli_query($conn, $sql);

		while ($linha = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>$linha[0]</td>";
			echo "<td>$linha[1]</td>";
			echo "<td>$linha[2]</td>";
			echo "<td>$linha[3]</td>";
			echo "<td>$linha[4]</td>";
			echo "<td>$linha[5]</td>";
			echo "</tr>";
		}
		?>
	</table>
	<a href="./exemplo-post.html">Voltar</a>
</body>

</html>