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

          echo "<!-- Modal -->
            <div class='modal fade' id='modalExemplo' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header alert alert-danger'>
                    <h5 class='modal-title' id='exampleModalLabel'>Exclusão de Orçamento</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                    <p style='color: #f00;'>*Ao confirmar a exclusão, o orçamento selecionado será excluído permanentemente do sistema!</p>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary ' data-dismiss='modal'>Fechar</button>
                    <a class = 'btn  btn-primary btn-danger' href = '../delete/delete_orcamento.php?id=$user_data[id]'>Excluir</a>
                  </div>
                </div>
              </div>
            </div>";
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
          echo "<td>
            <button type='button' class='btn btn-sm btn btn-sm btn-danger' data-toggle='modal' data-target='#modalExemplo'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
          </svg>
</button>
           
            </td>";
            echo "<td>
            <a class = 'btn btn-sm btn-info' href = '../gerar_pdf.php?id=$user_data[id]'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-filetype-pdf' viewBox='0 0 16 16'>
            <path fill-rule='evenodd' d='M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z'/>
          </svg>     
            
                </td>";
          echo "</tr>";

          if(!empty($_SESSION['sucesso'])){
            echo "<script type='text/javascript'>
            $(window).on('load',function(){
            $('#myModal').modal('show'); });
        </script>";
            unset($_SESSION['sucesso']);
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</main>

<!--<footer class="section">
  <div class="container grid">
    <div class="brand">
      <a class="logo logo-alt" href="#home">mecânica<span>baiano</span>.</a>
      <p>©2022 mecânicaeverton.</p>
      <p>Todos os direitos reservados.</p>
    </div>

    <div class="social grid">
      <a href="https://api.whatsapp.com/send?phone=+5561993398630&text=Oi! Gostaria de agendar um horário" target="_blank"><i class="icon-whatsapp"></i></a>
    </div>
  </div>
</footer>-->

</body>
<!-- main.js -->
<script src="main.js"></script>
<script src="../bootstrap.min.js"></script>

</html>