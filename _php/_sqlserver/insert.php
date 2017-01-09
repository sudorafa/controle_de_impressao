<?php

$nome			= $_POST["nnome"];
$matricula		= $_POST["nmat"];
$setor			= $_POST["nsetor"];
$email			= $_POST["nemail"];
$sexo			= $_POST["nsex"];
$grauUrgencia	= $_POST["ngrau"];
$mensagem		= $_POST["mensagem"];


$instrucaoSQL = "insert into cadastro (nome, matricula, setor, email, sexo, grauUrgencia, mensagem)";
$instrucaoSQL .= "values ('$nome' , '$matricula', '$setor' , '$email', '$sexo', '$grauUrgencia' , '$mensagem')";

include "conecta_sqlserver.php";

$result = msql_query($instrucaoSQL,$dbc)or die('Erro ao executar o Query');
msql_close($dbc);

/*

//Dados da tabela
$tabela = "cadastro";  #Nome do campo da tabela
$cadastro1 = "nome";  
$cadastro2 = "matricula"; 
$cadastro2 = "setor";  
$cadastro4 = "email";
$cadastro5 = "sexo";  #Nome do campo da tabela
$cadastro6 = "grauUrgencia";
$cadastro7 = "mensagem";

//$cadastro1, $cadastro2, $cadastro3 ,$cadastro4, $cadastro5, $cadastro6, $cadastro7
*/

?>

