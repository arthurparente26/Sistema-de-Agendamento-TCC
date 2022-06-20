<?php

require "../validation/conn.php";
session_start();

// Verifica se os campos foram clicados
$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : FALSE;
$senha = isset($_POST["senha"]) ? addslashes(trim($_POST["senha"])) : FALSE;

// Verifica se os campos estão vazios   
if (!$email || !$senha) {
	echo "Você deve digitar seu email e senha!";
	exit;
}

// Verifica se o usuario existe
$SQL = "SELECT id,matricula, nome,endereco, email,telefone, senha, perfil_id
       FROM usuario
       WHERE email = '$email' AND senha = '$senha'";
$result_id = mysqli_query($conexao, $SQL) or die("Erro no banco de dados!");
$total = mysqli_num_rows($result_id);

// Utiliza a verificação realizada pela query de cima
if ($total > 0) {
	// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
	$dados = mysqli_fetch_array($result_id);

	// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
	$_SESSION["id_usuario"] = $dados["id"];
	$_SESSION["nome_usuario"] = stripslashes($dados["nome"]);
	header("Location: ..home/index.php");
} else {
	"Senha inválida!";
	exit;
}
