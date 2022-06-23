<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Clientes</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- STYLES -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../style/stylelist.css" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <header id="header">
    <nav class="container">
      <a class="logo" href="../home/index.php">mecânica<span>baiano</span>.</a>

      <!-- Menu -->
      <div class="dd-menu">
        <ul>
          <li><a href="../home/index.php">Início</a></li>
          <li><a href="../cadastrar/cad_cliente.php">Cadastrar Clientes</a></li>
          <li><a href="../listar/listar_agendamentos.php">Agendamentos</a></li>
          <li><a href="../listar/listar_orcamentos.php">Orçamentos</a></li>
          <li><a href="../listar/listar_admin.php">Administradores</a></li>
        </ul>
        </li>
        </ul>
      </div>
    </nav>
  </header>

  <main>
    <?php
    include "../validation/conn.php";
    require "../validation/verifica.php";

    $resultado = mysqli_query($conexao, "SELECT * FROM cliente ORDER BY nomeC asc");

    mysqli_close($conexao);

    ?>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="text-align: center;">
      <div class="modal-dialog" role="document">
        <div class="modal-content ">
          <div class="modal-header alert alert-success" style="height: 60px;">
            <h4 class="modal-title " id="exampleModalLongTitle">Cadastro de Cliente</h2>
              <button type="button" class="close col-md-1" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">
            <h5>Cliente cadastrado com sucesso!</h5>
          </div>
        </div>
      </div>
    </div>

    <div class="container py-5">
      <table class="table  table-light">
        <thead class="thead-dark">
          <tr>
            <th scope="col">CPF</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Endereço</th>
            <th scope="col">Telefone</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
            <th scope="col">Agendamento</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($user_data = mysqli_fetch_assoc($resultado)) {

            echo "<!-- Modal -->
            <div class='modal fade' id='modalExemplo' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header alert alert-danger'>
                    <h5 class='modal-title' id='exampleModalLabel'>Exclusão de Cliente</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                    <p style='color: #f00;'>*Caso o cliente tenha agendamentos e orçamentos eles também serão excluídos.</p>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary ' data-dismiss='modal'>Fechar</button>
                    <a class = 'btn  btn-primary btn-danger' href = '../delete/delete_cliente.php?id=$user_data[id]'>Excluir</a>
                  </div>
                </div>
              </div>
            </div>";

            echo "<tr>";
            echo "<td>" . $user_data['cpf'] . "</td>";
            echo "<td>" . $user_data['nomeC'] . "</td>";
            echo "<td>" . $user_data['emailC'] . "</td>";
            echo "<td>" . $user_data['enderecoC'] . "</td>";
            echo "<td>" . $user_data['telefoneC'] . "</td>";
            echo "<td> <a class = 'btn btn-sm btn-primary' href = '../alter/alt_cliente.php?id=$user_data[id]'><i class='bi bi-pencil-square'></i> </a> </td>";
            echo "<td>
            <button type='button' class='btn btn-sm btn btn-sm btn-danger' data-toggle='modal' data-target='#modalExemplo'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
          </svg>
</button>
           
            </td>";
            echo "<td> <a class = 'btn btn-sm btn-success' href = '../cadastrar/cad_agendamento.php?id=$user_data[id]'><i class='bi bi-plus-square'></i> </a> </td>";
            echo "</tr>";
          }

          if (!empty($_SESSION['sucesso'])) {
            echo "<script type='text/javascript'>
            $(window).on('load',function(){
            $('#myModal').modal('show'); });
        </script>";
            unset($_SESSION['sucesso']);
          }
          ?>
        </tbody>
      </table>
    </div>
  </main>
  <footer class="section">
    <div class="container grid">
      <div class="brand">
        <a class="logo logo-alt" href="#home">mecânica<span>baiano</span>.</a>
        <p>©2022 mecânicabaiano.</p>
        <p>Todos os direitos reservados.</p>
      </div>
    </div>
  </footer>
  <script src="../bootstrap.min.js"></script>
</body>

</html>