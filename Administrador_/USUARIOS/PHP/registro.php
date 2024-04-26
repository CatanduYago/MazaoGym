<?php
require_once("../lib/conex.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = $_POST["nombre_usuario"];
    $contrasenia = $_POST["contrasenia"];
    $sql = "SELECT * FROM clientes WHERE (NOMBRE_USUARIO = '$nombreUsuario' OR DNI = '$nombreUsuario') AND CONTRASENIA = '$contrasenia'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        header("Location: index.html");
        exit();
    }
    $sql = "SELECT * FROM empleados WHERE (NOMBRE = '$nombreUsuario' OR DNI = '$nombreUsuario') AND CONTRASENIA = '$contrasenia'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        header("Location: otra_pagina.php");
        exit();
    }
    if ($nombreUsuario === "administrador" && $contrasenia === "123456789") {
        header("Location: consultas.php");
        exit();
    }
    header("Location: registro.html");
    exit();
}
