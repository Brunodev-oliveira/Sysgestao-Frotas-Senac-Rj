<?php
// Abre o arquivo com as conexões do BD
include "../conexao.php";

// Define a Estrutura do Relatório
$arquivo = 'Funcionario_Total.xls';
 $tabela = '<table border="1">';
 $tabela .= '<tr>';
 $tabela .= '<td><b>Matricula</b></td>';
 $tabela .= '<td><b>Nome</b></td>';
 $tabela .= '<td><b>Telefone</b></td>';
 $tabela .= '<td><b>Cargo</b></td>';
 $tabela .= '</tr>';

 $resultado = mysql_query('SELECT * FROM funcionario');

 while($dados = mysql_fetch_array($resultado))
 {
  $tabela .= '<tr>';
  $tabela .= '<td>'.$dados['matricula'].'</td>';
  $tabela .= '<td>'.$dados['nome'].'</td>';
  $tabela .= '<td>'.$dados['telefone'].'</td>';
  $tabela .= '<td>'.$dados['cargo'].'</td>';
  $tabela .= '</tr>';
 }

 $tabela .= '</table>';

 header ('Cache-Control: no-cache, must-revalidate');
 header ('Pragma: no-cache');
 header('Content-Type: application/x-msexcel');
 header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
 echo $tabela;
 ?>