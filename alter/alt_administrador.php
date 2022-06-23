<?php
// Verificando se temos o id
if (!empty($_GET['id'])) {

  include "../validation/conn.php";
  require "../validation/verifica.php";

  $id = $_GET['id'];

  $sqlSelect = "SELECT * FROM usuario WHERE id = '$id'";

  $result = $conexao->query($sqlSelect);

  if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {
      $matricula    = $user_data['matricula'];
      $nome         = $user_data['nome'];
      $endereco     = $user_data['endereco'];
      $email        = $user_data['email'];
      $telefone     = $user_data['telefone'];
      $senha        = $user_data['senha'];
    }
  } else {
    header('Location: ../listar/listar_admin.php');
  }
} else {
  header('Location: ../listar/listar_admin.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Administrador</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- Styles -->
  <link rel="stylesheet" href="../style/stylecadadmin.css" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>

  <main class="container">
    <form method="POST" action="../alter/salvarEdicao.php">
      <div>
        <div class="backtomenu">
          <a href="../listar/listar_admin.php">Voltar</a>
          <div class="space"></div>
        </div>

        <h1>Editar Administrador</h1>
        <div class="input-field">
          <input class="label" type="text" name="matricula" value="<?php echo $matricula ?>" required />
          <div class="underline"></div>
        </div>
        <div class="space"></div>

        <div class="input-field">
          <input class="label" type="text" name="nome" value="<?php echo $nome ?>" required />
          <div class="underline"></div>
        </div>
        <div class="space"></div>

        <div class="input-field">
          <input class="label" type="text" name="endereco" value="<?php echo $endereco ?>" required />
          <div class="underline"></div>
        </div>
        <div class="space"></div>

        <div class="input-field">
          <input class="label" type="email" name="email" value="<?php echo $email ?>" required />
          <div class="underline"></div>
        </div>
        <div class="space"></div>

        <div class="input-field">
          <input class="label" type="tel" name="telefone" value="<?php echo $telefone ?>" />
          <div class="underline"></div>
        </div>
        <div class="space"></div>

        <div class="input-field">
          <input class="label" type="text" name="senha" value="<?php echo $senha ?>" required />
          <div class="underline"></div>
        </div>
        <div class="space"></div>

        <input class="label" type="hidden" name="id" value="<?php echo $id ?>" required />

        <input class="button" type="submit" value="Editar" name="atualizar_admin" />
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