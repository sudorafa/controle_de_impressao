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

include "conecta_pgsql.php";

$exec = pg_exec($dbconn, $instrucaoSQL) or die("Impossível executar insert");

pg_close($dbconn);


echo "<script>
alert('Valeu');

document.forms[0].reset();
</script>";

header( "Refresh:2; url=localhost:8080/help.html", true, 303);

?>

