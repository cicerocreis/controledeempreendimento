<?php include '../config.inc.php'; ?>

<?php

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

//Cria a conexão com o banco
$pdo = Conexao::conexao();
//Instancia a objeto da classe Usuario
$usuario = new Usuario;

//Classe Usuario
switch ($action) {
  //Cadastra Usuario
  case 'cadastrar':

    $cnome = filter_input(INPUT_POST, 'cnome', FILTER_SANITIZE_STRING);
    $cemail = filter_input(INPUT_POST, 'cemail', FILTER_SANITIZE_STRING);
    $csenha = filter_input(INPUT_POST, 'csenha', FILTER_SANITIZE_STRING);

    $entrada = array();

    //Verifica se todos os campos foram preenchidos
    if(!empty($cnome)) { array_push($entrada, $cnome); }
    if(!empty($cemail)) { array_push($entrada, $cemail); }
    if(!empty($csenha)) { array_push($entrada, $csenha); }

    if(!empty($entrada) && (count($entrada) == 3)) {
        if($usuario->cadastraUsuario($pdo,$cnome,$cemail,$csenha,$cidempreendimento)) {
          echo 'true';
        }
    }else {
      echo 'false';
    }
    break;

    //lista Usuario
    case 'listaUsuario':
      $dados = json_encode($usuario->listaUsuario($pdo));
      print_r($dados);
      break;

      //Pega id Usuario
      case 'pegaId':
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $dados = json_encode($usuario->pegaId($pdo, $id));
        echo $dados;
        break;

      //Edita Usuario
      case 'editar':
         $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
         $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
         $idempreendimento = $_POST['idempreendimento'];
         $idusuario = filter_input(INPUT_POST, 'idusuario', FILTER_SANITIZE_NUMBER_INT);
         if($usuario->atualizaUsuario($pdo, $nome, $email, $idusuario, $idempreendimento)):
             echo 'true';
           else :
             echo 'false';
           endif;
         break;

       //Exclui Usuario
       case 'excluir':
         $idusuario = filter_input(INPUT_POST, 'idusuario', FILTER_SANITIZE_NUMBER_INT);
         if($usuario->deletarUsuario($pdo, $idusuario)):
           echo 'true';
         else :
           echo 'false';
         endif;
         break;

         //Lista Empreendimentos
         case 'lista-empreendimentos':
            $empreendimentos = json_encode($usuario->listaEmpreendimentos($pdo));
            echo $empreendimentos;
           break;

        //Lista Empreendimentos usuários
        case 'lista-empreendimento-usuario':
          $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
          $dados = json_encode($usuario->listaEmpreendimentosUsuario($pdo, $id));
          echo $dados;
          break;

        default:
            echo 'false';
            break;
}
