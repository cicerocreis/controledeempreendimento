<!doctype html>
<html lang="pt-br">
<head>
	<meta name="author" content="Cícero Reis">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Usuários</title>
  <base href="http://localhost/_projeto/Controle%20de%20Empreendimentos/">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>

	<div id="main">

		<nav id="body-usuarios">
			<ul id="nav-principal">
				<li id="nav-regionais"><a href="regionais">Regionais</a></li>
				<li id="nav-empreendimentos"><a href="empreendimento">Empreendimentos</a></li>
				<li id="nav-usuarios"><a href="usuarios">Usuários</a></li>
				<li id="nav-sair"><a href="saida">Sair</a></li>
			</ul>
		</nav>

		<section class="lista-empreendimentos">

  	<header>
      <h3 id="titulo-lista">Lista de Usuários</h3>
    </header>

		<div class="lista">
			<p><button id="btn">Novo</button></p>
				<table id="tbUsuario"></table>
		</div>

		<div id="formulario-empreendimentos">
			<form action="" name="formulario" method="post" style="display:none">
				<ol id="form-empree">
					<li class="input-empree">
						<label for="nome">Nome:</label>
						<input id="nome" name="nome" class="text" type="text" required>
					</li>
					<li class="input-empree">
						<label for="email">E-mail:</label>
						<input id="email" name="email" class="text" type="text" required>
					</li>
					<li class="input-empree">
						<label for="senha">Senha:</label>
						<input id="senha" name="senha" class="senha" type="password" required>
					</li>
				</ol>
				<input type="submit" value="Gravar" id="btnGravar">
			</form>
		</div>

		</section>

	</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	<script src="js/usuario.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
