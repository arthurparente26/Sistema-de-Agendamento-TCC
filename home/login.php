<?php
session_start();
require "../validation/conn.php";

// Verificando se os campos estão vazios
if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: ../home/home_administrador.php');
    exit();
}

//Evitar erro de mysqli inject
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);


//Verificando se o usuario existe
$query = "SELECT email, senha FROM usuario WHERE email = '{$email}' AND senha = '{$senha}'";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);


// Se existir inicia a sessão e redireciona o usuario para a home do administrador, se não o leva para o login html novamente 
if ($row == 1) {
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;

    header('Location: ../home/index.php');
    exit();
} else {
    header('Location: #');
    $_SESSION['erro'] = 1;
    exit();
}
