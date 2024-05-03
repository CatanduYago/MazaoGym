<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $Servidor = "127.0.0.1";
    $usu = "root";
    $contrasena = "";
    $dbname = "mazaogym";
    $conn = mysqli_connect($Servidor, $usu, $contrasena, $dbname);
    $nombre_usuario = $_SESSION['username'];

    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    $sql_dni = "SELECT DNI FROM clientes WHERE NOMBRE_USUARIO = '$nombre_usuario'";
    $resultado_dni = $conn->query($sql_dni);

    if ($resultado_dni && $resultado_dni->num_rows > 0) {
        $fila_dni = $resultado_dni->fetch_assoc();
        $dni_cliente = $fila_dni["DNI"];

        $sql_eliminar = "DELETE FROM clientes WHERE DNI = '$dni_cliente'";
        if ($conn->query($sql_eliminar) === TRUE) {
            session_destroy();
            header("Location: /Web/index.php");
            exit(); 
}
}
}