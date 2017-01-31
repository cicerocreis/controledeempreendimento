<!doctype html>
<html lang="pt-br">
<head>
	<meta name="author" content="Cicero Reis">
	<meta name="description" content="Controle de Empreendimentos">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<base href="http://localhost/git/controledeempreendimento/">
	<title>Empreendimentos</title>
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

		<section class="lista-principal">
			<header>
			  <h3 id="titulo-lista">Lista de Empreendimentos</h3>
					<p id="mensagem"></p>
			</header>
			<div class="lista">
				<p><button id="btnNovo">Novo</button></p>
				<p id="mensagem-registro"></p>
				<table id="tbEmpreendimento"></table>
			</div>

				<!--Formulário Cadastra Empreendimento-->
				<div id="form-cadastrar">
					<form action="" name="formularioCadastrar" method="post">
						<ul id="form-empree">
							<li class="input-empree">
								<label for="cregionais">Regional</label>
									<select name="cregionais" class="regionais"></select>
							</li>
							<li class="input-empree">
								<label for="cempreendimento">Empreendimento:</label>
								<input id="cempreendimento" name="cempreendimento" class="text" type="text">
							</li>
							<li class="input-empree">
								<label for="cendereco">Endereço:</label>
								<input id="cendereco" name="cendereco" class="text" type="text">
							</li>
							<li class="input-empree">
								<label for="ccidade">Cidade/Uf:</label>
								<input id="ccidade" name="ccidade" class="text" type="text">
								<input id="cuf" name="cuf" class="text" type="text" size="5">
							</li>
						</ul>
						<input type="submit" id="btnGravar" value="Gravar">
					</form>
					<p id="voltar"><a href="empreendimento.php">voltar</a></p>
				</div>

				<!--Formulário Atualiza Empreendimento-->
				<div id="form-atualizar">
					<form action="" name="formularioAtualizar" method="post">
						<ul id="form-empree">
							<li class="input-empree">
								<label for="regionais">Regional</label>
									<select name="regionais" class="regionais"></select>
							</li>
							<li class="input-empree">
								<label for="empreendimento">Empreendimento:</label>
								<input id="empreendimento" name="empreendimento" class="text" type="text">
							</li>
							<li class="input-empree">
								<label for="endereco">Endereço:</label>
								<input id="endereco" name="endereco" class="text" type="text">
							</li>
							<li class="input-empree">
								<label for="cidade">Cidade/Uf:</label>
								<input id="cidade" name="cidade" class="text" type="text">
								<input id="uf" name="uf" class="text" type="text" size="5">
							</li>
							<li>
	              <input type="hidden" name="idempreendimento" id="idempreendimento" value="">
	            </li>
						</ul>
						<input type="submit" id="btnAtualizar" value="Atualizar">
					</form>
						<p id="voltar"><a href="empreendimento.php">voltar</a></p>
				</div>
			</div>
		</section>

	</div>

  <script src="lib/jquery-3.1.1.min.js"></script>
	<script src="js/empreendimentos.js"></script>
</body>
</html>
