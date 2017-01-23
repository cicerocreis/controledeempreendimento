<?php

class Usuario {
    public $IdUsuario;
    public $Nome;
    public $Email;
    public $Senha;

    //metodo Cadastra Usuario
    public function cadastraUsuario($pdo,$Nome,$Email,$Senha) {
        try {
          $usuario = $pdo->prepare("INSERT INTO usuario (
            nome, email, senha) VALUES(?,?,?)");

          $usuario->bindValue(1, $Nome, PDO::PARAM_STR);
          $usuario->bindValue(2, $Email, PDO::PARAM_STR);
          $usuario->bindValue(3, $Senha, PDO::PARAM_STR);
          $usuario->execute();
          if($usuario->rowCount() > 0) :
            return true;
          else :
              return false;
          endif;
        }catch(PDOException $e) {
          echo $e->getMessage();
        }
    }

}
