<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>Home - Controle de Impressão</title>
	<link rel="stylesheet" href="_css/estilo.css">
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type="text/javascript">
		function ajaxCall(){
		$.ajax({ url: 'readJson.php',
	        success: function(e){
	        alert(e);
	    }
	    });
		}
	</script>
	
</head>
<body>
<div = id="interface">
	<header id="cabecalho">
	<nav id="menu1">
		<ul type="disc">
			<li><a href="home.php">
				<div class="exibir"><img src="_imagens/_icones/home.png">
				<span class="exibirtexto">Página Inicial</span>
				</div></a>
			</li>

			<li><a href="cadastro.html">
				<div class="exibir"><img src="_imagens/_icones/users.png">
				<span class="exibirtexto">Cadastro</span>
				</div></a>
			</li>

			<li><a href="relatorio.html">
				<div class="exibir"><img src="_imagens/_icones/relatorios_menor.png">
				<span class="exibirtexto">Relatorios</span>
				</div></a>
			</li>

			<li><a href="help.html">
				<div class="exibir"><img src="_imagens/_icones/help.png">
				<span class="exibirtexto">Ajuda</span>
				</div></a>
			</li>
			
			<li><div class="exibir"><img src="_imagens/_icones/json.png" onclick="ajaxCall()" >
				<span class="exibirtexto">Atualizar Base de Dados</span>
				</div>
			</li>
		</ul>
	</nav>
		
	<p id="top" ><img src="_imagens/_logos/logo-media.png"></p>
	</header>

<div id="left">
	<div id="imp-cadastradas">
		<p><h3>Usuários Catalogados</h3></p>
		<table id="tabelaspecuser">
			<caption>ID com seu respectivo usuário</caption>
			<?php include ('_php/_mysql/tableusers.php'); ?>
		</table>
	</div>

	<div id="imp-cadastradas">
		<p><h3>Impressoras Catalogadas</h3></p>
		<table id="tabelaspec">
			<caption>O número da impressora corresponde a seu ID</caption>
			<?php include ('_php/_mysql/tableImpressoras.php'); ?>
		</table>
	</div>

</div>

<div id="right">
	<div id="divgrafico">
		<p><h3>Graficos relacionais de impressões</h3></p>
		<img id="imggrafico" src="_php/_graficos/grafico.php" alt="Grafico de impressões dos usuários" title="Grafico de impressões dos usuários" />
		</br>
		<img id="imggrafico" src="_php/_graficos/graficoprint.php" alt="Grafico de impressões dos usuários" title="Grafico de impressões dos usuários" />
	</div>

	
</div>

<footer id="rodape">
<p>Copyright 2016 - by Survivor's <br/>
| <a href="http://www.unibratec.edu.br/faculdade" target="_blank">Unibratec</a> |</p>
</footer>
</div>
</body>
</html>

<!--
		<tr><td class="ce">1º Impressora</td> 
			<td class="cd">Descrição da 1º impressora</td></tr>

		<tr><td rowspan="2" class="ce">2º Impressora</td> 
			<td class="cd">Descrição da 2º impressora</td></tr>
			<tr><td class="cd">Descrição da 2º impressora</td></tr>
		
		<tr><td class="ce">3º Impressora</td> 
			<td class="cd">Descrição da 3º impressora</td></tr>
-->