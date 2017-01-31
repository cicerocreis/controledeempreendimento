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
    public function atualizaUsuario($pdo, $nome, $email, $idusuario) {
        try {
          $sql = $pdo->prepare("UPDATE usuario SET nome=?, email=? WHERE idusuario=?");
          $sql->bindValue(1, $nome, PDO::PARAM_STR);
          $sql->bindValue(2, $email, PDO::PARAM_STR);
          $sql->bindValue(3, $idusuario, PDO::PARAM_INT);
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

    /*public function listaEmpreendimento($pdo) {
      try {
        $sql = $pdo->query("SELECT * FROM  empreendimento");
        if($sql->rowCount() > 0) :
          return $sql->fetchAll(PDO::FETCH_OBJ);
        else :
          return false;
        endif;
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
    }*/

}
