<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt_BR">
  <head>
    <!-- Page Info -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- Icons -->
    <link rel="stylesheet" href="assets/fonts/style.css" />

    <!-- STYLES -->
    ¨
    <!-- STYLES -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="../style/stylelogin.css" />

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <!-- Modal de criação de administrador -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="text-align: center;">
  <div class="modal-dialog" role="document">
   <div class="modal-content ">
	  <div class="modal-header alert alert-success" style="height: 60px;">
	   <h4 class="modal-title " id="exampleModalLongTitle">Cadastro de Administrador</h2>
		<button type="button" class="close col-md-1" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">×</span>
		</button>
	  </div>
	  <div class="modal-body">
	   <h5>Administrador criado com sucesso!</h5>
	    </div>
   </div>
  </div>
</div>
    
    <!-- Header -->
    <main class="container">
      <form action="../home/login.php" method="POST">
        <h1>Login</h1>

        <div class="input-field">
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Digite seu E-Mail"
            required
          />
          <div class="underline"></div>
        </div>
        <div class="space"></div>
        <div class="input-field">
          <input
            type="password"
            name="senha"
            id="password"
            placeholder="Digite sua Senha"
            required
          />
        
          <div class="underline"></div>
        </div>
        <input class="button" type="submit" name="acao" value="Entrar" />
      </form>

      <?php
           if(!empty($_SESSION['erro'])){
            echo "<br><p style='color: #f00; text-align: center;'>Login ou senha inválidos!</p>";
              unset($_SESSION['erro']);
            }
          
          ?>

<?php
           if(!empty($_SESSION['erro'])){
            echo "<br><p style='color: #f00; text-align: center;'>Login ou senha inválidos!</p>";
              unset($_SESSION['erro']);
            }
          
          ?>

<?php           if(!empty($_SESSION['sucesso'])){
              echo "<script type='text/javascript'>
              $(window).on('load',function(){
              $('#myModal').modal('show'); });
          </script>";
              unset($_SESSION['sucesso']);
            }
            ?>

      <footer>
        <div class="footer">
          <p>Ou Cadastre</p>
          <a href="../cadastrar/cad_administrador.php">
            <input
              class="button"
              type="submit"
              name="Cadastrar"
              value="Cadastrar Administrador"
            />
          </a>
          <div class="logo">
            <a class="logo logo-alt" href="#home"
              >mecânica<span>baiano</span>.</a
            >
          </div>
        </div>
      </footer>
    </main>

  </body>

  <!-- main.js -->
  <script src="main.js"></script>
  <script src="../bootstrap.min.js"></script>
  
</html>
