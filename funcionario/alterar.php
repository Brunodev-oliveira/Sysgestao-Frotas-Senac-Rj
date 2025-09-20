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
		$senha = $registro[4];
		?>	
		<!-- INICIANDO O BLOCO DO FORMULÁRIO PARA ALTERAÇÃO DOS DADOS -->
		<form name="form1" id="form1" action="#" method="post">
			<script>
				function retornar(){
					location.href="funcionario.php";
				}
				
				function verificar(){
					if (document.getElementById('senha').value != document.getElementById('c_senha').value){
						alert ("As senhas não conferem, favor verificar");
						document.getElementById('senha').value="";
						document.getElementById('c_senha').value="";
					}
				}
				function mascara_tel (objeto){
					if(objeto.value.length == 0){
						objeto.value = objeto.value + '(';
					}
					if(objeto.value.length == 3){
						objeto.value = objeto.value + ')';
					}
					if(objeto.value.length == 8){
						objeto.value = objeto.value + '-';
					}
				}
				
			</script>
			<div class="grupo">
			<p>Dados do Funcionário</p>
			<p><span>Matrícula do Funcionário</span>&nbsp;
			<input type="text" name="matricula" id="matricula" size="4"  readonly="readonly" value="<?php echo $matricula;?>"/>
			</br></br>
			
			<span>Informe o Nome do Funcionário</span>&nbsp;
			<input type="text" name="nome" id="nome" size="50" value="<?php echo $nome;?>" required 
			oninvalid="setCustomValidity('Por favor, preencha o campo NOME DO FUNCIONÁRIO')" 
			onchange="try{setCustomValidity('')}catch(e){}" />
			</br></br>
			
			<span>Informe o Telefone do Funcionário</span>&nbsp;
			<input type="text" name="telefone" id="telefone" size="10" value="<?php echo $telefone;?>" required 
			oninvalid="setCustomValidity('Por favor, preencha o campo TELEFONE DO FUNCIONÁRIO')" 
			onchange="try{setCustomValidity('')}catch(e){}"
			onkeypress="mascara_tel(this)" placeholder="(99)9999-9999" 
			maxlength="13" onkeydown="return somente_numero(event)"/>
			</br></br>
			
			<span>Selecione o Cargo do Funcionário</span>&nbsp;
			<select name="cargo" id="cargo">
				<option value="Selecione" <?php echo $cargo=='Selecione'?'selected':'';?>>Selecione o Cargo</option>
				<option value="Administrativo" <?php echo $cargo=='Administrativo'?'selected':'';?>>Administrativo</option>
				<option value="Gerente" <?php echo $cargo=='Gerente'?'selected':'';?>>Gerente</option>
				<option value="Motorista" <?php echo $cargo=='Motorista'?'selected':'';?>>Motorista</option>
			</select>
			</br></br>
			
			<span>Informe a Senha para Acesso ao Sistema</span>&nbsp;
			<input type="password" name="senha" id="senha" size="5" required 
			oninvalid="setCustomValidity('Por favor, preencha o campo SENHA DO FUNCIONÁRIO')" 
			onchange="try{setCustomValidity('')}catch(e){}"/>
			</br></br>
			
			<span>Confirme a Senha para Acesso ao Sistema</span>&nbsp;
			<input type="password" name="c_senha" id="c_senha" size="5" required 
			oninvalid="setCustomValidity('Por favor, preencha o campo CONFIRMAÇÃO DE SENHA DO FUNCIONÁRIO')" 
			onchange="try{setCustomValidity('')}catch(e){}" onblur="verificar();"/>
			</br>
										
			<p><span>&nbsp;</span><input type="submit" name="alterar" id="alterar" value="Confirma Alteração"/>&nbsp;
			<span>&nbsp;</span><input type="button" name="cancelar" id="cancelar" value="Cancela Alteração" onclick="retornar();" /></p>
			</div>
		</form>
		<!-- FINALIZANDO O BLOCO DO FORMULÁRIO PARA ALTERAÇÃO DOS DADOS -->
		
		<?php							
	}
?>