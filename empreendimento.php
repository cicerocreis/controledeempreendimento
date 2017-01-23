<!doctype html>
<html lang="pt-br">
<head>
	<meta name="author" content="Cicero Reis">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Empreendimento</title>
	<base href="http://localhost/_projeto/Controle%20de%20Empreendimentos/">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<div id="main">

		<nav id="body-empreendimentos">
			<ul id="nav-principal">
				<li id="nav-regionais"><a href="regionais">Regionais</a></li>
				<li id="nav-empreendimentos"><a href="empreendimento">Empreendimentos</a></li>
				<li id="nav-usuarios"><a href="usuarios">Usuários</a></li>
				<li id="nav-sair"><a href="saida">Sair</a></li>
			</ul>
		</nav>

		<section class="lista-empreendimentos">
			<header>
			  <h3 id="titulo-lista">Lista de Empreendimentos</h3>
			</header>
			<div class="lista">
				<p><button id="btn">Novo</button></p>
					<table id="tbEmpreendimento"></table>
			</div>

				<div id="formulario-empreendimentos">
				<form action="" name="formulario" method="post" style="display:none">
					<ol id="form-empree">
						<li class="input-empree">
							<label for="regionais">Regional</label>
								<select name="regionais" id="regionais">

								</select>
						</li>
						<li class="input-empree">
							<label for="empreendimento">Empreendimento:</label>
							<input id="empreendimento" name="empreendimento" id="empreendimento" class="text" type="text" required>
						</li>
						<li class="input-empree">
							<label for="endereco">Endereço:</label>
							<input id="endereco" name="endereco" id="endereco" class="text" type="text" required>
						</li>
						<li class="input-empree">
							<label for="cidade">Cidade/Uf:</label>
							<input id="cidade" name="cidade" id="cidade" class="text" type="text" required>
							<input id="uf" name="uf" id="uf" class="text" type="text" size="5" required>
						</li>
					</ol>
					<input type="submit" value="Gravar" id="btnGravar">
				</form>
			</div>
		</section>

	</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/empreendimentos.js"></script>
</body>
</html>
