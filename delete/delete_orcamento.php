<?php

// Verificando se temos o id
if (!empty($_GET['id'])) {

  include "../validation/conn.php";
  require "../validation/verifica.php";

  $id = $_GET['id'];

  $sqlSelect = "SELECT * FROM orcamento WHERE id = '$id'";

  $result = $conexao->query($sqlSelect);

  if ($result->num_rows > 0) {
    $sqlDelete = "DELETE FROM orcamento WHERE id = '$id'";
    $resultDelete = $conexao->query($sqlDelete);
  }
}

header('Location: ../listar/listar_orcamentos.php');
