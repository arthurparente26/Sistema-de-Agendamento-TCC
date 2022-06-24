<?php
session_start();

if (isset($_POST['cadastrar_administrador'])) {

  include "../validation/conn.php";

  $matricula    = $_POST['matricula'];
  $nome         = $_POST['nome'];
  $endereco     = $_POST['endereco'];
  $email        = $_POST['email'];
  $telefone     = $_POST['telefone'];
  $senha        = $_POST['senha'];


  $_SESSION['value_endereco'] = $_POST['endereco'];

  // Buscar se a matrícula já foi cadastrada ou não
  $query = ("SELECT matricula FROM usuario WHERE matricula = '$matricula'");
  $result = mysqli_query($conexao, $query);
  $row = mysqli_num_rows($result);

  // Buscar se o nome já foi cadastrado ou não
  $queryn = ("SELECT nome, cliente.nomeC FROM usuario, cliente WHERE nome = '$nome'");
  $resultn = mysqli_query($conexao, $queryn);
  $rown = mysqli_num_rows($resultn);

  // Buscar se o email já foi cadastrado ou não
  $querye = ("SELECT email, cliente.emailC FROM usuario, cliente WHERE email = '$email'");
  $resulte = mysqli_query($conexao, $querye);
  $rowe = mysqli_num_rows($resulte);

  // Buscar se o telefone já foi cadastrado ou não
  $queryt = ("SELECT telefone, cliente.telefoneC FROM usuario, cliente WHERE telefone = '$telefone'");
  $resultt = mysqli_query($conexao, $queryt);
  $rowt = mysqli_num_rows($resultt);

  if ($row > 0) {
    $url = 'http://localhost/projeto/cadastrar/cad_administrador.php';
    $_SESSION['matricula_uso'] = "A Matrícula já está em uso<br>";
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
    $_SESSION['erroM'] = 1;
  } else {
    $_SESSION['value_matricula'] = $_POST['matricula'];
    $_SESSION['erroM'] = 0;
  }

  if ($rown > 0) {
    $url = 'http://localhost/projeto/cadastrar/cad_administrador.php';
    $_SESSION['nome_uso'] = "O Nome já está em uso<br>";
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
    $_SESSION['erroN'] = 1;
  } else {
    $_SESSION['value_nome'] = $_POST['nome'];
    $_SESSION['erroN'] = 0;
  }

  if ($rowe > 0) {
    $url = 'http://localhost/projeto/cadastrar/cad_administrador.php';
    $_SESSION['email_uso'] = "O E-mail já está em uso<br>";
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
    $_SESSION['erroE'] = 1;
  } else {
    $_SESSION['value_email'] = $_POST['email'];
    $_SESSION['erroE'] = 0;
  }

  if ($rowt > 0) {
    $url = 'http://localhost/projeto/cadastrar/cad_administrador.php';
    $_SESSION['telefone_uso'] = "O telefone já está em uso<br>";
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
    $_SESSION['erroT'] = 1;
  } else {
    $_SESSION['value_email'] = $_POST['email'];
    $_SESSION['erroT'] = 0;
  }


  if ($_SESSION['erroM'] == 0 and $_SESSION['erroN'] == 0 and $_SESSION['erroE'] == 0 and $_SESSION['erroT'] == 0) {

    // Query de Inserir usuario administrador no banco
    $sql = "INSERT INTO usuario(matricula, nome, endereco, email, telefone, senha, perfil_id) VALUES ";
    $sql .= "('$matricula','$nome','$endereco','$email','$telefone','$senha', '1')";
    $resultado = mysqli_query($conexao, $sql);
    echo "Administrador cadastrado com sucesso!!";
    unset($_SESSION['value_matricula']);
    unset($_SESSION['matricula_uso']);
    unset($_SESSION['value_nome']);
    unset($_SESSION['nome_uso']);
    unset($_SESSION['value_telefone']);
    unset($_SESSION['value_email']);
    unset($_SESSION['email_uso']);
    unset($_SESSION['value_endereco']);
    unset($_SESSIOn['erroM']);
    unset($_SESSIOn['erroN']);
    unset($_SESSIOn['erroE']);
    unset($_SESSIOn['erroT']);
    $_SESSION['sucesso'] = 1;

    header('Location: ../home/home_administrador.php');
    exit();
  }
}


// Cadastro de Cliente

