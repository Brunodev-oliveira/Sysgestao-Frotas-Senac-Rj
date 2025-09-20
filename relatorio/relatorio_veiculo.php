<?php
// Abre o arquivo com as conexões do BD
include "../conexao.php";

// Define a Estrutura do Relatório
$arquivo = 'Veiculo_Total.xls';
 $tabela = '<table border="1">';
 $tabela .= '<tr>';
 $tabela .= '<td><b>Placa</b></td>';
 $tabela .= '<td><b>Marca</b></td>';
 $tabela .= '<td><b>Modelo</b></td>';
 $tabela .= '<td><b>Ano</b></td>';
 $tabela .= '</tr>';

 $resultado = mysql_query('SELECT * FROM veiculo');

 while($dados = mysql_fetch_array($resultado))
 {
  $tabela .= '<tr>';
  $tabela .= '<td>'.$dados['placa'].'</td>';
  $tabela .= '<td>'.$dados['marca'].'</td>';
  $tabela .= '<td>'.$dados['modelo'].'</td>';
  $tabela .= '<td>'.$dados['ano'].'</td>';
  $tabela .= '</tr>';
 }

 $tabela .= '</table>';

 header ('Cache-Control: no-cache, must-revalidate');
 header ('Pragma: no-cache');
 header('Content-Type: application/x-msexcel');
 header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
 echo $tabela;
 ?>