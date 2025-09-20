function f_incluir(){
	if(document.form1.matricula.value=="" ){
		alert("Necessário Preencher o Campo MATRÍCULA");
	}
	else{
		document.form1.action = "funcionario_incluir.php";
		document.form1.submit();
	}
}

function f_excluir(){
	if(document.form1.matricula.value=="" ){
		alert("Necessário Preencher o Campo MATRÍCULA");
	}
	else{
		document.form1.action = "funcionario_excluir.php";
		document.form1.submit();
	}
}

function f_alterar(){
	if(document.form1.matricula.value=="" ){
		alert("Necessário Preencher o Campo MATRÍCULA");
	}
	else{
		document.form1.action = "funcionario_alterar.php";
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

