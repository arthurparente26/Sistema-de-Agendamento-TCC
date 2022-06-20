<?php

include "../validation/conn.php";
require "../validation/verifica.php";

if(isset($_POST['atualizar_admin']))
{
      $id           = $_POST['id'];
      $matricula    = $_POST['matricula'];
      $nome         = $_POST['nome'];
      $endereco     = $_POST['endereco'];
      $email        = $_POST['email'];
      $telefone     = $_POST['telefone'];
      $senha        = $_POST['senha'];
        
      $sqlUpdate = "UPDATE usuario SET nome = '$nome', endereco = '$endereco',
       email = '$email', telefone = '$telefone', senha = '$senha', matricula = $matricula WHERE id = '$id' ";

      $result = $conexao->query($sqlUpdate);  

      header ('Location: ../listar/listar_admin.php');
}

if(isset($_POST['atualizar_cliente']))
{
      $id           = $_POST['id'];
      $nome         = $_POST['nome'];
      $cpf          = $_POST['cpf'];
      $email        = $_POST['email'];
      $telefone     = $_POST['telefone'];
      $endereco     = $_POST['endereco'];
        
      $sqlUpdate = "UPDATE cliente SET nomeC = '$nome', enderecoC = '$endereco',
       emailC = '$email', telefoneC = '$telefone', cpf = '$cpf' WHERE id = '$id' ";

      $result = $conexao->query($sqlUpdate);  

      header ('Location: ../listar/listar_clientes.php');
}

if(isset($_POST['atualizar_cliente']))
{
      $id           = $_POST['id'];
      $nome         = $_POST['nome'];
      $cpf          = $_POST['cpf'];
      $email        = $_POST['email'];
      $telefone     = $_POST['telefone'];
      $endereco     = $_POST['endereco'];
        
      $sqlUpdate = "UPDATE cliente SET nomeC = '$nome', enderecoC = '$endereco',
       emailC = '$email', telefoneC = '$telefone', cpf = '$cpf' WHERE id = '$id' ";

      $result = $conexao->query($sqlUpdate);  

      header ('Location: ../listar/listar_clientes.php');
}

if(isset($_POST['atualizar_agendamento']))
{
      $id                 = $_POST['id'];
      $dia                = $_POST['dia'];
      $horario            = $_POST['horario'];
     
        
     // Tratando do tira risco
     if(!isset($_POST['tira_risco'])) {
      $tira_risco = 0;
    } else {
      $tira_risco = 1;
    }

    // Tratando da revitalização de Pintura
    if(!isset($_POST['revitalizacao_pintura'])) {
      $rev_pintura = 0;
    } else {
      $rev_pintura = 1;
    }
    // Tratando do polimento cristalizado
    if(!isset($_POST['polimento_cristalizado'])) {
      $pol_cristalizado = 0;
    } else {
      $pol_cristalizado = 1;
    }

    // Tratando da micro pintura
    if(!isset($_POST['micro_pintura'])) {
      $micro_pint = 0;
    } else {
      $micro_pint = 1;
    }

    // Tratando do polimento de farol
    if(!isset($_POST['polimento_farol'])) {
      $poli_farol = 0;
    } else {
      $poli_farol = 1;
    }

    // Tratando da pintura geral
    if(!isset($_POST['pintura_geral'])) {
      $pint_geral = 0;
    } else {
      $pint_geral = 1;
    }

   
      $sqlUpdate = "UPDATE servico SET tira_risco = '$tira_risco' ,revitalizacao_pintura = '$rev_pintura', polimento_cristalizado = '$pol_cristalizado', micro_pintura = '$micro_pint', polimento_farol = '$poli_farol', pintura_geral = ' $pint_geral', dia = '$dia',
       horario = '$horario' WHERE id = '$id' ";

      $result = $conexao->query($sqlUpdate);  

      header ('Location: ../listar/listar_agendamentos.php');
  }

if(isset($_POST['atualizar_orcamento']))
{
    $id              = $_POST['id'];
    $servico         = $_POST['servico'];
    $dia             = $_POST['dia'];
    $cliente_nome    = $_POST['cliente_nome'];
    $valor           = $_POST['valor'];
        
      $sqlUpdate = "UPDATE orcamento SET valor = '$valor'
       WHERE id = '$id' ";

      $result = $conexao->query($sqlUpdate);  

      header ('Location: ../listar/listar_orcamentos.php');
}
