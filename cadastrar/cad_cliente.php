<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Clientes</title>

  <!-- Icones -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- Styles -->
  <link rel="stylesheet" href="../style/stylecadclient.css" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>



<main class="container">
    <!-- Form -->
    <form action="../cadastrar/salvarCadastro.php" method="POST">
      <h1>Cadastro de Cliente</h1>
      <div class="input-field">
        <input class="label" type="text" name="nome" placeholder="Nome" <?php
                                                                        if (!empty($_SESSION['value_nomeC'])) {
                                                                          echo "value='" . $_SESSION['value_nomeC'] . "'";
                                                                          unset($_SESSION['value_nomeC']);
                                                                        }
                                                                        ?> required />

        <?php
        if (!empty($_SESSION['nomeC_uso'])) {
          echo "<p style='color: #f00; '>" . $_SESSION['nomeC_uso'] . "</p>";
          unset($_SESSION['nomeC_uso']);
        }
        ?>
        <div class="underline"></div>
      </div>
      <div class="space"></div>
      <div class="input-field">
        <input class="label" type="email" name="email" placeholder="E-Mail" <?php
                                                                            if (!empty($_SESSION['value_emailC'])) {
                                                                              echo "value='" . $_SESSION['value_emailC'] . "'";
                                                                              unset($_SESSION['value_emailC']);
                                                                            }
                                                                            ?> required />

        <?php
        if (!empty($_SESSION['emailC_uso'])) {
          echo "<p style='color: #f00; '>" . $_SESSION['emailC_uso'] . "</p>";
          unset($_SESSION['emailC_uso']);
        }
        ?>
        <div class="underline"></div>
      </div>
      <div class="space"></div>
      <div class="input-field">
        <input class="label" type="text" name="cpf" placeholder="CPF" <?php
                                                                      if (!empty($_SESSION['value_cpf'])) {
                                                                        echo "value='" . $_SESSION['value_cpf'] . "'";
                                                                        unset($_SESSION['value_cpf']);
                                                                      }
                                                                      ?> required minlength="11" maxlength="11" />

        <?php
        if (!empty($_SESSION['cpf_uso'])) {
          echo "<p style='color: #f00; '>" . $_SESSION['cpf_uso'] . "</p>";
          unset($_SESSION['cpf_uso']);
        }
        ?>
        <div class="underline"></div>
      </div>
      <div class="space"></div>

      <div class="input-field">
        <input class="label" type="text" name="endereco" placeholder="Endereço" <?php
                                                                                if (!empty($_SESSION['value_enderecoC'])) {
                                                                                  echo "value='" . $_SESSION['value_enderecoC'] . "'";
                                                                                  unset($_SESSION['value_enderecoC']);
                                                                                }
                                                                                ?> required />
        <div class="underline"></div>
      </div>
      <div class="space"></div>
      <div class="input-field">
        <input class="label" type="text" name="telefone" placeholder="Telefone" <?php
                                                                                if (!empty($_SESSION['value_telefoneC'])) {
                                                                                  echo "value='" . $_SESSION['value_telefoneC'] . "'";
                                                                                  unset($_SESSION['value_telefoneC']);
                                                                                }
                                                                                ?> required minlength="11" maxlength="11" />

        <?php
        if (!empty($_SESSION['telefoneC_uso'])) {
          echo "<p style='color: #f00; '>" . $_SESSION['telefoneC_uso'] . "</p>";
          unset($_SESSION['telefoneC_uso']);
        }
        ?>
        <div class="underline"></div>
      </div>
      <div class="space"></div>
      <input class="button" type="submit" name="cadastrar_cliente" value="Cadastrar" />
    </form>

    <footer>
      <div class="footer">
        <div class="logo">
          <a class="logo logo-alt" href="../home/index.php">mecânica<span>baiano</span>.</a>
        </div>
      </div>
    </footer>
  </main>

  <!-- main.js -->
  <script src="main.js"></script>
</body>

</html>