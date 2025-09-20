<?php
	$matricula = $_POST["mat1"];
	$query = mysql_query("SELECT * FROM funcionario WHERE matricula = '$matricula' LIMIT 1", $cnn) or die(mysql_error());       
	$result = mysql_num_rows($query);
	if($result == 0){
		?>	
		<!-- INICIANDO O BLOCO DO FORMULÁRIO PARA INCLUSÃO DOS DADOS -->
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
			<input type="text" name="nome" id="nome" size="50" required 
			oninvalid="setCustomValidity('Por favor, preencha o campo NOME DO FUNCIONÁRIO')" 
			onchange="try{setCustomValidity('')}catch(e){}" />
			</br></br>
			
			<span>Informe o Telefone do Funcionário</span>&nbsp;
			<input type="text" name="telefone" id="telefone" size="10" required 
			oninvalid="setCustomValidity('Por favor, preencha o campo TELEFONE DO FUNCIONÁRIO')" 
			onchange="try{setCustomValidity('')}catch(e){}"
			onkeypress="mascara_tel(this)" placeholder="(99)9999-9999" 
			maxlength="13" onkeydown="ret
			urn somente_numero(event)"/>
			</br></br>
			
			<span>Selecione o Cargo do Funcionário</span>&nbsp;
			<select name="cargo" id="cargo">
				<option value="Selecione">Selecione o Cargo</option>
				<option value="Administrativo">Administrativo</option>
				<option value="Gerente">Gerente</option>
				<option value="Motorista">Motorista</option>
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
										
			<p><span>&nbsp;</span><input type="submit" name="incluir" id="incluir" value="Confirma Inclusão"/>&nbsp;
			<span>&nbsp;</span><input type="button" name="cancelar" id="cancelar" value="Cancela Inclusão" onclick="retornar();" /></p>
			</div>
		</form>
		<!-- FINALIZANDO O BLOCO DO FORMULÁRIO PARA INCLUSÃO DOS DADOS -->
		
		<?php							
	}
	else{
		$registro = mysql_fetch_row($query);
		$matricula = $registro[0];
		$nome = $registro[1];
		$telefone = $registro[2];
		$cargo = $registro[3];
		$senha = $registro[4];
		?>	
		<!-- INICIANDO O BLOCO DO FORMULÁRIO PARA CONSULTA DOS DADOS -->
		<form name="form1" id="form1" action="#" method="post">
			<div class="grupo">
			<p>Dados do Funcionário</p>
			<p><span>Matrícula do Funcionário</span>&nbsp;
			<input type="text" name="matricula" id="matricula" size="4"  readonly="readonly" value="<?php echo $matricula;?>"/>
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
									
			<p><span>&nbsp;</span><input type="submit" name="cancelar" id="cancelar" value="Retornar"/></p>
			</div>
		</form>
		<!-- FINALIZANDO O BLOCO DO FORMULÁRIO PARA CONSULTA DOS DADOS -->
		<?php
	}
?>