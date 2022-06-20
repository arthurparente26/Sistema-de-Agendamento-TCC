<?php
    $conexao = mysqli_connect("localhost","root","","projetodb");
    if (!$conexao) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $bd = mysqli_select_db($conexao,"projetodb");
     if (!$bd){
       Echo ("Banco de Dados inexistente ou Erro de conexão");
    }
?>
