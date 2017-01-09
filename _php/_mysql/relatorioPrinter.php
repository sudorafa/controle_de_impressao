<link rel="stylesheet" href="../../_css/estilo_php.css">
<script>
	function imprimir() {
    window.print();
}
</script>

<?php
include "conecta_mysql.php";
$id_impressora	= $_POST["ID_Impressora"];
$qtd = -1;
if (empty($id_impressora)) {
		echo "<h2>Informe um ID para pesquisa!</h2>";
		echo "<a href='../../_iframes/formrelatorio.html#impressora'><img id='refresh' src='../../_imagens/_botoes/refresh1.png'></a>";

}else{
		//Consultas no Banco//
		//Verificar o que está marcado e gerar o código SQL
		$query = 'select ';
		if(!empty($_POST['check_list'])) {
		    foreach($_POST['check_list'] as $check) {
		        $query = $query ."$check".", "; 
		        $qtd++;
		    }
			$query = substr_replace($query, '', -2, -1);
			$query .= 'from impressora p ';
			$query .= 'inner join imprime i ';
			$query .= 'on p.id_impressora = i.id_impressora ';
			$query .= 'inner join arquivo a ';
			$query .= 'on i.id_arquivo = a.id_arquivo ';
			$query .= 'inner join usuario u ';
			$query .= 'on a.id_usuario = u.id_usuario ';
			$query .= 'WHERE p.id_impressora = '.$id_impressora;
			$query .= ' group by a.id_arquivo ';
			$res1 = mysql_query($query) or die(msql_error($conexao));
			//echo "$query";
		}
		
		
		//Pegar quantidade de páginas impressas pela impressora
		//(Verifica apenas o Status 'Impresso')
		if (!empty($_POST['totalpimpressas'])) {
		$query  = 'select sum(a.paginas) AS Total_Paginas ';
		$query .= 'from arquivo a ';
		$query .= 'INNER JOIN imprime i ON a.id_arquivo = i.id_arquivo ';
		$query .= 'where i.id_impressora = '.$id_impressora.' ';
		$query .= 'and STATUS = "impresso"';
		$res2 = mysql_query($query) or die(msql_error($conexao));
		$soma = mysql_fetch_row($res2);
		}

		//Encerrando conexão
		mysql_close($conexao);


		//Cabeçalho do Relatorio
		echo "<div id = 'cabecalho'>";
		echo "<h1>Relatorio de Impressões</h1>";
		echo "<h3>ID_Impressora: ".$id_impressora."</h3>";
		echo "<img id='logoRelatorio' src='../../_imagens/_logos/logo-pequena.png' onclick='imprimir()' style='cursor:pointer;cursor:hand'>";
		if (!empty($_POST['totalpimpressas'])) {
			echo '<p id="qtdImp2">Total de Páginas Impressas: '.$soma[0].'</p>';
		}
		echo "</div>";
		//Montar tabela com o resultado da consulta
		echo '<table id="relatorioUser">';
		//echo '<caption><span>Nível de Usuário</span></caption>';
	    echo '<tr id="topo">';
	    for ($i = 0; $i<=$qtd ; $i++) { 
	    	echo '<td>'.mysql_field_name($res1, $i).'</td>';
	    	$vetor[] = mysql_field_name($res1, $i);
	    }echo '</tr>';
	    	    
	    while($registro = mysql_fetch_assoc($res1)) {
			echo '<tr>';
			for ($c=0; $c<=$qtd ; $c++) { 
				echo '<td>'.$registro["$vetor[$c]"].'</td>';		
			}echo '</tr>';
		}
		



	}







?>