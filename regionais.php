<!doctype html>
<html lang="pt-br">
<head>
	<meta name="author" content="Cicero Reis">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<base href="http://localhost/_projeto/Controle%20de%20Empreendimentos/">
	<title>Regionais</title>
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<div id="main">

		<nav id="body-regionais">
			<ul id="nav-principal">
				<li id="nav-regionais"><a href="regionais">Regionais</a></li>
				<li id="nav-empreendimentos"><a href="empreendimento">Empreendimentos</a></li>
				<li id="nav-usuarios"><a href="usuarios">Usuários</a></li>
				<li id="nav-sair"><a href="saida">Sair</a></li>
			</ul>
		</nav>

		<section class="lista-empreendimentos">

			<header>
			  <h3 id="titulo-lista">Lista de Regionais</h3>
			</header>

			<div class="lista">
				<p><button id="btn">Novo</button></p>
				<p>
					<label for="DLState"></label>
					<table id="tbRegional"></table>
				</p>
			</div>

			<div id="formulario-empreendimentos">
				<form action="" name="formulario" method="post" style="display:none">
					<ol id="form-empree">
						<li class="input-empree">
							<label for="empreendimento">Regional:</label>
							<textarea rows="5" cols="30" name="descricao" id="descricao" value="" placeholder="Descrição da regional..."></textarea>
						</li>
						<li>
							<input type="hidden" name="idregional" id="idregionalx" value="">
						</li>
					</ol>
					<button type="submit" id="btnGravar">Gravar</button>
				</form>
			</div>

		</section>

	</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/regionais.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
