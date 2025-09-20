<?php
	$matricula = $_POST["mat1"];
	$query1 = mysql_query("SELECT * FROM funcionario WHERE matricula = '$matricula' LIMIT 1", $cnn) or die(mysql_error());       
	$result = mysql_num_rows($query1);
	if($result == 0){
		echo "<script> alert('Funcionário não Cadastrado!!'); </script>";
		echo "<script> window.location='servico.php';</script>"; 					
	}
	else{
		$placa = $_POST["placa1"];
		$query2 = mysql_query("SELECT * FROM veiculo WHERE placa = '$placa' LIMIT 1", $cnn) or die(mysql_error());       
		$result = mysql_num_rows($query2);
		if($result == 0){
			echo "<script> alert('Veículo não Cadastrado!!'); </script>";
			echo "<script> window.location='servico.php';</script>"; 					
		}
		else{
		$registro1 = mysql_fetch_row($query1);
		$matricula = $registro1[0];
		$nome = $registro1[1];
		
		$registro2 = mysql_fetch_row($query2);
		$placa = $registro2[0];
		$marca = $registro2[1];
		$modelo = $registro2[2];
		$ano = $registro2[3];
		?>	
		<!-- INICIANDO O BLOCO DO FORMULÁRIO PARA CONSULTA DOS DADOS -->
		<form name="form1" id="form1" action="#" method="post">
			<script>
				function retornar(){
					location.href="funcionario.php";
				}
			</script>
			<div class="grupo">
			<p>Dados do Funcionário</p>
			<p><span>Matrícula do Funcionário</span>&nbsp;
			<input type="text" name="matricula" id="matricula" size="4" readonly="readonly" value="<?php echo $matricula;?>"/>
			</br>
			
			<span>Nome do Funcionário</span>&nbsp;
			<input type="text" name="nome" id="nome" size="50" readonly="readonly" value="<?php echo $nome;?>" />
			</br></br>
			
			<p>Dados do Veículo</p>
			<p><span>Placa do Veículo</span>&nbsp;
			<input type="text" name="placa" id="placa" size="8" readonly="readonly" value="<?php echo $placa;?>"/>
			</br>
			
			<span>Marca do Veículo</span>&nbsp;
			<input type="text" name="marca" id="marca" size="30" readonly="readonly" value="<?php echo $marca;?>"/>
			</br>
			
			<span>Modelo do Veículo</span>&nbsp;
			<input type="text" name="modelo" id="modelo" size="10" readonly="readonly" value="<?php echo $modelo;?>"/>
			</br>
			
			<span>Ano de Fabricação</span>&nbsp;
			<input type="text" name="ano" id="ano" size="5" readonly="readonly" value="<?php echo $ano;?>"/>
			</br>
			
			<span>Tipo de Serviço a Executar</span>&nbsp;
			<input type="text" name="tipo" id="tipo" size="50" />
			</br></br>
							
			<p><span>&nbsp;</span><input type="submit" name="incluir" id="incluir" value="Confirma Serviço"/>&nbsp;
			<span>&nbsp;</span><input type="submit" name="cancelar" id="cancelar" value="Cancela Serviço" onclick="retornar();"/></p>
			</div>
		</form>
		<!-- FINALIZANDO O BLOCO DO FORMULÁRIO PARA CONSULTA DOS DADOS -->
		<?php
	}
	}
?>