if (isset($_POST['cadastrar_cliente'])) {

  include "../validation/conn.php";

  $cpf       = $_POST['cpf'];
  $nome      = $_POST['nome'];
  $email     = $_POST['email'];
  $telefone  = $_POST['telefone'];
  $endereco  = $_POST['endereco'];


  $_SESSION['value_enderecoC'] = $_POST['endereco'];

  // Buscar se o cpf já foi cadastrado ou não
  $queryc = ("SELECT cpf FROM cliente WHERE cpf = '$cpf'");
  $resultc = mysqli_query($conexao, $queryc);
  $rowc = mysqli_num_rows($resultc);

  // Buscar se o nome já foi cadastrado ou não
  $queryn = ("SELECT nomeC FROM cliente WHERE nomeC = '$nome'");
  $resultn = mysqli_query($conexao, $queryn);
  $rown = mysqli_num_rows($resultn);

  // Buscar se o nome já foi cadastrado ou não
  $querye = ("SELECT emailC FROM cliente WHERE emailC = '$email'");
  $resulte = mysqli_query($conexao, $querye);
  $rowe = mysqli_num_rows($resulte);

  // Buscar se o matrícula já foi cadastrado ou não
  $queryt = ("SELECT telefoneC FROM cliente WHERE telefoneC = '$telefone'");
  $resultt = mysqli_query($conexao, $queryt);
  $rowt = mysqli_num_rows($resultt);

  if ($rowc > 0) {
    $url = 'http://localhost/projeto/cadastrar/cad_cliente.php';
    $_SESSION['cpf_uso'] = "O CPF já está em uso<br>";
    $_SESSION['erroCPF'] = 1;
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
  } else {
    $_SESSION['value_cpf'] = $_POST['cpf'];
    $_SESSION['erroCPF'] = 0;
  }

  if ($rown > 0) {
    $url = 'http://localhost/projeto/cadastrar/cad_cliente.php';
    $_SESSION['nomeC_uso'] = "O Nome já está em uso<br>";
    $_SESSION['erroN'] = 1;
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
  } else {
    $_SESSION['value_nomeC'] = $_POST['nome'];
    $_SESSION['erroN'] = 0;
  }

  if ($rowe > 0) {
    $url = 'http://localhost/projeto/cadastrar/cad_cliente.php';
    $_SESSION['emailC_uso'] = "O E-mail já está em uso<br>";
    $_SESSION['erroE'] = 1;
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
  } else {
    $_SESSION['value_emailC'] = $_POST['email'];
    $_SESSION['erroE'] = 0;
  }

  if ($rowt > 0) {
    $url = 'http://localhost/projeto/cadastrar/cad_cliente.php';
    $_SESSION['telefoneC_uso'] = "O telefone já está em uso<br>";
    $_SESSION['erroT'] = 1;
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
  } else {
    $_SESSION['value_telefoneC'] = $_POST['telefone'];
    $_SESSION['erroT'] = 0;
  }


  if ($_SESSION['erroCPF'] == 0 and $_SESSION['erroN'] == 0 and $_SESSION['erroE'] == 0 and $_SESSION['erroT'] == 0) {
    $sql = "INSERT INTO cliente(cpf, nomeC, emailC, enderecoC, telefoneC, perfil_id) VALUES ";
    $sql .= "('$cpf','$nome','$email','$endereco','$telefone','2')";
    $resultado = mysqli_query($conexao, $sql);
    unset($_SESSION['value_nomeC']);
    unset($_SESSION['nomeC_uso']);
    unset($_SESSION['value_emailC']);
    unset($_SESSION['emailC_uso']);
    unset($_SESSION['value_cpf']);
    unset($_SESSION['cpf_uso']);
    unset($_SESSION['value_telefoneC']);
    unset($_SESSION['telefoneC_uso']);
    unset($_SESSIOn['erroCPF']);
    unset($_SESSIOn['erroN']);
    unset($_SESSIOn['erroE']);
    unset($_SESSIOn['erroT']);
    unset($_SESSION['value_enderecoC']);
    $_SESSION['sucesso'] = 1;
    header('Location: ../listar/listar_clientes.php');
    exit();
  }
}


// Cadastro de Agendamento

