<?php

// Verificando se temos o id
if (!empty($_GET['id'])) {

  include "../validation/conn.php";
  require "../validation/verifica.php";

  $id = $_GET['id'];

  $sqlSelect = "SELECT * FROM cliente WHERE id = '$id'";

  $result = $conexao->query($sqlSelect);

  if ($result->num_rows > 0) {
    $sqlDelete = "DELETE FROM cliente WHERE id = '$id'";
    $resultDelete = $conexao->query($sqlDelete);
  }
}
$_SESSION['excluir'] = 1;
header('Location: ../listar/listar_clientes.php');
