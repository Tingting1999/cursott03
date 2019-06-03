<?php
include_once("clases/BaseMysql.php");
//Declaro las variables
$host = "localhost";
$bd = "movies_db";
$usuario= "root";
$password ="";
$puerto = "3306";
$charset ="utf8mb4";


$pdo = BaseMysql::conexion($host, $bd, $usuario, $password, $puerto, $charset);



 ?>
