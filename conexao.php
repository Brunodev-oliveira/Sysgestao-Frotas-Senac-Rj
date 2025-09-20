<?PHP
// Definindo os caracteres de acentuação
	ini_set('default_charset','UTF-8');
// Define as variáveis		
	$cnn = NULL;     
// Estabelecer conexão com o banco de dados.
	$cnn = mysql_connect("127.0.0.1", "root", "usbw") or die(mysql_error());
// Seleciona o banco de dados 
	mysql_select_db("frota", $cnn) or die(mysql_error());
?>