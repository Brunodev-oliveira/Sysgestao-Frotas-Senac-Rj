function v_incluir(){
	if(document.form1.placa.value=="" ){
		alert("Necessário Preencher o Campo PLACA");
	}
	else{
		document.form1.action = "veiculo_incluir.php";
		document.form1.submit();
	}
}

function v_excluir(){
	if(document.form1.placa.value=="" ){
		alert("Necessário Preencher o Campo PLACA");
	}
	else{
		document.form1.action = "veiculo_excluir.php";
		document.form1.submit();
	}
}

function v_alterar(){
	if(document.form1.placa.value=="" ){
		alert("Necessário Preencher o Campo PLACA");
	}
	else{
		document.form1.action = "veiculo_alterar.php";
		document.form1.submit();
	}
}

function checar(e){
	document.form1.acao.value = e;
	document.form1.submit();
}		