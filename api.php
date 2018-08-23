<?php
require_once('C:\xampp\htdocs\testeRH\unirest-php-master\src\Unirest.php');
function conectaBanco()
{
    $localhost = "localhost";//servidor local
    $banco = "historico";//acessa o banco
    $usuario = "root";
    $senha = "";
    $conexao = mysqli_connect($localhost, $usuario, $senha, $banco);//mysqliconnect funcao pronta do php pra concta com o banco
    return $conexao; //retorna conexao
}
function conectaAPI($dominio) //funcao criada para conectar pega por parametro o dominio que o usuario digitou
{
  $api_key = 'ZnrKoMntpLWxpTXp4kSfeQ';
  $customer_id = "218368419";
  $autent = Unirest\Request::auth($customer_id, $api_key);//autentica o id e a senha
  $url = "https://jsonwhoisapi.com/api/v1/whois?identifier=".$dominio;//atribui o dominio que o usuario digita
  Unirest\Request::verifyPeer(false);//desabilita o ssl
  $response = Unirest\Request::get($url, $autent);//pega o dominio que o usuario digitou e faz a requisiçao
  $json = json_decode($response->raw_body);//converte o json em um objeto - rawbody filtrar as informaçoes que precisava
  return $json; //retorna o objeto
}
function SalvaBanco($dominioDigitado)//funcao criada pra salvar o dominio digitado
{
  $conexao = conectaBanco();//utiliza a conexao do banco
  $sqlInserir = "insert into dominios(dominio) values ('$dominioDigitado')";//dominio passado por parametro e o status que vem da api
  $salvar = mysqli_query($conexao, $sqlInserir); //executa o comando query
}
?>
<html>
<head>
<title>Desafio</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <h1>Resultados da busca</h1>
<table class="table table-striped">
<tr>
<td>Nome Do Dominio</td>
<td>Criado em</td>
<td>Alterado em</td>
<td>Registrado</td>
<td>Expira em</td>
<td>NameServer</td>
</tr>
<tr>
<?php
$dominio = $_POST['dominio'];//recebe o que o usuario digitou no formulario
$api = conectaAPI($dominio);//dominio digitado conecta na API

echo "<td> $api->name</td>";
echo "<td>$api->created</td>";
echo "<td>$api->changed</td>";
echo "<td>";
//dados retornados pela API
echo isset($api->status) ? "Registrado": "Disponivel";//se existir algum dado em api status mostra como registrado se nao como disponivel
echo "</td>";
echo "<td>$api->expires</td>";//
echo "<td>";

$no =  $api->nameservers;
    foreach($no as $n)//mostrar os dados do array, quantos nameservers possuem na API
    {
      echo "<ul>";
      echo "<li>";
       echo $n;//percorre o array e mostra o nameserver
       echo "</li>";
       echo "</ul>";
    }
SalvaBanco($dominio);//o dominio que o usuario digitar salva no banco
?>
</td>
</tr>
</table>
</body>
</html>
