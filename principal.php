<?php 
	// Inicia a sessão
	session_start();
	unset ($_SESSION['cargo']);
	unset ($_SESSION['acesso']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
  <title>Sistema de Controle de Frotas - SCF</title>
 <link rel="stylesheet" href="css/estilocompleto.css">
 <script type="text/javascript" language="javascript">
		function f_confirmar(){
			if(document.form1.mat.value=="" || document.form1.senha.value==""){
				alert("Necessário Preencher o Campo MATRÍCULA e/ou SENHA");
			}
			else{
				document.form1.action = "acesso.php";
				document.form1.submit();
			
			}
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

</script>
</head>
<body>
	<div id="container">  	
		<div id="header" title="sitename">  				
			<h1>SCF - Sistema de Controle de Frotas</h1>  	
		</div>  	
		<div id="mainnav">  		
			
		</div>  		
		 	<div id="form"> 	
			<form name="form1" id="form1" action="#" method="post">
				<div class="principal">
					<center>
					<h3>Acesso ao Sistema</h3>
					
					<span>Informe a Matrícula</span>&nbsp;
					<input type="text" name="mat" id="mat" size="4" 
					onkeypress="mascara_mat(this)" placeholder="999-9" maxlength="5"
					onkeydown="return somente_numero(event)"/>
					</br></br>
					
					<span>Informe a Senha</span>&nbsp;
					<input type="password" name="senha" id="senha" maxlength="6" size="4"/><br><br>
					
					<input type="button" name="confirmar" id="confirmar" value="CONFIRMAR" onclick="f_confirmar();"/>&nbsp;
					<input type="reset" name="limpar" id="limpar" value="LIMPAR" /></center><br>
				</div>
			</form>
		</div>
		<div id="footer">  		
			Desenvolvido por Bruno Oliveira.  	
		</div>  
	</div>  
</body>  
</html>
