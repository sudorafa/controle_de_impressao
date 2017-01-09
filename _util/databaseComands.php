<?php
date_default_timezone_set("America/Recife");

function formatDate($dataHora){
	$dataHora = substr($dataHora, 6, 10);
	$dataHora = date("Y-m-d H:i:s", $dataHora);   // 2016-11-25 06:10:26
	return $dataHora;
}

function connect(){
$link = new mysqli("localhost", "root", "usbw", "ControleImpressao");

if (!$link) {
    echo "Error: Não foi possível conectar ao MySQL." . PHP_EOL;
    echo "Erro nº: " . mysqli_connect_errno() . PHP_EOL;
    exit;
} else
return $link;

}

function disconnect($conn) {
	
	if (!mysqli_close($conn)){
		echo "Error: Não foi possível conectar ao MySQL." . PHP_EOL;
		echo "Erro nº: " . mysqli_connect_errno() . PHP_EOL;
		return false;
	}
	else
		return true;
}

/*======= TABELA ARQUIVO: ======*/

//C - Create 
function insertArquivo($nomeDocumento, $status, $noPaginas, $idUsuario, $conn){
	$sql = "INSERT INTO arquivo (Nome, `Status`, Paginas, ID_Usuario) VALUES ('".$nomeDocumento."', '".$status."', ".$noPaginas.", ".$idUsuario.");";
	if ($conn->query($sql) === TRUE) 
		echo "\nArquivo \"".$nomeDocumento."\", cadastrado com sucesso.\n";
	 else 
		echo "Não foi possível cadastrar o arquivo: \"".$nomeDocumento."\".\nErro: " . $sql . "\n" . $conn->error;
	
}

//R - Read
function selectArquivo($nomeDocumento, $conn){
	$sql = "SELECT ID_Arquivo FROM Arquivo WHERE Nome = '".$nomeDocumento."';";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0){
		$row = $result->fetch_assoc(); 
		$idArquivo = $row["ID_Arquivo"];
		return (int) $idArquivo;
	}
	else 
		return 0;
}

/*======= TABELA USUÁRIO: ======*/

//C - Create 
function insertUsuario($nome, $conn){
	$sql = "INSERT INTO Usuario (Nome_Usuario) VALUES ('".$nome."');";
	
	if ($conn->query($sql) === TRUE) {
		echo "\nUsuário(a) \"".$nome."\", inserido(a) com sucesso.\n";
	} else 
		echo "Não foi possível cadastrar o(a) Usuário(a) \"".$nome."\". Erro: " . $sql . "\n" . $conn->error;
}

//R - Read
function selectUsuario($nomeUsuario, $conn){
	$sql = "SELECT ID_Usuario FROM Usuario WHERE Nome_Usuario = '".$nomeUsuario."';";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0){
		$row = $result->fetch_assoc(); 
		$idUsuario = $row["ID_Usuario"];
		return (int) $idUsuario;
	}
	else 
		return 0;
}


/*======= TABELA IMPRIME: ======*/

//C - Create 
function insertImprime($dataHora, $idArquivo, $idImpressora, $conn){
	$dataHora = formatDate($dataHora);
	$sql = "INSERT INTO imprime (DataHora, ID_Impressora, ID_Arquivo) VALUES ('".$dataHora."', ".$idImpressora.", ".$idArquivo.");";
	
	if ($conn->query($sql) === TRUE) {
		echo "\nImpressão registrada com sucesso em: ".$dataHora.".\n";
	} else 
		echo "Não foi possível inserir o cadastro de impressão do Arquivo de ID: ".$idArquivo." na Impressora de ID: ".$idImpressora.".\n Erro: " . $sql . "\n" . $conn->error;
}

//R - Read
function selectImprime($dataHora, $idArquivo, $idImpressora, $conn){
	$dataHora = formatDate($dataHora);
	
	$sql = "SELECT * FROM imprime WHERE ID_Impressora = ".$idImpressora." AND ID_Arquivo = ".$idArquivo." AND DataHora = '".$dataHora."';";
	$result = $conn->query($sql);
	
	if ($result->num_rows === 0)
		return TRUE;
	else 
		FALSE;
}


/*======= TABELA IMPRESSORA: ======*/

//C - Create 
function insertImpressora($modelo, $conn){
	$sql = "INSERT INTO Impressora  (modelo) VALUES ('".$modelo."');";
	
	if ($conn->query($sql) === TRUE) {
		echo "\nImpressora ".$modelo.", inserida com sucesso.\n";
	} else 
		echo "Não foi possível cadastrar a impressora \"".$modelo."\". Erro: " . $sql . "\n" . $conn->error;
}

//R - Read
function selectImpressora($model, $conn){
	$sql = "SELECT ID_Impressora FROM Impressora WHERE modelo = '".$model."';";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0){
		$row = $result->fetch_assoc(); 
		$idImpressora = $row["ID_Impressora"];
		return (int) $idImpressora;
	}
	else 
		return 0;
}

?>