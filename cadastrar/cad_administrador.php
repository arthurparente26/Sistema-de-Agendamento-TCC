<?php
session_start();
?>

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
    <form method="POST" action="../cadastrar/salvarCadastro.php">
      <div>
        <h1>Cadastrar Administrador</h1>

        <div class="input-field">
          <input class="label" type="text" name="matricula" placeholder="Matrícula" <?php
            if (!empty($_SESSION['value_matricula'])) {
              echo "value='" . $_SESSION['value_matricula'] . "'";
              unset($_SESSION['value_matricula']);
            }
           ?> required minlength="3"maxlength="6"/>
          <?php
          if (!empty($_SESSION['matricula_uso'])) {
            echo "<p style='color: #f00; '>" . $_SESSION['matricula_uso'] . "</p>";
            unset($_SESSION['matricula_uso']);
          }
          ?>
          <div class="underline"></div>
        </div>
        <div class="space"></div>

        <div class="input-field">
          <input class="label" type="text" name="nome" placeholder="Nome" <?php
            if (!empty($_SESSION['value_nome'])) {
              echo "value='" . $_SESSION['value_nome'] . "'";
              unset($_SESSION['value_nome']);
            }
            ?> required />
          <?php
          if (!empty($_SESSION['nome_uso'])) {
            echo "<p style='color: #f00; '>" . $_SESSION['nome_uso'] . "</p>";
            unset($_SESSION['nome_uso']);
          }
          ?>
          <div class="underline"></div>
        </div>
        <div class="space"></div>

        <div class="input-field">
          <input class="label" type="text" name="endereco" placeholder="Endereço" <?php
if (!empty($_SESSION['value_endereco'])) {
  echo "value='" . $_SESSION['value_endereco'] . "'";
  unset($_SESSION['value_endereco']);
}
?> required />
          <div class="underline"></div>
        </div>
        <div class="space"></div>

        <div class="input-field">
          <input class="label" type="email" name="email" placeholder="Email" <?php
          if (!empty($_SESSION['value_email'])) {
            echo "value='" . $_SESSION['value_email'] . "'";
            unset($_SESSION['value_email']);
          }
          ?> required />

          <?php
          if (!empty($_SESSION['email_uso'])) {
            echo "<p style='color: #f00; '>" . $_SESSION['email_uso'] . "</p>";
            unset($_SESSION['email_uso']);
          }
          ?>
          <div class="underline"></div>
        </div>
        <div class="space"></div>

        <div class="input-field">
          <input class="label" type="tel" name="telefone" placeholder="Telefone" <?php
           if (!empty($_SESSION['value_telefone'])) {
            echo "value='" . $_SESSION['value_telefone'] . "'";
            unset($_SESSION['value_telefone']);
          }
           ?> required pattern="[0-9]{11}" minlength="11" maxlength="11" />

          <?php
          if (!empty($_SESSION['telefone_uso'])) {
            echo "<p style='color: #f00; '>" . $_SESSION['telefone_uso'] . "</p>";
            unset($_SESSION['telefone_uso']);
          }
          ?>
          <div class="underline"></div>
        </div>
        <div class="space"></div>

        <div class="input-field">
          <input class="label" type="password" name="senha" placeholder="Senha" required />
          <div class="underline"></div>
        </div>
        <div class="space"></div>
        <input class="button" type="submit" name="cadastrar_administrador" value="Cadastrar" />
      </div>
    </form>

    <footer>
      <div class="footer">
        <div class="logo">
          <a class="logo logo-alt" href="../home/home_administrador.php"class="logo ">mecânica<span>baiano</span>.</a>
        </div>
      </div>
    </footer>
  </main>

</body>

<!-- main.js -->
<script src="main.js"></script>

</html>