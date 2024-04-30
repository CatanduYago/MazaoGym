<?php
require_once("conex.php");

$dni = $_POST["dni"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$contrasenia = $_POST["contrasenia"];
$nombreUsuario = strtolower(substr($nombre, 0, -1) . substr($apellidos, 0, 1) . substr($dni, -3));

$numero_aleatorio = rand(1, 10);
$nombre_foto_perfil = "perfil" . $numero_aleatorio . ".png";

$ruta_img_perfil = "img/perfil/";

$sql = "INSERT INTO clientes (DNI, NOMBRE, NOMBRE_USUARIO, APELLIDOS, CORREO, TELEFONO, CONTRASENIA, FOTO_PERFIL) 
        VALUES ('$dni', '$nombre', '$nombreUsuario', '$apellidos', '$correo', '$telefono', '$contrasenia', '$nombre_foto_perfil')";

$r = mysqli_query($conn, $sql);

if ($r) {
    $_SESSION['username'] = $nombreUsuario;
    header("Location: /Web/index.php");
    exit();
} else {
    header("Location: /Web/registro.html");
    exit();
}

