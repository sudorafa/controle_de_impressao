<?php 

include "conecta_mysql.php";


//1º Opção
$query = "select id_impressora, modelo from impressora;" ;
$res = mysql_query($query) or die(mysql_error($conexao));
$qtd = mysql_num_rows($res);


$i = 1;
while($campo=mysql_fetch_array($res, MYSQL_ASSOC)) {
echo "<tr><td class='ce'>".$i."º Impressora</td> ";	
echo "<td class='cd'>Modelo: ".$campo["modelo"]."</td></tr>";
$i++;
}



//2º Opção

/*
$query = "select modelo from impressora;" ;
$res = mysql_query($query) or die(mysql_error($conexao));
$descricao = mysql_fetch_row($res);
$qtd = mysql_num_rows($res);

for ($i=0; $i < $qtd; $i++) { 
	
}

$y = 1;
for ($i=0; $i<$qtd; $i++) { 
echo "<tr><td class='ce'>".$y."º Impressora</td> ";	
echo "<td class='cd'>Modelo: ".$descricao[$i]."</td></tr>";
$y++;
}*/

?>