<?php 
require_once ("_util/databaseComands.php");

function scanSystem($url){
	// request list of contacts from the Web API 
	$json = file_get_contents($url);
	// deserialize data from JSON 
	return json_decode($json);	
}

$printers = scanSystem("http://localhost:57060/");

foreach($printers as $printer){
	  if(count($printer->jobsList) > 0){
		  
		//var_dump($printer);
		//echo "</br></br>";  
		$conn = connect();
		if ($conn != NULL)
				echo "\nSistema em escaneamento...\n";
			
		for ($i=0; $i < count($printer->jobsList); $i++){
			
			$idUsuario = selectUsuario($printer->jobsList[$i]->owner, $conn);
			$idImpressora = selectImpressora($printer->model, $conn);
			$idArquivo = selectArquivo($printer->jobsList[$i]->documentName, $conn);
			
			/*
			echo "</br></br>";  
			echo "Id usuário: </br>"; 
			var_dump($idUsuario); echo "</br></br>";  
			echo "Id Impressora: </br>"; 
			var_dump($idImpressora); echo "</br></br>";  
			echo "Id Arquivo: </br>"; 
			var_dump($idArquivo); echo "</br></br>";
			*/	
			
			if ($idImpressora === 0){
				insertImpressora($printer->model, $conn);
				$idImpressora = selectImpressora($printer->model, $conn);
			}
			
			if ($idUsuario === 0){
				insertUsuario($printer->jobsList[$i]->owner, $conn);
				$idUsuario = selectUsuario($printer->jobsList[$i]->owner, $conn);
			}
			
			if ($idArquivo === 0 && $idUsuario != 0){
				$nomeDocumento = $printer->jobsList[$i]->documentName;
				$status = $printer->jobsList[$i]->status;
				$noPaginas = $printer->jobsList[$i]->pages;
				insertArquivo($nomeDocumento, $status, $noPaginas, $idUsuario, $conn);
				$idArquivo = selectArquivo($printer->jobsList[$i]->documentName, $conn);
			}
			
			$dataHora = $printer->jobsList[$i]->submitted;
			
			/*
			echo "Data de impressão: </br>"; 
			$dataHora = substr($dataHora, 6, 10);
			$dataHora = date("d/m/Y H:i:s",$dataHora);   // 18/06/2016 06:10:26
			var_dump($dataHora); echo "</br></br>";  
			*/
			
			if (selectImprime($dataHora, $idArquivo, $idImpressora, $conn))
				insertImprime($dataHora, $idArquivo, $idImpressora, $conn);
		}
		
		if (disconnect($conn))
				echo "\n\n...Sistema escaneado com sucesso.\n";
	}
}

?>