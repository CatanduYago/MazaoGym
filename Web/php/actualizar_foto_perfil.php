<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /Web/login.php");
    exit();
}

include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["foto"])) {
    $nombre_usuario = $_SESSION['username'];
    $nueva_foto = $_POST["foto"];

    $sql = "UPDATE clientes SET FOTO_PERFIL = '$nueva_foto' WHERE NOMBRE_USUARIO = '$nombre_usuario'";
    $resultado = mysqli_query($conn, $sql);

    if ($resultado) {
        header("Location: /Web/configuracion.php");
        exit();
    } else {
        echo "Error al actualizar la foto de perfil en la base de datos.";
    }
}

mysqli_close($conn);

