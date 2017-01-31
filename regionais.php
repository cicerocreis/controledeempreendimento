<!doctype html>
<html lang="pt-br">
<head>
	<meta name="author" content="Cicero Reis">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<base href="http://localhost/git/controledeempreendimento/">
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

		<section class="lista-principal">

			<header>
			  <h3 id="titulo-lista">Lista de Regionais</h3>
				<p id="mensagem"></p>
			</header>

			<div class="lista">
				<button type="button" id="btnNovo">Novo</button>

				<p id="mensagem-registro"></p>

				<label for="tbRegional"></label>
				<table id="tbRegional"></table>

			</div>

			<!--formulario Cadastra Regional-->
			<div id="form-cadastrar">
        <form action="" name="formularioCadastrar" method="post">
          <ul id="form-empree">
            <li class="input-empree">
              <label for="empreendimento">Regional:</label>
              <textarea rows="5" cols="30" name="descricao" id="descricao" value="" placeholder="Descrição da regional..."></textarea>
            </li>
            <li>
              <input type="hidden" name="idregional" id="idregionalx" value="">
            </li>
          </ul>
					<input type="submit" id="btnGravar" value="Gravar">

					<p id="voltar"><a href="regionais.php">voltar</a></p>

        </form>
      </div>

			<!--formulario Atualiza Regional-->
			<div id="form-atualizar">
        <form action="" name="formularioAtualizar" method="post">
          <ul id="form-empree">
            <li class="input-empree">
              <label for="empreendimento">Regional:</label>
              <textarea rows="5" cols="30" name="descricao" id="descricao" value="" placeholder="Descrição da regional..."></textarea>
            </li>
            <li>
              <input type="hidden" name="idregional" id="idregionalx" value="">
            </li>
          </ul>
					<input type="submit" id="btnAtualizar" value="Atualizar">

					<p id="voltar"><a href="regionais.php">voltar</a></p>

        </form>
      </div>
		</section>
	</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/regionais.js"></script>
</body>
</html>
