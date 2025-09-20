<?php
session_start();
if(($_SESSION['cargo'] == "Gerente" || $_SESSION['cargo'] == "Administrativo") && $_SESSION['acesso'] == 1) {
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
  <title>Sistema de Controle de Frotas - SCF</title>
 <link rel="stylesheet" href="../css/estilocompleto.css">
 <script type="text/javascript" language="javascript" src="../js/s_funcao.js">
</script>
</head>
<body>
	<div id="container">  	
		<div id="header" title="sitename">  				
			<h1>SCF - Sistema de Controle de Frotas</h1>  	
		</div>  	
		<div id="mainnav">  		
			<ul class="menu clearfix">  			
				<li><a href="../inicio.php">Principal</a></li>
				<li><a href="../funcionario/funcionario.php">Funcionários</a></li>
				<li><a href="../veiculo/veiculo.php">Veículos</a></li>
				<li><a href="../servico/servico.php">Serviços</a></li>
				<li><a href="">Relatórios</a>
					<!-- Nível 1 -->
					<!-- submenu -->
					<ul class="sub-menu clearfix">
						<li><a href="../relatorio/relatorio_funcionario.php">Funcionários</a></li>
						<li><a href="../relatorio/relatorio_veiculo.php">Veículos</a></li>
						<li><a href="../servico/servico_consultar.php">Serviços</a></li>
						<li><a href="">Abastecimentos</a></li>
					</ul>
				<li><a href="../principal.php">Sair</a></li>
			</ul> 
		</div>  		
		<div id="contents">  		
			<form name="form1" id="form1" action="#" method="post">
				<div class="grupo">
					<center>
					<span>Informe o Período Desejado</span><br>
					<span>De</span>&nbsp;<input type="text" name="dt_inicio" id="dt_inicio" 
					size="4" onkeypress="mascara_data(this)" placeholder="99-99-9999" 
					maxlength="10" onkeydown="return somente_numero(event)"/>&nbsp;&nbsp;
					
					<span>Até</span>&nbsp;<input type="text" name="dt_final" id="dt_final" 
					size="4" onkeypress="mascara_data(this)" placeholder="99-99-9999" 
					maxlength="10" onkeydown="return somente_numero(event)"/>&nbsp;&nbsp;
					<br><br>
					
					<input type="button" name="sconsultar" id="sconsultar" value="CONFIRMAR"
					onclick="s_consultar();"/>&nbsp;
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
