<?php include '../class/Conexao.class.php'; ?>
<?php include '../class/Regionais.class.php'; ?>
<?php
sleep(1);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

//Cria a conexão com o banco
$pdo = Conexao::conexao();
//Instancia a objeto da classe Regionais
$obj = new Regionais;

//Classe Regionais
switch ($action) {
  //Lista Regionais
  case 'lista':
    $regional = json_encode($obj->listaRegionais($pdo));
    echo $regional;
    break;
  //Cadastra Regionais
  case 'cadastra':
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    if($obj->cadastraRegionais($pdo, $descricao)) :
        echo "Cadastrou";
    else :
       echo 'Erro ao cadastar';
    endif;
    break;
   //Pega id Regionaal
   case 'pegaId':
   $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
   $dados = json_encode($obj->pegaId($pdo, $id));
   echo $dados;
   break;
   //Edita Regional
   case 'editar':
    $idregional = filter_input(INPUT_POST, 'idregional', FILTER_SANITIZE_NUMBER_INT);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    if($obj->atualizaRegional($pdo, $idregional, $descricao)):
      echo 'atualizou';
    else :
      echo 'Erro ao atualizar';
    endif;
    //Exclui Regional
    case 'excluir':
      $idregional = filter_input(INPUT_POST, 'idregional', FILTER_SANITIZE_NUMBER_INT);
      if($obj->deletarRegional($pdo, $idregional)):
        echo 'Excluido';
      else :
        echo 'Erro ao excluir';
      endif;
      break;
    default:
    echo 'teste';
    break;
}
?>
