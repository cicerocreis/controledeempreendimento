<?php include '../config.inc.php'; ?>

<?php
sleep(1);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

//Cria a conexão com o banco
$pdo = Conexao::conexao();
//Instancia a objeto da classe Regionais
$objRegional = new Regionais;

//Classe Regionais
switch ($action) {

  //Lista Regionais
  case 'lista':
    $regional = json_encode($objRegional->listaRegionais($pdo));
    echo $regional;
    break;

  //Cadastra Regionais
  case 'cadastra':
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    if(!empty($descricao)) {
      if($objRegional->cadastraRegionais($pdo, $descricao)) {
          echo 'true';
      }
    }else {
      echo 'false';
    }
    break;

   //Pega id Regionaal
   case 'pegaId':
   $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
   $dados = json_encode($objRegional->pegaId($pdo, $id));
   echo $dados;
   break;

   //Edita Regional
   case 'editar':
    $idregional = filter_input(INPUT_POST, 'idregional', FILTER_SANITIZE_NUMBER_INT);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    if($objRegional->atualizaRegional($pdo, $idregional, $descricao)) :
      echo 'true';
    else :
      echo 'false';
    endif;
    break;

    //Exclui Regional
    case 'excluir':
      $idregional = filter_input(INPUT_POST, 'idregional', FILTER_SANITIZE_NUMBER_INT);
      if($objRegional->deletarRegional($pdo, $idregional)):
        echo 'true';
      else :
        echo 'false';
      endif;
      break;

    default:
    echo 'false';
    break;
}
?>
