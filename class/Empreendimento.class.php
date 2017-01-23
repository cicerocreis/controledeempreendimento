<?php

  class Empreendimento {
    public $IdEmpreendimento;
    public $Nome;
    public $Endereco;
    public $Cidade;
    public $UF;
    public $IdRegional;
    public $pdo;

    //metodo Cadastra empreendimentos
    public function cadastraEmpreendimentos($pdo,$Nome,$Endereco,$Cidade,$UF,$IdRegional) {
        try {
          $empreendimento = $pdo->prepare("INSERT INTO Empreendimento (
            nome, Endereco, Cidade, UF, IdRegional) VALUES(?,?,?,?,?)");

          $empreendimento->bindValue(1, $Nome, PDO::PARAM_STR);
          $empreendimento->bindValue(2, $Endereco, PDO::PARAM_STR);
          $empreendimento->bindValue(3, $Cidade, PDO::PARAM_STR);
          $empreendimento->bindValue(4, $UF, PDO::PARAM_STR);
          $empreendimento->bindValue(5, $IdRegional, PDO::PARAM_INT);
          $empreendimento->execute();
          if($empreendimento->rowCount() > 0) :
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

       //metodo Lista Empreendimento
       public function listaEmpreendimentos($pdo) {
         try {
           $sql = $pdo->query("SELECT e.*, r.descricao AS descricao from empreendimento AS e join regional AS r ON r.idregional=e.idregional");
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
