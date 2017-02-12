<?php

class Usuario {

    //metodo Cadastra Usuario
    public function cadastraUsuario($pdo,$Nome,$Email,$Senha,$Idempreendimento) {
        try {
          $usuario = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES(?,?,?)");
          $usuario->bindValue(1, $Nome, PDO::PARAM_STR);
          $usuario->bindValue(2, $Email, PDO::PARAM_STR);
          $usuario->bindValue(3, $Senha, PDO::PARAM_STR);
          $usuario->execute();
          if($usuario->rowCount() > 0) {
            return true;
          }else {
            return false;
          }
        }catch(PDOException $e) {
          echo $e->getMessage();
        }
    }

    //metodo Lista usuários
    public function listaUsuario($pdo) {
      try {
        $sql = $pdo->query("SELECT * FROM  usuario");
        if($sql->rowCount() > 0) :
          return $sql->fetchAll(PDO::FETCH_OBJ);
        else :
          return false;
        endif;
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
    }

    //metod pegaid usuário
    public function pegaId($pdo, $id) {
      try {
        $sql = $pdo->prepare("SELECT * FROM usuario WHERE idusuario = ?");
        $sql->bindValue(1, $id, PDO::PARAM_INT);
        $sql->execute();
        if($sql->rowCount() == 1) :
          return $sql->fetchAll(PDO::FETCH_OBJ);
        else :
          return false;
        endif;
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
    }

    //metodo atualiza usuário
    public function atualizaUsuario($pdo, $nome, $email, $idusuario, $idempreendimento) {

        try {

          $sqlAll = $pdo->prepare("SELECT idempreendimento FROM empreendimento_usuario WHERE idusuario = ?");
          $sqlAll->bindValue(1, $idusuario, PDO::PARAM_INT);
          $sqlAll->execute();
          $resultado = $sqlAll->fetch(PDO::FETCH_NUM);

          $sqlCount = $pdo->prepare("SELECT COUNT(idempreendimento) FROM empreendimento_usuario WHERE idusuario=?");
          $sqlCount->bindValue(1, $idusuario, PDO::PARAM_INT);
          $sqlCount->execute();
          $row = $sqlCount->fetch(PDO::FETCH_NUM);

          $sqlUpdate = $pdo->prepare("UPDATE usuario SET nome=?, email=? WHERE idusuario=?");
          $sqlUpdate->bindValue(1, $nome, PDO::PARAM_STR);
          $sqlUpdate->bindValue(2, $email, PDO::PARAM_STR);
          $sqlUpdate->bindValue(3, $idusuario, PDO::PARAM_INT);
          $sqlUpdate->execute();

          if(!empty($idempreendimento) && ($row[0] == 0) ) {
              foreach($idempreendimento as $key => $value) {
                $sqlInsert1 = $pdo->prepare("INSERT INTO empreendimento_usuario (idempreendimento, idusuario) VALUES (?,?)");
                $sqlInsert1->bindValue(1, $value, PDO::PARAM_INT);
                $sqlInsert1->bindValue(2, $idusuario, PDO::PARAM_INT);
                $sqlInsert1->execute();
              }
          }

          if(!empty($idempreendimento) && ($row[0] > 0)) {
              foreach($idempreendimento as $key => $value) {
                $i = 0;
                if($value != $resultado[$i]) {
                  $sqlInsert2 = $pdo->prepare("INSERT INTO empreendimento_usuario (idempreendimento, idusuario) VALUES (?,?)");
                  $sqlInsert2->bindValue(1, $value, PDO::PARAM_INT);
                  $sqlInsert2->bindValue(2, $idusuario, PDO::PARAM_INT);
                  $sqlInsert2->execute();
                  ++$i;
                }
              }
          }

          if(count($idempreendimento) <= $row[0]) {
            foreach($idempreendimento as $key => $value) {
              $x = 0;
              if($value != $resultado[$x]) {
                $sqlDelete = $pdo->prepare("DELETE FROM empreendimento_usuario WHERE idempreendimento=? AND idusuario=?");
                $sqlDelete->bindValue(1, $resultado[$x], PDO::PARAM_INT);
                $sqlDelete->bindValue(2, $idusuario, PDO::PARAM_INT);
                $sqlDelete->execute();
                ++$x;
              }
            }
          }

          if($row[0] > 0) :
            return true;
          else :
            return false;
          endif;

        }catch(PDOException $e) {
          echo $e->getMessage();
        }
    }

    //metodo Deleta Usuário
    public function deletarUsuario($pdo, $idusuario) {
      try {
        $sql = $pdo->prepare("DELETE FROM usuario WHERE idusuario=?");
        $sql->bindValue(1, $idusuario, PDO::PARAM_INT);
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

    public function listaEmpreendimentos($pdo) {
      try {
        $sql = $pdo->query("SELECT idempreendimento, nome FROM empreendimento");
        if($sql->rowCount() > 0) :
          return $sql->fetchAll(PDO::FETCH_OBJ);
        else :
          return false;
        endif;
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function listaEmpreendimentosUsuario($pdo, $id) {
      try {
        $sql = $pdo->prepare("SELECT * FROM empreendimento_usuario WHERE idusuario = ?");
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

}
