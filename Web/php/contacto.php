<?php
    include "conexion.php";

    if(isset($_POST['nombre'], $_POST['asunto'], $_POST['correo'], $_POST['detalles'])) {

        $nombre = $_POST['nombre'];
        $asunto = $_POST['asunto'];
        $correo = $_POST['correo'];
        $detalles = $_POST['detalles'];

        $strSQL = "INSERT INTO contacto (nombre, asunto, correo, detalles) VALUES ('$nombre', '$asunto', '$correo', '$detalles')";

        if (mysqli_query($conn, $strSQL)) {
            header("Location:/Web/contacto.php");
            exit;
        }
    }