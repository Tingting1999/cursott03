<?php

class BaseMysql{

  static public function conexion($host, $db_nombre, $usuario, $password, $puerto, $charset){
    try {
      $dsn ="mysql: host=".$host. ";" . "dbname=". $db_nombre .";". "port=". $puerto.";" . "charset=". $charset;
      $baseDatos= new PDO($dsn, $usuario, $password);
      $baseDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $baseDatos;
  } catch (\Exception $e) {
      echo "No me pude conectar a la Base de datos" .$e->getMessage();
      exit;
  }
  }
}




 ?>
