<?php 
    require_once("conex.php");

    if(isset($_POST['username'], $_POST['contrasena'])) {
        $nombre_usuario = $_POST['username'];
        $contrasena = $_POST['contrasena'];

        $strSQL = "SELECT * FROM clientes WHERE nombre_usuario = '$nombre_usuario' AND contrasenia = '$contrasena'";

        $r = mysqli_query($conn, $strSQL);

        if ($r->num_rows > 0) { 
            session_start();
            $_SESSION['username'] = $nombre_usuario;
            header("Location: /Web/index.php"); 
            exit;
        } else {

            header("Location: /Web/login.php?error=1");
            exit;
        }
    } else {
        header("Location: /Web/login.php");
        exit;
    }

