<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Sistema de Controle de Frotas - SCF</title>
<link rel="stylesheet" href="../css/estilocompleto.css">
<script type="text/javascript" language="javascript" 
src="../js/f_funcao.js">
</script>
</head>
<body onLoad="checar('consultar');">
	<form name="form1" method= "POST" action="#">
		<input type="hidden" name="mat1" id="mat1" 
		value="<?php echo $_POST['matricula']; ?>" />
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
				  header("location:funcionario.php");	
				  break;
				}
				
				// Inicia os comandos para a consulta dos dados no banco de dados 
				if(isset($_POST["acao"])){
					switch ($_POST["acao"]){
						case "consultar":
							include "alterar.php";					
					}
				}	
				
				// Inicia os comandos para a alteração dos dados no formulário 
				if(isset($_POST["alterar"])) {	
					$matricula = $_POST["matricula"];
					$nome = $_POST["nome"];
					$telefone = $_POST["telefone"];
					$cargo = $_POST["cargo"];
					$senha = $_POST["senha"];
					$query = mysql_query("UPDATE funcionario SET matricula='$matricula',nome='$nome',telefone='$telefone',cargo='$cargo',senha='$senha' WHERE matricula = '$matricula'", $cnn) or die(mysql_error());     
					$result = mysql_affected_rows();
					if($result > 0){
						echo "<script> alert('Funcionário Alterado com Sucesso!!'); </script>";
						echo "<script> window.location='funcionario.php';</script>"; 
					}
					else{
						echo "<script> alert('Funcionário não Alterado!!'); </script>";
						echo "<script> window.location='funcionario.php';</script>"; 
					}
				}									
?>						
		</div>
		<div id="footer">  		
			Desenvolvido por Bruno Oliveira.  	
		</div>  
	</div>  
</body>  
</html>
