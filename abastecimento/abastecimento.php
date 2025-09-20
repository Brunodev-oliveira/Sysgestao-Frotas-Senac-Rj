<?php
session_start();
if($_SESSION['cargo'] == "Motorista" && $_SESSION['acesso'] == 1) {
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
  <title>Sistema de Controle de Frotas - SCF</title>
 <link rel="stylesheet" href="../css/estilocompleto.css">
 <script type="text/javascript" language="javascript" src="../js/a_funcao.js">
</script>
</head>
<body>
	<div id="container">  	
		<div id="header" title="sitename">  				
			<h1>SCF - Sistema de Controle de Frotas</h1>  	
		</div>  	
		<div id="mainnav">  
		
		</div>  		
		<div id="contents">  		
			<form name="form1" id="form1" action="#" method="post">
				<div class="grupo">
					<center>
					<span>Matrícula do Motorista</span><br>
					<input type="text" name="matricula" id="matricula" size="3" 
					value="<?php echo $_SESSION['matricula'];?>">
					<br><br>
					
					<span>Informe a Placa do Veículo</span><br>
					<input type="text" name="placa" id="placa" size="5" placeholder="XXX-9999" 
					maxlength="8"/>
					<br><br>
					
					<input type="button" name="sincluir" id="sincluir" value="CONFIRMAR" onclick="s_incluir();"/>&nbsp;
					<input type="button" name="sfinal" id="sfinal" value="FINALIZAR" onclick="s_final();"/>&nbsp;
					</center>
				</div>
			</form>
		</div>
		<div id="footer">  		
			Desenvolvido por Bruno Oliveira.  	
		</div>  
	</div>  
</body>  
</html>
<?php
}
else{
	echo "<script> window.location='../principal.php';</script>"; 
}
?>
