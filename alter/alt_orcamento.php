<?php
// Verificando se temos o id
if (!empty($_GET['id'])) {

  include "../validation/conn.php";
  require "../validation/verifica.php";

  $id = $_GET['id'];

  $sqlSelect = "SELECT orcamento.id, cliente.nomeC, servico.tira_risco,servico.revitalizacao_pintura,servico.polimento_cristalizado,servico.micro_pintura,servico.polimento_farol,servico.pintura_geral, dia, orcamento.valor
        FROM servico
        INNER JOIN orcamento on orcamento.servico_id = servico.id
        INNER JOIN cliente on servico.cliente_id = cliente.id WHERE orcamento.id = '$id'";

  $result = $conexao->query($sqlSelect);

  if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {

      $nome    = $user_data['nomeC'];
      $tira_risco = $user_data['tira_risco'];
      $rev_pint = $user_data['revitalizacao_pintura'];
      $pol_cristalizado = $user_data['polimento_cristalizado'];
      $micro_pint = $user_data['micro_pintura'];
      $pol_farol = $user_data['polimento_farol'];
      $pint_geral = $user_data['pintura_geral'];
      $valor   = $user_data['valor'];
      $dia        = $user_data['dia'];

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
    header('Location: ../listar/listar_orcamento.php');
  }
} else {
  header('Location: ../listar/listar_orcamento.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editar Orçamento</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- Styles -->
  <link rel="stylesheet" href="../style/stylealtorc.css" />
  <link rel="stylesheet" href="../style/styleagendamento.css" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>
  <main class="container">
    <form method="POST" action="../alter/salvarEdicao.php">
      <div>
        <div class="backtomenu">
          <a href="../listar/listar_orcamentos.php">Voltar</a>
          <div class="space"></div>
        </div>

        <h1>Editar Orçamento</h1>

        <label for="cliente_nome" class="label-text"><strong>Nome do Cliente</strong></label>

        <div class="input-field">
          <input class="label" type="text" name="cliente_nome" value=" <?php echo  $nome ?>" disabled="" required />
          <div class="underline"></div>
        </div>
        <div class="space"></div>

        <label class="label-text"><strong>Tipos de Serviço</strong></label>

        <label class="label-text"><strong>Tipos de Serviço</strong></label>

        <div class="custom-checkbox">
          <input id="tira_risco" type="checkbox" name="tira_risco" disabled="" value="<?php echo $tira_risco; ?>" <?php echo  $tiraC  ?>>
          <label for="tira_risco">Tira Risco</label>
        </div>

        <div class="custom-checkbox">
          <input id="revitalizacao_pintura" type="checkbox" name="revitalizacao_pintura" disabled="" value="<?php echo $rev_pint; ?>" <?php echo $revC    ?>>
          <label for="revitalizacao_pintura">Revitalização de Pintura</label>
        </div>

        <div class="custom-checkbox">
          <input id="polimento_cristalizado" type="checkbox" name="polimento_cristalizado" disabled="" value="<?php echo $pol_cristalizado; ?>" <?php echo $polC ?>>
          <label for="polimento_cristalizado">Polimento Cristalizado</label>
        </div>

        <div class="custom-checkbox">
          <input id="micro_pintura" type="checkbox" name="micro_pintura" disabled="" value="<?php echo $micro_pint; ?>" <?php echo $micC ?>>
          <label for="micro_pintura">Micro Pintura</label>
        </div>

        <div class="custom-checkbox">
          <input id="polimento_farol" type="checkbox" name="polimento_farol" disabled="" value="<?php echo $pol_farol; ?>" <?php echo $polfC  ?>>
          <label for="polimento_farol">Polimento de Farol</label>
        </div>

        <div class="custom-checkbox">
          <input id="pintura_geral" type="checkbox" name="pintura_geral" disabled="" value="<?php echo $pint_geral; ?>" <?php echo $pintC   ?>>
          <label for="pintura_geral">Pintura Geral</label>
        </div>

        <div class="input-field">
          <label class="label-text" for="dia"><strong><BR>Data</strong></label>
          <input class="label" type="date" name="dia" value="<?php echo  $dia ?>" disabled="" required />
          <div class="underline"></div>
        </div>
        <div class="space"></div>
        <label for="valor" class="label-text"><strong>Valor do Serviço</strong></label>

        <div class="input-field">
          <input class="label" type="text" name="valor" value=" <?php echo  $valor ?>" required />
          <div class="underline"></div>
        </div>

        <div class="input-field">
          <input class="label" type="hidden" name="id" value=" <?php echo  $id ?>" required />
        </div>

        <input class="button" type="submit" name="atualizar_orcamento" value="Editar" />
      </div>
    </form>
    <footer>
      <div class="footer">
        <div class="logo">
          <a class="logo logo-alt" href="../home/index.php">mecânica<span>baiano</span>.</a>
        </div>
      </div>
    </footer>
  </main>
</body>

<!-- main.js -->
<script src="main.js"></script>

</html>