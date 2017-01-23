<?php

class Conexao {

  public static $db;

	public function __construct() {

		$HOST = "localhost";
		$USER = "root";
		$PASS = "";
		$DB = "construtora";
		$DRIVER = "mysql";

    try {
      self::$db = new PDO("$DRIVER:host=$HOST; dbname=$DB", $USER, $PASS);
      self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      self::$db->exec('SET NAMES utf8');
    }catch(PDOException $erro) {
      die("Connect Error: ".$erro->getMessage());
    }
  }

	public static function conexao()
    {
        //Garante uma única instância. Se não existe uma conexão, criamos uma nova.
        if (!self::$db)
        {
            new Conexao();
        }
        //etorna a conexão.
        return self::$db;
    }
}
