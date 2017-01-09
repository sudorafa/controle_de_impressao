<?php  
include "conecta_mysql.php";

/*$nome			= $_POST["nnome"];*/
$Id_Usuario		= $_POST["Id_Usuario"];
/*$setor			= $_POST["nsetor"];*/
/*$email			= $_POST["nemail"];*/
/*$sexo			= $_POST["nsex"];*/
$grauUrgencia	= $_POST["ngrau"];
$descricao		= $_POST["descricao"];

$sql  = "insert into chamado (Id_Usuario, grauUrgencia, descricao) ";
$sql .= "values ($Id_Usuario , $grauUrgencia , '$descricao');";

$resultado = mysql_query($sql);

echo "<h2 id='chamado'>Mensagem enviada!</h2>";
echo "<a href='../../_iframes/formchamado.html#formChamado'><img id='refresh1' src='../../_imagens/_botoes/refresh1.png'></a>";


mysql_close($conexao);

?>