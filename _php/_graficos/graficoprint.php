<?php 
//Dados do banco

include "../_mysql/conecta_mysql.php";

//Consulta do Modelo
$query = 'select i.id_impressora, SUM( a.paginas ) AS soma FROM imprime i ';
$query .= 'INNER JOIN arquivo a ON i.id_arquivo = a.id_arquivo ';
$query .= 'WHERE a.status =  "impresso" or a.status = "printed" GROUP BY i.id_impressora;';
$res = mysql_query($query) or die(msql_error($conexao));

$qtd = 0;
while($registro = mysql_fetch_assoc($res)) {
	$vetor_id[$qtd] = $registro['id_impressora'];
	$vetor_paginas[$qtd] = $registro['soma'];
	$qtd++;
}


//Instanciando o Framework PHPlot
include "../_phplot/phplot.php" ;
$graph = new PHPlot(550,350); 
$graph->SetFileFormat("GIF");
$graph->SetTitle("Impressoras X Paginas impressas");
$graph->SetXTitle('Impressoras');
$graph->SetYTitle('Qtd de paginas impressas');
//$graph->SetLegend('teste'); // gera as legendas do grafico

//Alimentando grafico com dados do banco
$example_data = array(array($vetor_id[0],$vetor_paginas[0]));
for ($i=1; $i <$qtd ; $i++) { 
        array_push($example_data, array($vetor_id[$i],$vetor_paginas[$i]));// Errei por um ; aff
}

$graph->SetPlotType("bars");
$graph->SetDataValues($example_data);
$graph->DrawGraph();

/*
SELECT i.id_impressora, SUM( a.paginas ) AS soma
FROM imprime i
INNER JOIN arquivo a ON i.id_arquivo = a.id_arquivo
WHERE a.status =  'impresso'
GROUP BY i.id_impressora
*/
 ?>

