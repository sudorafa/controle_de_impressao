<!DOCTYPE html>
<html lang="pt">
<head>
	<title>Cadastros - Controle de Impressão</title>
	<link rel="stylesheet" type="text/css" href="_css/estilo.css">
	<meta charset="UTF-8">
</head>


<body>
<div = id="interface">
	<header id="cabecalho">
	
	<img id="top" src="_imagens/logo_print3.png">


	<nav id="menu1">
		<ul type="disc">
			<li><a href="home.html"><img src="_imagens/home.png"></a></li>
			<li><a href="cadastro.php"><img src="_imagens/users.png"></a></li>
			<li><a href="relatorio.html"><img src="_imagens/relatorios_menor.png"></a></li>
			<li><a href="help.html"><img src="_imagens/help.png"></a></li>
		</ul>
	</nav>


</header>

<p>Página de cadastro em desenvolvimento</p>


<h1>Cadastro de Usuários:</h1>
<form action="createUser.php" method="POST">
	<label>Nome:</label>
	<input type="text" name="username" id="username"><br/>
	<label>Setor:</label>
	<input type="text" name="usersetcor" id="usersector"><br/>
	<input type="submit" name="btnsubmit" id="btnsubmit" value="Cadastrar">
	<input type="reset" name="btnclear" id="btnclear" value="Limpar">
</form>

<h1>Cadastro de Impressoras:</h1>
<form action="createPrinter.php" method="POST">
	<label>Modelo:</label>
	<input type="text" name="printermodel" id="printermodel"><br/>
	<label>IP:</label>
	<input type="text" name="printerip" id="printerip"><br/>
	<label>Setor:</label>
	<input type="text" name="printersector" id="printersector"><br/>
	<input type="submit" name="btnsubmit" id="btnsubmit" value="Cadastrar">
	<input type="reset" name="btnclear" id="btnclear" value="Limpar">
</form>
<footer id="rodape">
<p>Copyright 2016 - by Survivor's <br/>
| Unibratec |</p>
</footer>
</div>
</body>
</html>


