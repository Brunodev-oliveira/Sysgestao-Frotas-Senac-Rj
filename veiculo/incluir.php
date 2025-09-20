<?php
	$placa = $_POST["placa1"];
	$query = mysql_query("SELECT * FROM veiculo WHERE placa = '$placa' LIMIT 1", $cnn) or die(mysql_error());       
	$result = mysql_num_rows($query);
	if($result == 0){
		?>	
		<!-- INICIANDO O BLOCO DO FORMULÁRIO PARA INCLUSÃO DOS DADOS -->
		<form name="form1" id="form1" action="#" method="post">
			<script>
				function retornar(){
					location.href="veiculo.php";
				}
			</script>
			<div class="grupo">
			<p>Dados do Veículo</p>
			<p><span>Placa do Veículo</span>&nbsp;
			<input type="text" name="placa" id="placa" size="8" readonly="readonly" value="<?php echo $placa;?>"/>
			</br></br>
			
			<span>Informe a Marca do Veículo</span>&nbsp;
			<input type="text" name="marca" id="marca" size="30" required 
			oninvalid="setCustomValidity('Por favor, preencha o campo MARCA DO VEÍCULO')" 
			onchange="try{setCustomValidity('')}catch(e){}" />
			</br></br>
			
			<span>Informe o Modelo do Veículo</span>&nbsp;
			<input type="text" name="modelo" id="modelo" size="10" required 
			oninvalid="setCustomValidity('Por favor, preencha o campo MODELO DO VEÍCULO')" 
			onchange="try{setCustomValidity('')}catch(e){}"/>
			</br></br>
			
			<span>Informe o Ano de Fabricação</span>&nbsp;
			<input type="text" name="ano" id="ano" size="3" required 
			oninvalid="setCustomValidity('Por favor, preencha o campo ANO DE FABRICAÇÃO DO VEÍCULO')" 
			onchange="try{setCustomValidity('')}catch(e){}"/>
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
		$placa = $registro[0];
		$marca = $registro[1];
		$modelo = $registro[2];
		$ano = $registro[3];
		?>	
		<!-- INICIANDO O BLOCO DO FORMULÁRIO PARA CONSULTA DOS DADOS -->
		<form name="form1" id="form1" action="#" method="post">
			<div class="grupo">
			<p>Dados do Veículo</p>
			<p><span>Placa do Veículo</span>&nbsp;
			<input type="text" name="placa" id="placa" size="8" readonly="readonly" value="<?php echo $placa;?>"/>
			</br></br>
			<span>Marca do Veículo</span>&nbsp;
			<input type="text" name="marca" id="marca" size="30" readonly="readonly" value="<?php echo $marca;?>"/>
			</br></br>
			<span>Modelo do Veículo</span>&nbsp;
			<input type="text" name="modelo" id="modelo" size="10" readonly="readonly" value="<?php echo $modelo;?>"/>
			</br></br>
			<span>Ano de Fabricação</span>&nbsp;
			<input type="text" name="ano" id="ano" size="5" readonly="readonly" value="<?php echo $ano;?>"/>
			</br>
									
			<p><span>&nbsp;</span><input type="submit" name="cancelar" id="cancelar" value="Retornar"/></p>
			</div>
		</form>
		<!-- FINALIZANDO O BLOCO DO FORMULÁRIO PARA CONSULTA DOS DADOS -->
		<?php
	}
?>