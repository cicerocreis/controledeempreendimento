<?php

class Regionais {

  public $idregional;
  public $descricao;
  public $pdo;

  //metodo Cadastra Regional
  public function cadastraRegionais($pdo, $descricao) {
    try {
      $cadastraRegional = $pdo->prepare("INSERT INTO regional (descricao)
                    values(?)");
      $cadastraRegional->bindValue(1,$descricao, PDO::PARAM_STR);
      $cadastraRegional->execute();
      if($cadastraRegional->rowCount() > 0) :
        return true;
      else :
          return false;
      endif;
    }catch(PDOException $e) {
      echo $e->getMessage();
    }
  }

  //metodo lista Regionais
  public function listaRegionais($pdo) {
    try {
      $sql = $pdo->query("SELECT * FROM regional");
      if($sql->rowCount() > 0) :
        return $sql->fetchAll(PDO::FETCH_OBJ);
      else :
        return false;
      endif;
    }catch(PDOException $e) {
      echo $e->getMessage();
    }
  }

  //metod Excluir Regional
  public function pegaId($pdo, $id) {
    try {
      $sql = $pdo->prepare("SELECT * FROM regional WHERE idregional = ?");
      $sql->bindValue(1, $id, PDO::PARAM_INT);
      $sql->execute();
      if($sql->rowCount() > 0) :
        return $sql->fetchAll(PDO::FETCH_OBJ);
      else :
        return false;
      endif;
    }catch(PDOException $e) {
      echo $e->getMessage();
    }
  }

  //metodo Atualiza Regional
  public function atualizaRegional($pdo, $idregional, $descricao) {
      try {
        $sql = $pdo->prepare("UPDATE regional SET descricao=? WHERE idregional=?");
        $sql->bindValue(1, $descricao, PDO::PARAM_STR);
        $sql->bindValue(2, $idregional, PDO::PARAM_INT);
        $sql->execute();
        if($sql->rowCount() > 0) :
          return true;
        else :
          return false;
        endif;
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
  }

  //metodo Deleta Regional
  public function deletarRegional($pdo, $idregional) {
    try {
      $sql = $pdo->prepare("DELETE FROM regional WHERE idregional=?");
      $sql->bindValue(1, $idregional, PDO::PARAM_INT);
      $sql->execute();
      if($sql->rowCount() == 1) :
        return true;
      else :
        return false;
      endif;
    }catch(PDOException $e) {
      echo $e->getMessage();
    }
  }

}
