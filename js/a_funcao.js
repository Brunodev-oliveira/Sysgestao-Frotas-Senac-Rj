function s_incluir(){
	if(document.form1.placa.value=="" ){
		alert("Necessário Preencher o Campo PLACA");
	}
	else{
		document.form1.action = "abastecimento_incluir.php";
		document.form1.submit();
	}
}

function s_final(){
	window.location='../principal.php';
}

function s_consultar(){
	if(document.form1.dt_inicio.value=="" || document.form1.dt_final.value=="" ){
		alert("Necessário Preencher os Campos DATA");
	}
	else{
		document.form1.action = "../relatorio/relatorio_servico.php";
		document.form1.submit();
	}
}

function checar(e){
	document.form1.acao.value = e;
	document.form1.submit();
}

function mascara_mat (objeto){
	if(objeto.value.length == 3){
		objeto.value = objeto.value + '-';
	}
}	

function mascara_data (objeto){
	if(objeto.value.length == 2){
		objeto.value = objeto.value + '-';
	}
	if(objeto.value.length == 5){
		objeto.value = objeto.value + '-';
	}
}

function somente_numero(e){
	tecla = (window.event)?event.keyCode:e.which;
	if ((tecla > 47 && tecla < 58)){
		return true;
	}
	else{
		if ((tecla > 95 && tecla < 106)){
			return true;
		}
		else{
			if (tecla == 8 || tecla == 9 || tecla == 46){
				return true;
			}
			else{
				return false;	
			}
		}	
	}
}

