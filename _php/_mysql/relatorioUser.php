<link rel="stylesheet" href="../../_css/estilo_php.css">

<script>
	function imprimir() {
    window.print();
}
</script>


<?php
include "conecta_mysql.php";
$id_usuario	= $_POST["id_usuario"];
$qtd = -1;
if (empty($id_usuario)) {
		echo "<h2>Informe um ID para pesquisa!</h2>";
		echo "<a href='../../_iframes/formrelatorio.html#usuario'><img id='refresh' src='../../_imagens/_botoes/refresh1.png'></a>";

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
			$query .= 'from arquivo a inner join imprime i ';
			$query .= 'on a.ID_Arquivo = i.ID_Arquivo ';
			$query .= 'WHERE a.ID_Usuario = '.$id_usuario;
			$res1 = mysql_query($query) or die(msql_error($conexao));
			//echo "$query";
		}
		
		//Pegar nome do Usuário
		$query =  'select Nome_Usuario from Usuario WHERE ';
		$query .= 'ID_Usuario = '.$id_usuario;
		$result2 = mysql_query($query) or die(msql_error($conexao));
		$nome = mysql_fetch_row($result2);

		//Pegar Total de impressões realizadas (Verifica apenas o Status 'Impresso')
		if (!empty($_POST['totalimpressoes'])) {
			$query =  'select COUNT(*) status FROM arquivo ';
			$query .= 'where ID_Usuario = '.$id_usuario.' ';
			$query .= 'and STATUS = "impresso"';
			$result3 = mysql_query($query) or die(msql_error($conexao));
			$res3 = mysql_fetch_row($result3);
		}
		//Pegar quantidade de páginas impressas de acordo com o usuário
		if (!empty($_POST['totalpimpressas'])) {
			$query  = 'select sum(paginas) AS soma ';
			$query .= 'from arquivo where ID_Usuario = '.$id_usuario.' ';
			$query .= 'and STATUS = "impresso"';
			$result4 = mysql_query($query) or die(msql_error($conexao));
			$res4 = mysql_fetch_row($result4);
		}

		//Encerrando conexão
		mysql_close($conexao);


		//Cabeçalho do Relatorio
		echo "<div id = 'cabecalho'>";
		echo "<h1>Relatorio de Impressões</h1>";
		echo "<h3>Usuário: ".$nome[0]."</h3>";
		echo "<img id='logoRelatorio' src='../../_imagens/_logos/logo-pequena.png' onclick='imprimir()' style='cursor:pointer;cursor:hand'>";
		if (!empty($_POST['totalimpressoes'])) {
			echo '<p id="qtdImp1">Total de Impressões: '.$res3[0].'</p>';
		}
		if (!empty($_POST['totalpimpressas'])) {
			echo '<p id="qtdImp2">Total de Páginas Impressas: '.$res4[0].'</p>';
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

/*
//Pegar quantidade de páginas impressas de acordo com o usuário
if (!empty($_POST['totalpimpressas'])) {
$query  = 'select sum(a.paginas * i.copias) AS Total_Paginas ';
$query .= 'from arquivo a ';
$query .= 'INNER JOIN imprime i ON a.id_arquivo = i.id_arquivo ';
$query .= 'where a.ID_Usuario = '.$id_usuario.' ';
$query .= 'and STATUS = "impresso"';
$result4 = mysql_query($query) or die(msql_error($conexao));
$res4 = mysql_fetch_row($result4);
}*/

/*
while($fetch = mysql_fetch_row($result)){
echo "<p>". $fetch[0] . " - " . $fetch[1] . " - " . "</p>";
}

//Configurar o php.ini para não exibir as mensagens de notificação:
//error_reporting  =  E_ALL
//Configurar o php.ini para não exibir as mensagens de notificação:
//error_reporting  =  E_ALL & ~E_NOTICE

/*

*/

?>

