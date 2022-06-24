<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Orçamentos</title>

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

  <!-- Header -->
  <header id="header">
    <nav class="container">
      <a class="logo" href="../home/index.php">mecânica<span>baiano</span>.</a>

      <!-- Menu -->
      <div class="dd-menu">
        <ul>
          <li><a href="../home/index.php">Início</a></li>
          <li><a href="../listar/listar_clientes.php">Clientes</a></li>
          <li><a href="../listar/listar_agendamentos.php">Agendamentos</a></li>
          <li><a href="../listar/listar_admin.php">Administradores</a></li>
        </ul>
        </li>
        </ul>
      </div>
    </nav>
  </header>
</body>

<main>
  <?php

  include "../validation/conn.php";
  require "../validation/verifica.php";

  $resultado = mysqli_query($conexao, "SELECT orcamento.id, cliente.nomeC, tira_risco,revitalizacao_pintura,polimento_cristalizado,micro_pintura,polimento_farol,pintura_geral, dia, orcamento.valor
 FROM servico
 INNER JOIN orcamento on orcamento.servico_id = servico.id
 INNER JOIN cliente on servico.cliente_id = cliente.id;
 ");

  mysqli_close($conexao);

  ?>
<!-- Modal de cadastro de orçamento -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="text-align: center;">
    <div class="modal-dialog" role="document">
      <div class="modal-content ">
        <div class="modal-header alert alert-success" style="height: 60px;">
          <h4 class="modal-title " id="exampleModalLongTitle">Declaração de Orçamento</h2>
            <button type="button" class="close col-md-1" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
          <h5>Orçamento declarado com sucesso!</h5>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de Exclusão de orçamento -->
  <div class="modal fade" id="myModalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="text-align: center;">
      <div class="modal-dialog" role="document">
        <div class="modal-content ">
          <div class="modal-header alert alert-danger" style="height: 60px;">
            <h4 class="modal-title " id="exampleModalLongTitle">Exclusão de Orçamento</h2>
              <button type="button" class="close col-md-1" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
              </button>
          </div>
          <div class="modal-body">
            <h5>Orçamento excluído com sucesso!</h5>
          </div>
        </div>
      </div>
    </div>

  <div class="container py-5">
    <table class="table table-striped table-light">
      <thead>
        <tr>
          <th scope="col">Nome do Cliente</th>
          <th scope="col">Serviço(s)</th>
          <th scope="col">Data</th>
          <th scope="col">Valor</th>
          <th scope="col">Editar</th>
          <th scope="col">Excluir</th>
          <th scope="col">Ordem de Serviço</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($user_data = mysqli_fetch_assoc($resultado)) {

          echo "<tr>";
          echo "<td>" . $user_data['nomeC'] . "</td>";
          if ($user_data['tira_risco'] == 1) {
            echo "<td>Tira Risco<BR>";
          } else {
            echo "<td>";
          }
          if ($user_data['revitalizacao_pintura'] == 1) {
            echo "Revitalização de Pintura<BR>";
          }
          if ($user_data['polimento_cristalizado'] == 1) {
            echo "Polimento Cristalizado<BR>";
          }
          if ($user_data['micro_pintura'] == 1) {
            echo "Micro Pintura<BR>";
          }
          if ($user_data['polimento_farol'] == 1) {
            echo "Polimento de Farol<BR>";
          }
          if ($user_data['pintura_geral'] == 1) {
            echo "Pintura Geral</td>";
          }
          echo "<td>" . date('d/m/Y', strtotime($user_data['dia'])) . "</td>";
          echo "<td>" . "R$ " . $user_data['valor'] . "</td>";
          echo "<td> <a class = 'btn btn-sm btn-primary' href = '../alter/alt_orcamento.php?id=$user_data[id]'><i class='bi bi-pencil-square'></i> </a> </td>";
          echo "<td> <a class = 'btn btn-sm btn-danger' href = '../delete/delete_orcamento.php?id=$user_data[id]'><i class='bi bi-trash''></i> </a> </td>";
          echo "<td> <a class = 'btn btn-sm btn-info' href = '../gerar_pdf.php?id=$user_data[id]'><i class='bi bi-filetype-pdf''></i> </a> </td>";
            
          echo "</tr>";

          if (!empty($_SESSION['sucesso'])) {
            echo "<script type='text/javascript'>
            $(window).on('load',function(){
            $('#myModal').modal('show'); });
        </script>";
            unset($_SESSION['sucesso']);
          }
        }

        if (!empty($_SESSION['excluir'])) {
          echo "<script type='text/javascript'>
          $(window).on('load',function(){
          $('#myModalExcluir').modal('show'); });
      </script>";
          unset($_SESSION['excluir']);
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

</body>
<!-- main.js -->
<script src="main.js"></script>
<script src="../bootstrap.min.js"></script>

</html>