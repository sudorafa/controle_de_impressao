<?php

include "conecta_mysql.php";


//1º Opção
$query = "select nome_usuario from usuario order by id_usuario;" ;
$res = mysql_query($query) or die(mysql_error($conexao));
$qtd = mysql_num_rows($res);


$i = 1;
while($campo=mysql_fetch_array($res, MYSQL_ASSOC)) {
	echo "<tr><td class='ce'>User ID: ".$i."</td> ";	
	echo "<td class='cd'>".$campo["nome_usuario"]."</td></tr>";
	$i++;
}


?>