<!-- Integração JSON - MySQL -->

<?php
$mysqli = new mysqli("localhost", "root", "password", "bd_name");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//echo $mysqli->host_info . "\n";

$mysqli = new mysqli("127.0.0.1", "root", "password", "bd_name", 3306);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// Objetivo: inserir JSON em tabela MySQL, com dados em colunas separadas --------------------------
// Escrever JSON simples 

$json= '["como","será","amanhã"]';
$jphp= json_decode($json);

// Verificação das chaves
foreach ($jphp as $key => $value) { 
	echo utf8_decode($key." => ".$jphp[$key])."<br>";
}

// Transformar cada elemento do array em variável
$como = $jphp[0];
$sera = $jphp[1];
$amanha = $jphp[2];

// Queries para o banco de dados com as variáveis-chave do array. Montar outra tabela
mysqli_query($mysqli,"INSERT INTO segundo_teste VALUES ('$como','$sera','$amanha')")
or die(mysqli_error());

echo "registrado com sucesso!";*/

// Objetivo: Extrair dados de tabela MySQL e converter para JSON --------------------------

$jsonselect = array();

$sql = "SELECT * FROM historico_orquid ORDER BY data"; // Query
$result = $mysqli->query($sql);

while($fetch=mysqli_fetch_array($result)){
	$jsonselect[] = $fetch;
}

// Conversão do array em string JSON
echo json_encode($jsonselect,JSON_UNESCAPED_UNICODE);*/

// Transformar dados de formulário em string JSON --------------------------

// Teste de variáveis
//echo $_POST['formJSON']."<br>".$_POST['numJSON'];
?>

<html DOCTYPE>
<head>
	<meta charset="utf-8">
</head>
<body>
	Teste de conversão form-json <br>
	<form action="jsonMySQL.php" method="post">
		Insira qualquer coisa para virar string <input type="text" name="formJSON" id="formJSON"><br>
		Qualquer numero<input type="number" name="numJSON" id="numJSON"><br>
		<input type="submit" value="enviar!">
	</form>

	<!-- Montagem, conversão, e exibição do array -->
	<?php
		$arrayForm = array(texto => $_POST['formJSON'], numero => $_POST['numJSON']); // Assim funciona!
		echo "Resultado da conversão<br>";
		echo json_encode($arrayForm,JSON_UNESCAPED_UNICODE);
	?>
</body>
</html>