<?php
// Dados do banco

$dbhost   = "pc-03";   #Nome do host
$db       = "controleImpressao";   #Nome do banco de dados
$user     = "aluno"; #Nome do usuário
$password = "aluno";   #Senha do usuário

$dbc = mssql_connect($dbhost,$user,$password) or die("Não foi possível a conexão com o servidor!");
 /*
@mssql_connect($dbhost,$user,$password) or die("Não foi possível a conexão com o servidor!");

@mssql_select_db("$db") or die("Não foi possível selecionar o banco de dados!");
 */

?>