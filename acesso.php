<?php 
	// Inicia a sessão
	session_start();
	$_SESSION['acesso'] = 1;
	
	 // Define as variáveis		
	$result = NULL;
	$acao = NULL;
	$query = NULL;        
		
	// Abre o arquivo com as conexões do BD
	include "conexao.php";
	
	$result = NULL;
	$acao = NULL;
	$query = NULL;   
	$matricula = $_POST["mat"];
	$senha = $_POST["senha"];
	$query = mysql_query("SELECT * FROM funcionario WHERE matricula = '$matricula' LIMIT 1", $cnn) or die(mysql_error());      
	$result = mysql_num_rows($query);
	if($result == 0){
		echo "<script> alert('Usuário não Cadastrado!!'); </script>";
		echo "<script> window.location='principal.php';</script>"; 
	}
	else{
		$registro = mysql_fetch_row($query);
		$matricula = $registro[0];
		$cargo = $registro[3];
		$senha1 = $registro[4];
		if($cargo=="Gerente" && $senha1==$senha ){
			$_SESSION['cargo'] = $cargo;
			echo "<script> alert('Bem Vindo ao Sistema!!'); </script>";
			echo "<script> window.location='inicio.php';</script>"; 
		}
		else{
			if($cargo=="Administrativo" && $senha1==$senha ){
				$_SESSION['cargo'] = $cargo;
				echo "<script> alert('Bem Vindo ao Sistema!!'); </script>";
				echo "<script> window.location='inicio.php';</script>"; 
			}
			else{
				if($cargo=="Motorista"){
					$_SESSION['matricula'] = $matricula;
					$_SESSION['cargo'] = $cargo;
					echo "<script> alert('Bem Vindo ao Sistema!!'); </script>";
					echo "<script> window.location='abastecimento/abastecimento.php';</script>"; 
				}
				else{
					unset ($_SESSION['cargo']);
					echo "<script> alert('Senha Inválida'); </script>";
					echo "<script> window.location='principal.php';</script>"; 
				}
			}	
		}
	}
?>