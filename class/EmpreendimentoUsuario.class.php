<?php

class EmpreendimentoUsuario {

  public $idempreendimento;
  public $idusuario;

  //metodo Lista Empreendimento / Usuario
  public function listaUsuario($pdo) {
    try {
        $sql = $pdo->query("SELECT empreendimento.nome as nome, usuario.nome as nome from empreendimento_usuario
          join empreendimento on empreendimento_usuario.idempreendimento = empreendimento.idempreendimento
          join usuario on empreendimento_usuario.idusuario = usuario.idusuario");
        if($sql->rowCount() > 0) :
          return $sql->fetchAll(PDO::FETCH_OBJ);
        else :
          return false;
        endif;
    }catch(PDOException $e) {
      echo $e->getMessage();
    }
  }

}
