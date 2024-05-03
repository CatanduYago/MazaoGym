<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Servidor = "127.0.0.1";
    $usu = "root";
    $contrasena = "";
    $dbname = "mazaogym";
    $conn = mysqli_connect($Servidor, $usu, $contrasena, $dbname);

    if ($conn) {
    }

    $nombre_usuario = $_SESSION['username'];
    $nuevo_usuario = $_POST["nuevo_usuario"];

    $sql = "UPDATE clientes SET NOMBRE_USUARIO='$nuevo_usuario' WHERE NOMBRE_USUARIO='$nombre_usuario'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['username'] = $nuevo_usuario;
        header("Location: /Web/index.php");
    } else {
        echo "Error al cambiar nombre de usuario: " . $conn->error;
    }

}
