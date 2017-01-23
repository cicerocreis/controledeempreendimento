<?php include '../class/Conexao.class.php'; ?>
<?php include '../class/Usuario.class.php'; ?>
<?php include '../class/EmpreendimentoUsuario.class.php'; ?>
<?php
sleep(1);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

//Cria a conexão com o banco
$pdo = Conexao::conexao();
//Instancia a objeto da classe Usuario
$usuario = new Usuario;
//Instancia a objeto da classe EmpreendimentoUsuario
$emprUsario = new EmpreendimentoUsuario;

//Classe Usuario
switch ($action) {
  //Cadastra Usuario
  case 'cadastra':
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    if($usuario->cadastraUsuario($pdo,$nome,$email,$senha)) :
      echo 'Cadastrado';
    else :
      echo 'Erro em cadastrar Usuário';
    endif;
    break;
    //lista classe Empreendimento Usuario
    case 'listaUsuario':
      $dados = json_encode($emprUsario->listaUsuario($pdo));
      echo $dados;
      break;


  default:
    echo 'teste';
    break;
}
