<?php
	$matricula = $_POST["mat1"];
	$query = mysql_query("SELECT * FROM funcionario WHERE matricula = '$matricula' LIMIT 1", $cnn) or die(mysql_error());       
	$result = mysql_num_rows($query);
	if($result == 0){
		echo "<script> alert('Funcionário não Cadastrado!!'); </script>";
		echo "<script> window.location='funcionario.php';</script>"; 					
	}
	else{
		$registro = mysql_fetch_row($query);
		$matricula = $registro[0];
		$nome = $registro[1];
		$telefone = $registro[2];
		$cargo = $registro[3];
		?>	
		<!-- INICIANDO O BLOCO DO FORMULÁRIO PARA CONSULTA DOS DADOS -->
		<form name="form1" id="form1" action="#" method="post">
			<div class="grupo">
			<p>Dados do Funcionário</p>
			<p><span>Matrícula do Funcionário</span>&nbsp;
			<input type="text" name="matricula" id="matricula" size="4" readonly="readonly" value="<?php echo $matricula;?>"/>
			</br></br>
			
			<span>Nome do Funcionário</span>&nbsp;
			<input type="text" name="nome" id="nome" size="50" readonly="readonly" value="<?php echo $nome;?>" />
			</br></br>
			
			<span>Telefone do Funcionário</span>&nbsp;
			<input type="text" name="telefone" id="telefone" size="10" readonly="readonly" value="<?php echo $telefone;?>"/>
			</br></br>
			
			<span>Cargo do Funcionário</span>&nbsp;
			<input type="text" name="cargo" id="cargo" size="10" readonly="readonly" value="<?php echo $cargo;?>"/>
			</br>
							
			<p><span>&nbsp;</span><input type="submit" name="excluir" id="excluir" value="Confirma a Exclusão"/>&nbsp;
			<span>&nbsp;</span><input type="submit" name="cancelar" id="cancelar" value="Cancela a Exclusão"/></p>
			</div>
		</form>
		<!-- FINALIZANDO O BLOCO DO FORMULÁRIO PARA CONSULTA DOS DADOS -->
		<?php
	}
?>