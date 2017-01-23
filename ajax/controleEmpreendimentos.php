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
    $nome = filter_input(INPUT_POST, 'empreendimento', FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
    $idregional = filter_input(INPUT_POST, 'regionais', FILTER_SANITIZE_NUMBER_INT);
    if($objEmp->cadastraEmpreendimentos($pdo,$nome,$endereco,$cidade,$uf,$idregional)) :
      echo 'Cadastrado';
    else :
      echo 'Erro em cadastrar Empreendimento';
    endif;
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

    default:
    echo 'teste';
    break;
}
?>