if (isset($_POST['cadastrar_agendamento'])) {
  include "../validation/conn.php";

  $id                    = $_POST['id'];
  //$servico             = $_POST['servico'];
  $dia                   = $_POST['dia'];
  $horario               = $_POST['horario'];
  $_SESSION['horario']   = $_POST['horario'];
  $_SESSION['value_dia'] = $_POST['dia'];
  //$_SESSION['value_servico'] = $_POST['servico'];

  // Tratando do tira risco
  if (!isset($_POST['tira_risco'])) {
    $tira_risco = 0;
  } else {
    $tira_risco = $_POST['tira_risco'];
  }

  // Tratando da revitalização de Pintura
  if (!isset($_POST['revitalizacao_pintura'])) {
    $rev_pintura = 0;
  } else {
    $rev_pintura = $_POST['revitalizacao_pintura'];
  }
  // Tratando do polimento cristalizado
  if (!isset($_POST['polimento_cristalizado'])) {
    $pol_cristalizado = 0;
  } else {
    $pol_cristalizado = $_POST['polimento_cristalizado'];
  }

  // Tratando da micro pintura
  if (!isset($_POST['micro_pintura'])) {
    $micro_pint = 0;
  } else {
    $micro_pint = $_POST['micro_pintura'];
  }

  // Tratando do polimento de farol
  if (!isset($_POST['polimento_farol'])) {
    $poli_farol = 0;
  } else {
    $poli_farol = $_POST['polimento_farol'];
  }

  // Tratando da pintura geral
  if (!isset($_POST['pintura_geral'])) {
    $pint_geral = 0;
  } else {
    $pint_geral = $_POST['pintura_geral'];
  }

  if($tira_risco === 0 AND $rev_pintura === 0 
  AND $pol_cristalizado === 0 AND $micro_pint === 0
   AND $poli_farol === 0 AND $pint_geral === 0){
    $_SESSION['servico_limpo'] = "O Serviço não pode ser vazio<br>";
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/projeto/cadastrar/cad_agendamento.php?id=$id'>";
    $_SESSION['erro_servico'] = 1;
  } Else {
    $_SESSION['erro_servico'] = 0;
  }

  // Buscar se o dia e horario  já foram cadastrados ou não
  $query = ("SELECT dia, horario FROM servico WHERE dia = '$dia' AND horario = '$horario'");
  $result = mysqli_query($conexao, $query);
  $row = mysqli_num_rows($result);

  if ($row > 0) {
    $_SESSION['horario_uso'] = "O Horário já está em uso<br>";
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/projeto/cadastrar/cad_agendamento.php?id=$id'>";
    $_SESSION['erroH'] = 1;
  } else {
    $_SESSION['value_horario'] = $_SESSION['horario'];
    $_SESSION['erroH'] = 0;
  }

  if ($_SESSION['erroH'] == 0 AND $_SESSION['erro_servico'] == 0) {
    // Query de inserção de dados no banco
    $sql = "INSERT INTO servico(tira_risco,revitalizacao_pintura, polimento_cristalizado, micro_pintura, polimento_farol, pintura_geral,horario,dia, cliente_id) VALUES ";
    $sql .= "('$tira_risco','$rev_pintura','$pol_cristalizado', '$micro_pint', '$poli_farol', '$pint_geral' ,'$horario','$dia', '$id')";
    $resultado = mysqli_query($conexao, $sql);
    unset($_SESSION['value_horario']);
    unset($_SESSION['value_dia']);
    unset($_SESSION['erroH']);
    $_SESSION['sucesso'] = 1;

    header('Location: ../listar/listar_agendamentos.php');
  }
}

// Cadastro de Orçamento

if (isset($_POST['cadastrar_orcamento'])) {
  include "../validation/conn.php";

  $id              = $_POST['id'];
  $valor           = $_POST['valor'];

  $selectID = "SELECT valor FROM orcamento WHERE servico_id = '$id'";
  $result = mysqli_query($conexao, $selectID);
  $row = mysqli_num_rows($result);

  if ($row > 0) {
    echo "orçamento já realizado";
  } else {

    // Query de Inserção de dados na tabela orçamento
    $sql = "INSERT INTO orcamento(valor, servico_id) VALUES ";
    $sql .= "('$valor','$id')";
    $resultado = mysqli_query($conexao, $sql);
    $_SESSION['sucesso'] = 1;
    header('Location: ../listar/listar_orcamentos.php');
  }
}
