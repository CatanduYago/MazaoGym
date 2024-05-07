<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Servidor = "127.0.0.1";
    $usu = "root";
    $contrasena = "";
    $dbname = "mazaogym";
    $conn = mysqli_connect($Servidor, $usu, $contrasena, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    $nombre_usuario = $_SESSION['username'];
    $direccion = $_POST["direccion"];

    $sql = "UPDATE clientes SET DIRECCION='$direccion' WHERE NOMBRE_USUARIO='$nombre_usuario'";

    if ($conn->query($sql) === TRUE) {
        header("Location: /Web/index.php");

        exit();
    } else {
        echo "Error al añadir dirección: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Por favor, envía el formulario correctamente.";
}

