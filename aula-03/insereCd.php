<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cds";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if (!$conn) {
	echo "Conexão falhou" . mysqli_connect_error();
} else {
	$sql = $conn->prepare("INSERT INTO cd (artista, titulo, descricao, preco, ano, estilo, gravadora)
        VALUES (?, ?, ?, ?, ?, ?, ?)");

	$artista = $_POST['artista'];
	$titulo = $_POST['titulo'];
	$descricao = $_POST['descricao'];
	$preco = $_POST['preco'];
	$ano = $_POST['ano'];
	$estilo = $_POST['estilo'];
	$gravadora = $_POST['gravadora'];

	$sql->bind_Param("sssdiss", $artista, $titulo, $descricao, $preco, $ano, $estilo, $gravadora);
	$sql->execute();

	$id_cd = mysqli_insert_id($conn);
	$nome_musicas = explode(",", $_POST['musicas']);

	foreach ($nome_musicas as $nome_musica) {
		$sql = $conn->prepare("INSERT INTO musica (nome, id_cd)
			VALUES (?, ?)");
		$sql->bind_param("si", trim($nome_musica), $id_cd);
		$sql->execute();
	}

	header("Location: cd.html");
}