<?php

	require_once('conect.php');

	$sql = "select Nome_Usuario from usuario";
	$dados = mysql_query($sql);
	$fetch = mysql_fetch_row($dados);
	//var_dump($fetch);
	echo $fetch[0];
	
?>