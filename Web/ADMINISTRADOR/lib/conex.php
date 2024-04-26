<?php
$Servidor = "127.0.0.1";
$usu = "root";
$contrasena = "";
$dbname = "mazaogym";
$conn = mysqli_connect($Servidor, $usu, $contrasena, $dbname);
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}
?>