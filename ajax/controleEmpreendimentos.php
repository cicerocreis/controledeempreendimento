<?php include '../class/Conexao.class.php'; ?>
<?php include '../class/Empreendimento.class.php'; ?>
<?php
sleep(1);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

//Cria a conexão com o banco
$pdo = Conexao::conexao();
//Instancia a objeto da classe Empreendimento
$objEmp = new Empreendimento;

//Classe Empreendimento
switch ($action) {
  //Cadastra Empreendimento
  case 'cadastra':
    $nome = filter_input(INPUT_POST, 'cempreendimento', FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, 'cendereco', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'ccidade', FILTER_SANITIZE_STRING);
    $uf = filter_input(INPUT_POST, 'cuf', FILTER_SANITIZE_STRING);
    $idregional = filter_input(INPUT_POST, 'cregionais', FILTER_SANITIZE_NUMBER_INT);
    $entrada = array();

    //Verifica se todos os campos foram preenchidos
    if(!empty($nome)) { array_push($entrada, $nome); }
    if(!empty($endereco)) { array_push($entrada, $endereco); }
    if(!empty($cidade)) { array_push($entrada, $cidade); }
    if(!empty($uf)) { array_push($entrada, $uf); }
    if(!empty($idregional)) { array_push($entrada, $idregional); }

    if(!empty($entrada) && (count($entrada) == 5)) {
      if($objEmp->cadastraEmpreendimentos($pdo,$nome,$endereco,$cidade,$uf,$idregional)) {
        echo 'true';
      }
    }else {
      echo 'false';
    }
    break;

  //Lista Regionais
  case 'lista':
    $regional = json_encode($objEmp->listaRegionais($pdo));
      echo $regional;
    break;

  //Lista Empreendimentos
  case 'listaEmpreendimentos':
    $empreendimento = json_encode($objEmp->listaEmpreendimentos($pdo));
    echo $empreendimento;
    break;

    //Pega id Empreendimento
    case 'pegaId':
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $dados = json_encode($objEmp->pegaId($pdo, $id));
    echo $dados;
    break;

    //Edita Empreendimento
    case 'editar':
      $at_idempreendimento = filter_input(INPUT_POST, 'idempreendimento', FILTER_SANITIZE_NUMBER_INT);
      $at_empreendimento = filter_input(INPUT_POST, 'empreendimento', FILTER_SANITIZE_STRING);
      $at_endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
      $at_cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
      $at_uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
      $at_regionais = filter_input(INPUT_POST, 'regionais',  FILTER_SANITIZE_NUMBER_INT);
      //echo print_r($_POST);
      if($objEmp->atualizaEmpreendimento($pdo, $at_idempreendimento, $at_empreendimento, $at_endereco, $at_cidade, $at_uf, $at_regionais)) :
          echo  'true';
      else :
          echo 'false';
     endif;
     break;

    //Exclui Empreendimento
    case 'excluir':
      $idempreendimento = filter_input(INPUT_POST, 'idempreendimento', FILTER_SANITIZE_NUMBER_INT);
      if($objEmp->deletarEmpreendimento($pdo, $idempreendimento)):
        echo 'true';
      else :
        echo 'false';
      endif;
      break;

      default:
      echo 'false';
      break;
}
