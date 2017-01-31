<?php

  class Empreendimento {

    //metodo Cadastra empreendimentos
    public function cadastraEmpreendimentos($pdo,$Nome,$Endereco,$Cidade,$UF,$IdRegional) {
        try {
          $empreendimento = $pdo->prepare("INSERT INTO empreendimento (
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
           $sql = $pdo->query("SELECT regional.descricao, empreendimento.* FROM empreendimento
                              INNER JOIN regional ON regional.idregional=empreendimento.idregional");
           if($sql->rowCount() > 0) :
             return $sql->fetchAll(PDO::FETCH_OBJ);
           else :
             return false;
           endif;
         }catch(PDOException $e) {
           echo $e->getMessage();
         }
       }

       //metod pega id Empreendimento
       public function pegaId($pdo, $id) {
         try {
           $sql = $pdo->prepare("SELECT * FROM empreendimento WHERE idempreendimento = ?");
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

       //metodo Atualiza Empreendimento
       public function atualizaEmpreendimento($pdo, $idempreendimento, $empreendimento, $endereco, $cidade, $uf, $regionais) {
           try {
             $sql = $pdo->prepare("UPDATE empreendimento SET idempreendimento=?, nome=?, endereco=?, cidade=?, uf=?, idregional=? WHERE idempreendimento=?");
             $sql->bindValue(1, $idempreendimento, PDO::PARAM_INT);
             $sql->bindValue(2, $empreendimento, PDO::PARAM_STR);
             $sql->bindValue(3, $endereco, PDO::PARAM_STR);
             $sql->bindValue(4, $cidade, PDO::PARAM_STR);
             $sql->bindValue(5, $uf, PDO::PARAM_STR);
             $sql->bindValue(6, $regionais, PDO::PARAM_INT);
             $sql->bindValue(7, $idempreendimento, PDO::PARAM_INT);
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

       //metodo Deleta Empreendimento
       public function deletarEmpreendimento($pdo, $idempreendimento) {
         try {
           $sql = $pdo->prepare("DELETE FROM empreendimento WHERE idempreendimento=?");
           $sql->bindValue(1, $idempreendimento, PDO::PARAM_INT);
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
