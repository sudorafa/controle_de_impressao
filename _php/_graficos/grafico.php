<?php
//Dados do banco

include "../_mysql/conecta_mysql.php";


$query = 'select u.nome_usuario, sum(a.paginas) as soma from usuario u ';
$query .= 'inner join arquivo a on a.id_usuario = u.id_usuario ';
$query .= 'where a.status="impresso" or a.status = "printed" group by a.id_usuario';
$res = mysql_query($query) or die(msql_error($conexao));

$qtd = 0;
while($registro = mysql_fetch_assoc($res)) {
	$vetor_nome[$qtd] = $registro['nome_usuario'];
	$vetor_paginas[$qtd] = $registro['soma'];
	$qtd++;
}








/*
//Consulta do Nome
$query = 'select nome_usuario FROM usuario order by id_usuario';
$res = mysql_query($query) or die(msql_error($conexao));

$qtd = 0;
while($registro = mysql_fetch_assoc($res)) {
	$vetor_nome[$qtd] = $registro['nome_usuario'];
	$qtd++;
}

//Consulta da soma das páginas impressas
$query = "select sum(paginas) as soma from arquivo where status='impresso' group by id_usuario";
$res = mysql_query($query) or die(msql_error($conexao));

$qtd2 = 0;
while ($registro = mysql_fetch_assoc($res)) {
        $vetor_paginas[$qtd2] = $registro['soma'];
        $qtd2++;
}
*/

//Instanciando o Framework PHPlot
include "../_phplot/phplot.php" ;
$graph = new PHPlot(550,350); 
$graph->SetFileFormat("GIF");
$graph->SetTitle("Usuarios X Qtd de Paginas");
//$graph->SetTitle("Grafico de impressoes\n\rUsuarios X Qtd de Paginas");
$graph->SetXTitle('Usuarios');
$graph->SetYTitle('Qtd de paginas impressas');
//$graph->SetLegend('teste'); // gera as legendas do grafico

//Alimentando grafico com dados do banco
$example_data = array(array($vetor_nome[0],$vetor_paginas[0]));
for ($i=1; $i <$qtd ; $i++) { 
        array_push($example_data, array($vetor_nome[$i],$vetor_paginas[$i]));// Errei por um ; aff
}

$graph->SetPlotType("bars");
$graph->SetDataValues($example_data);
$graph->DrawGraph();

?>
