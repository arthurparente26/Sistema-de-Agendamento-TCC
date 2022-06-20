<?php

// Verificando se temos o id
if (!empty($_GET['id'])) {

  include "../validation/conn.php";
  require "../validation/verifica.php";

  $id = $_GET['id'];

  $selectID = "SELECT valor FROM orcamento WHERE servico_id = '$id'";
  $result = mysqli_query($conexao, $selectID);
  $row = mysqli_num_rows($result);

  if ($row > 0) {
    header('Location: ../listar/listar_orcamentos.php');
  }

  $sqlSelect = "SELECT servico.tira_risco,servico.revitalizacao_pintura,servico.polimento_cristalizado,servico.micro_pintura,servico.polimento_farol,servico.pintura_geral, cliente.nomeC,servico.dia
        FROM servico
        INNER JOIN cliente on servico.cliente_id = cliente.id WHERE servico.id = '$id'";
  $result = $conexao->query($sqlSelect);

  if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {
      $tira_risco = $user_data['tira_risco'];
      $rev_pint = $user_data['revitalizacao_pintura'];
      $pol_cristalizado = $user_data['polimento_cristalizado'];
      $micro_pint = $user_data['micro_pintura'];
      $pol_farol = $user_data['polimento_farol'];
      $pint_geral = $user_data['pintura_geral'];
      $nome    = $user_data['nomeC'];
      $dia     = $user_data['dia'];

      if ($user_data['tira_risco'] == 1) {
        $tiraC = "checked";
      } else {
        $tiraC = "";
      }
      if ($user_data['revitalizacao_pintura'] == 1) {
        $revC = "checked";
      } else {
        $revC = "";
      }
      if ($user_data['polimento_cristalizado'] == 1) {
        $polC = "checked";
      } else {
        $polC = "";
      }
      if ($user_data['micro_pintura'] == 1) {
        $micC = "checked";
      } else {
        $micC = "";
      }
      if ($user_data['polimento_farol'] == 1) {
        $polfC = "checked";
      } else {
        $polfC = "";
      }
      if ($user_data['pintura_geral'] == 1) {
        $pintC = "checked";
      } else {
        $pintC = "";
      }
    }
  } else {
    header('Location: ../listar/listar_agendamentos.php');
  }
} else {
  header('Location: ../listar/listar_agendamentos.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Orçamento</title>

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

  <!-- Styles -->
  <link rel="stylesheet" href="../style/styleorcamento.css" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>
  <main class="container">
    <!-- Form -->
    <form method="POST" action="../cadastrar/salvarCadastro.php">
      <div class="backtomenu">
        <a href="../listar/listar_admin.php">Voltar</a>
        <div class="space"></div>
      </div>
      <h1>Cadastrar Orçamento</h1>

      <label class="label-text"><strong>Cliente</strong></label>
      <div class="input-field">
        <input class="label" type="text" name="cliente_nome" value="<?php echo  $nome ?>" disabled="" required />
        <div class="underline"></div>
      </div>
      <div class="space"></div>

      <label class="label-text"><strong>Tipos de Serviço</strong></label>

      <div class="custom-checkbox">
        <input id="tira_risco" type="checkbox" name="tira_risco" value="<?php echo $tira_risco ?>" <?php echo  $tiraC  ?> disabled="">
        <label for="tira_risco">Tira Riscos</label>
      </div>

      <div class="custom-checkbox">
        <input id="revitalizacao_pintura" type="checkbox" name="revitalizacao_pintura" value="<?php $rev_pint ?>" <?php echo $revC    ?> disabled="">
        <label for="revitalizacao_pintura">Revitalização de Pintura</label>
      </div>

      <div class="custom-checkbox">
        <input id="polimento_cristalizado" type="checkbox" name="polimento_cristalizado" value="<?php $pol_cristalizado ?>" <?php echo $polC ?> disabled="">
        <label for="polimento_cristalizado">Polimento Cristalizado</label>
      </div>

      <div class="custom-checkbox">
        <input id="micro_pintura" type="checkbox" name="micro_pintura" value="<?php $micro_pint ?>" <?php echo $micC ?> disabled="">
        <label for="micro_pintura">Micro Pintura</label>
      </div>

      <div class="custom-checkbox">
        <input id="polimento_farol" type="checkbox" name="polimento_farol" value="<?php $pol_farol ?>" <?php echo $polfC  ?> disabled="">
        <label for="polimento_farol">Polimento de Faróis</label>
      </div>

      <div class="custom-checkbox">
        <input id="pintura_geral" type="checkbox" name="pintura_geral" value="<?php $pint_geral ?>" <?php echo $pintC   ?> disabled="">
        <label for="pintura_geral">Pintura Geral</label>
      </div>


      <label class="label-text" for="dia"><strong>Data</strong></label>
      <input class="label" type="date" name="dia" value="<?php echo  $dia ?>" disabled="" />

      <label for="valor" class="label-text"><strong>Valor do Serviço</strong></label>

      <div class="input-field">
        <input class="label" type="text" name="valor" required />
        <div class="underline-value"></div>
      </div>

      <input class="label" type="hidden" name="id" value=" <?php echo  $id ?>" required />

      <input class="button" type="submit" name="cadastrar_orcamento" value="Cadastrar" />
    </form>
  </main>
</body>

<!-- main.js -->
<script src="main.js"></script>

</html>