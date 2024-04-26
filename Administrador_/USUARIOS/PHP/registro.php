<?php
require_once("../lib/conex.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = $_POST["nombre_usuario"] ?? null;
    $contrasenia = $_POST["contrasenia"] ?? null;

    $sql = "SELECT * FROM clientes WHERE (NOMBRE_USUARIO = '$nombreUsuario' OR DNI = '$nombreUsuario') AND CONTRASENIA = '$contrasenia'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        header("Location: /Web/index.html");
        exit();
    } elseif ($result->num_rows == 0) { 
        $sql = "SELECT * FROM empleados WHERE (NOMBRE = '$nombreUsuario' OR DNI = '$nombreUsuario') AND CONTRASENIA = '$contrasenia'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            header("Location: /Web/registro.html");
            exit();
        } elseif ($nombreUsuario === "administrador" && $contrasenia === "123456789") { 
            header("Location: /Web/login.html");
            exit();
        } else { 
            header("Location: registro.html");
            exit();
        }
    }
}
