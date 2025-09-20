<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
  <title>Sistema de Controle de Frotas - SCF</title>
 <link rel="stylesheet" href="../css/estilocompleto.css">
 <script type="text/javascript" language="javascript" src="../js/s_funcao.js">
</script>
</head>
<body onLoad="checar('consultar');">
	<form name="form1" method= "POST" action="#">
		<input type="hidden" name="mat1" id="mat1" value="<?php echo $_POST['matricula']; ?>" />
		<input type="hidden" name="placa1" id="placa1" value="<?php echo $_POST['placa']; ?>" />
		<input type="hidden" name="acao" id="acao"/>
	</form>
		<div id="container">  	
		<div id="header" title="sitename">  				
			<h1>SCF - Sistema de Controle de Frotas</h1>  	
		</div>  	
		<div id="mainnav">  		
			
		</div>  		
		<div id="contents"> 
			<?php 
				
			// Abre o arquivo com as conexões do BD
				include "../conexao.php";
				
				// Define as variáveis	
				$result = NULL;
				$acao = NULL;
				$query = NULL;  
				
				// Retorna para o formulário principal 
				if(isset($_POST["cancelar"])){	
				  header("location:servico.php");	
				  break;
				}
				
				if(isset($_POST["acao"])){
					switch ($_POST["acao"]){
						case "consultar":
							include "incluir.php";
					}				
				}		
				
				// Inicia os comandos para a exclusão dos dados no formulário 
				if(isset($_POST["incluir"])) {
					date_default_timezone_set('America/Sao_Paulo');
					$tipo = $_POST["tipo"];
					$data = date("Y-m-d");
					$hora = date("H:i:s");
					$placa = $_POST["placa"];
					$matricula = $_POST["matricula"];
					$query = mysql_query("INSERT INTO servico VALUES('','$tipo','$data','$hora','$placa','$matricula')", $cnn) or die(mysql_error()); 
					$result = mysql_affected_rows();
					if($result > 0){
						echo "<script> alert('Serviço Confirmado!'); </script>";
						echo "<script> window.location='servico.php';</script>";
					}
					else{
						echo "<script> alert('Serviço não Confirmado!'); </script>";
						echo "<script> window.location='servico.php';</script>";
					}
				}
				
				// Inicia os comandos para a consulta dos dados no banco de dados 
									
?>						
		</div>
		<div id="footer">  		
			Desenvolvido por Bruno Oliveira.  	
		</div>  
	</div>  
</body>  
</html>
