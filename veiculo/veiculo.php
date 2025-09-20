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
 <script type="text/javascript" language="javascript" src="../js/v_funcao.js">
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
					<span>Informe a Placa do Veículo</span><br>
					<input type="text" name="placa" id="placa" size="5" /><br><br>
					<input type="button" name="fincluir" value="INCLUIR" onclick="v_incluir();"/>&nbsp;
					<input type="button" name="fexcluir" value="EXCLUIR" 
					<?php echo $_SESSION['cargo']=='Administrativo'?'disabled':'';?> onclick="v_excluir();"/>&nbsp;
					<input type="button" name="falterar" value="ALTERAR" 
					<?php echo $_SESSION['cargo']=='Administrativo'?'disabled':'';?> onclick="v_alterar();"/>&nbsp;
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
