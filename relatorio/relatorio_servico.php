<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
  <title>Sistema de Controle de Frotas - SCF</title>
 <script type="text/javascript" language="javascript" src="../js/s_funcao.js">
</script>
</head>
<body onLoad="checar('consultar');">
	<form name="form1" method= "POST" action="#">
		<input type="hidden" name="dt1" id="dt1" value="<?php echo $_POST['dt_inicio']; ?>" />
		<input type="hidden" name="dt2" id="dt2" value="<?php echo $_POST['dt_final']; ?>" />
		<input type="hidden" name="acao" id="acao"/>
	</form>
		<?php 
				
		// Abre o arquivo com as conexões do BD
			include "../conexao.php";
		
		// Inicia os comandos para a consulta dos dados no banco de dados 
		if(isset($_POST["acao"])){
			switch ($_POST["acao"]){
				case "consultar":
					// Abre o arquivo com as conexões do BD
					include "../conexao.php";

					// Define a Estrutura do Relatório
					$arquivo = 'Servico_Parcial.xls';
					$tabela = '<table border="1">';
					$tabela .= '<tr>';
					$tabela .= '<td><b>No. do Servico</b></td>';
					$tabela .= '<td><b>Tipo de Servico</b></td>';
					$tabela .= '<td><b>Data</b></td>';
					$tabela .= '<td><b>Hora</b></td>';
					$tabela .= '<td><b>Placa</b></td>';
					$tabela .= '<td><b>Matricula</b></td>';
					$tabela .= '</tr>';
					
					date_default_timezone_set('America/Sao_Paulo');
					$inicio = date('Y-m-d', strtotime($_POST['dt1']));
					$final = date('Y-m-d', strtotime($_POST['dt2']));
					
					$resultado = mysql_query("SELECT * FROM servico where data between '$inicio' AND '$final'");

					while($dados = mysql_fetch_array($resultado)){
						$tabela .= '<tr>';
						$tabela .= '<td>'.$dados['num_serv'].'</td>';
						$tabela .= '<td>'.$dados['tipo'].'</td>';
						$tabela .= '<td>'.$dados['data'].'</td>';
						$tabela .= '<td>'.$dados['hora'].'</td>';
						$tabela .= '<td>'.$dados['placa'].'</td>';
						$tabela .= '<td>'.$dados['matricula'].'</td>';
						$tabela .= '</tr>';
					}

					$tabela .= '</table>';

					header ('Cache-Control: no-cache, must-revalidate');
					header ('Pragma: no-cache');
					header('Content-Type: application/x-msexcel');
					header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
					echo $tabela;
			}				
		}
	?>						
</body>  
</html>




