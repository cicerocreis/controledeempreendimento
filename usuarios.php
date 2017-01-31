<!doctype html>
<html lang="pt-br">
<head>
	<meta name="author" content="Cicero Reis">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<base href="http://localhost/git/controledeempreendimento/">
	<title>Usuário</title>
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

		<section class="lista-principal">

	  	<header>
	      <h3 id="titulo-lista">Lista de Usuários</h3>
				<p id="mensagem"></p>
	    </header>

			<div class="lista">
				<p><button id="btnNovo">Novo</button></p>
				<p id="mensagem-registro"></p>
				<table id="tbUsuario"></table>
			</div>

			<!--formulario Cadastra Usuario-->
			<div id="form-cadastrar">
				<form action="" name="formularioCadastrar" method="post">
					<ul id="form-empree">
						<li class="input-empree">
							<label for="nome">Nome:</label>
							<input name="cnome" id="cnome" class="text" type="text" value="">
						</li>
						<li class="input-empree">
							<label for="cemail">E-mail:</label>
							<input name="cemail" id="cemail" class="text" type="text" value="">
						</li>
						<li class="input-empree">
							<label for="senha">Senha:</label>
							<input name="csenha" id="csenha" class="text" type="password" value="">
						</li>
						<!--<li>
							<div class="scroll"></div>
						</li>-->
						<li>
              <input type="hidden" id="cidusuario" name="cidusuario" id="idusuario" value="">
            </li>
					</ul>

					<input type="submit" id="btnGravar" name="gravar" value="Gravar">

					<p id="voltar"><a href="usuarios.php">voltar</a></p>
				</form>
			</div>

			<!--formulario Atualiza Usuario-->
			<div id="form-atualizar">
				<form action="" name="formularioAtualizar" method="post">
					<ul id="form-empree">
						<li class="input-empree">
							<label for="nome">Nome:</label>
							<input id="nome" name="nome" class="text" type="text" value="">
						</li>
						<li class="input-empree">
							<label for="email">E-mail:</label>
							<input id="email" name="email" class="text" type="text" value="">
						</li>
						<li class="input-empree" id="senha">
							<label for="senha">Senha:</label>
							<input id="senha" name="senha" class="senha" type="password" value="">
						</li>
						<!--<li>
							<div class="scroll"></div>
						</li>-->
						<li>
              <input type="hidden" name="idusuario" id="idusuario" value="">
            </li>
					</ul>

					<input type="submit" id="btnAtualizar" value="Atualizar">

					<p id="voltar"><a href="usuarios.php">voltar</a></p>
				</form>
			</div>

		</section>

	</div>

  <script src="lib/jquery-3.1.1.min.js"></script>
	<script src="js/usuario.js"></script>
</body>
</html>
