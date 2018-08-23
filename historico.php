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
  <h1>Histórico</h1>
<table class="table table-striped">
  <tr>
    <td>Dominio</td>
    <td>Vezes Acessados</td>
  </tr>
<?php
function conectaBanco()
{
    $localhost = "localhost";
    $banco = "historico";
    $usuario = "root";
    $senha = "";
    $conexao = mysqli_connect($localhost, $usuario, $senha, $banco);
    return $conexao;
}

$sql = "select dominio, count(dominio) from dominios  group by dominio order by idDominio DESC limit 5";
$conecta = conectaBanco();
$select = mysqli_query($conecta, $sql);
while($dados = mysqli_fetch_assoc($select))
{
    echo "<tr>";
  $dominio =  $dados['dominio'];
  $QtdDominio = $dados['count(dominio)'];

     echo "<td>";
     echo $dominio;
     echo "</td>";
     echo "<td>";
     echo $QtdDominio;
     echo "</td>";
     echo "</tr>";
}
?>
