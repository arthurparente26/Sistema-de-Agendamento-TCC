<?php
include "validation/conn.php";

session_start();


$id = $_GET['id'];

$resultado = mysqli_query($conexao, "SELECT orcamento.id, cliente.nomeC, cliente.emailC, cliente.cpf,
 cliente.enderecoC, cliente.telefoneC, tira_risco,revitalizacao_pintura,polimento_cristalizado,
 micro_pintura,polimento_farol,pintura_geral, dia,horario, orcamento.valor
FROM servico
INNER JOIN orcamento on orcamento.servico_id = servico.id
INNER JOIN cliente on servico.cliente_id = cliente.id
 WHERE orcamento.id = '$id'
");

while ($user_data = mysqli_fetch_assoc($resultado)) {

   $nome = $user_data['nomeC'];
   $email = $user_data['emailC'];
   $cpf = $user_data['cpf'];
   $endereco = $user_data['enderecoC'];
   $telefone = $user_data['telefoneC'];
   $data =  date('d/m/Y', strtotime($user_data['dia']));
   $valor = $user_data['valor'];
   $horario = $user_data['horario'];
    if ($user_data['tira_risco'] == 1) {
        $tiraRisco = "Tira Risco<BR>";
    } else {
        $tiraRisco = "";
    }
    if ($user_data['revitalizacao_pintura'] == 1) {
        $revitalizacaoPintura = "Revitalização de Pintura<BR>";
    } else {
        $revitalizacaoPintura = "";
    }
    if ($user_data['polimento_cristalizado'] == 1) {
        $polimentoCristalizado = "Polimento Cristalizado<BR>";
    } else {
        $polimentoCristalizado = "";
    }
    if ($user_data['micro_pintura'] == 1) {
        $microPintura = "Micro Pintura<BR>";
    } else {
        $microPintura = "";
    }
    if ($user_data['polimento_farol'] == 1) {
        $polimentoFarol = "Polimento de Farol<BR>";
    } else {
        $polimentoFarol = "";
    }
    if ($user_data['pintura_geral'] == 1) {
        $pinturaGeral = "Pintura Geral<BR>";
    } else {
        $pinturaGeral = "";
    }
   



}


//reference the Dompdf namespace
use Dompdf\Dompdf;
require_once 'assets/dompdf/autoload.inc.php';

//Instanciar a classe dompdf
$dompdf = new Dompdf();


$dompdf-> loadHtml('

<! -- aqui entra o codigo html -->
<style type="text/css">
td{
    text-align: center;
}
h2{
    text-align: center;
}


</style>

<table border = 2px;  width="550">
<tr>
<th scope="col" text-align: center;><h4>Ordem de Serviço</h4></th>
</tr>
</table>

<table border = 2px;  width="550">
<tr>
<th scope="col" text-align: center; >Informações da empresa</th>
</tr>
</table>
<table border = 2px;  width="550">
        <tr>
            <th scope="col">Nome fantasia</th>
            <th scope="col">Razão social</th>
            <th scope="col">CNPJ</th>
        </tr>
        <tr>
            <td width="33%">Lanternagem e Pintura do Baiano</td>
            <td width="33%">Josemir Soares Mendes</td>
            <td width="33%" text-align: center;>38.062.042/0001-20</td>
        </tr>
</table>
<table border = 2px;  width="550">
<tr>
<th scope="col" text-align: center; >Contatos</th>
</tr>
</table>
<table border = 2px;  width="550">
        <tr>
            <th scope="col">E-mail</th>
            <th scope="col">Telefone(s)</th>
        </tr>
        <tr>
            <td width="33%">josemirsoaresmendes@gmail.com</td>
            <td width="33%">(61) 99102-0180</td>
        </tr>
</table>
<table border = 2px;  width="550">
<tr>
<th scope="col" text-align: center; >Localização</th>
</tr>
</table>
<table border = 2px;  width="550">
        <tr>
            <th scope="col">Logradouro</th>
            <th scope="col">Bairro</th>
            <th scope="col">CEP</th>
            <th scope="col">Município</th>
        </tr>
        <tr>
            <td width="33%">Quadra 21 Conjunto A, 35</td>
            <td width="33%"> Parque da Barragem Setor 03</td>
            <td width="20%" text-align: center;>72910-286</td>
            <td width="33%" text-align: center;>Águas Lindas de Goiás/Goiás</td>
        </tr>
</table>

<table border = 2px;  width="550">
<tr>
<th scope="col" text-align: center; >Dados do Cliente</th>
</tr>
</table>
<table border = 2px;  width="550">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Endereço</th>
        </tr>
        <tr>
            <td width="33%">'.$nome.'</td>
            <td width="33%">'.$cpf.'</td>
            <td width="50%" text-align: center;>'.$endereco.'</td>
        </tr>
</table>
<table border = 2px;  width="550">
<tr>
<th scope="col" text-align: center;>Contatos do cliente</th>
</tr>
</table>
<table border = 2px;  width="550">
        <tr>
            <th scope="col">Telefone</th>
            <th scope="col">E-mail</th>
        </tr>
        <tr>
        <td width="50%" text-align: center;>'.$telefone.'</td>
        <td width="50%" text-align: center;>'.$email.'</td>
        </tr>
</table>
</table>
<table border = 2px;  width="550">
<tr>
<th scope="col" text-align: center;>Infomações do Serviço</th>
</tr>
</table>
<table border = 2px;  width="550">
        <tr>
            <th scope="col">Data</th>
            <th scope="col">Horário</th>
            <th scope="col">Valor</th>
        </tr>
        <tr>
            <td width="25%" text-align: center;>'.$data.'</td>
            <td width="25%" text-align: center;>'.$horario.'</td>
            <td width="25%" text-align: center;>R$ '.$valor.'</td>
        </tr>
</table>

<table border = 2px;  width="550">
        <tr>
            <th scope="col">Serviço(s)</th>
        </tr>
        <tr>
            <td id="servico">'.$tiraRisco.
            $revitalizacaoPintura.
            $polimentoCristalizado.
            $microPintura.
            $polimentoFarol.
            $pinturaGeral.'</td>
          </tr>
</table>

    
');

//Renderização do HTML
$dompdf-> render();

//gerar a saída do documneto PDF
$dompdf -> stream(
    "nota-fiscal.pdf", //nome do arquivo pdf gerado
    array(
        "Attachment"=>false 
    )
);

?>