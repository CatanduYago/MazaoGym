<?php
$Servidor = "127.0.0.1";
$usu = "root";
$contrasena = "";
$dbname = "mazaogym";

$conn = new mysqli($Servidor, $usu, $contrasena, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

