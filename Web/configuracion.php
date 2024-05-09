<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: /Web/login.php");
    exit();
}

include "conexion.php";
$nombre_usuario = $_SESSION['username'];

$sql_foto_perfil = "SELECT FOTO_PERFIL FROM clientes WHERE NOMBRE_USUARIO = '$nombre_usuario'";
$resultado_foto_perfil = mysqli_query($conn, $sql_foto_perfil);

if ($resultado_foto_perfil && mysqli_num_rows($resultado_foto_perfil) > 0) {
    $fila_foto_perfil = mysqli_fetch_assoc($resultado_foto_perfil);
    $foto_perfil = $fila_foto_perfil['FOTO_PERFIL'];
} else {
    $foto_perfil = "/Web/img/perfil/perfil1.png";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de perfil</title>
    <link rel="stylesheet" href="/Web/styles/estilos_general.css">
    <link rel="stylesheet" href="/Web/styles/estilos_config.css">
    <link rel="icon" href="/Web/img/logo2.png">
</head>

<body>
    <header id="nav-menu">
        <div id="logo-div">
            <img src="/Web/img/logo2.png" id="logo-pequeño">
        </div>

        <div id="pag-principales">
            <!-- Links de las dinstintas paginas -->
            <a href="/Web/index.php" class="menu-pag">Inicio</a>
            <a href="/Web/clases_entrenamientos.php" class="menu-pag">Clases y entrenamientos</a>
            <a href="/Web/contacto.php" class="menu-pag">Contacto</a>
        </div>

        <div id="sesion-div">
            <!-- Boton de inicio de unirse y apuntarse-->
            <a href="/Web/inscripcion.php" class="menu-pag" id="apuntate">Apuntate</a>
            <?php
            if (isset($_SESSION['username'])) {
                echo '<div class="dropdown">';
                echo '<button class="dropbtn">' . $_SESSION['username'] . '</button>';
                echo '<div class="dropdown-content">';
                echo '<a href="/Web/configuracion.php">Configuración de Perfil</a>';
                echo '<a href="/Web/php/logout.php">Cerrar Sesión</a>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<a href="/Web/login.php" class="menu-pag">Accede</a>';
            }
            ?>
        </div>

    </header>
    <main>

        <div id="perfil-div">

            <div id="perfil-info">
                <p>Foto de perfil</p>
                <?php       
                echo '<p id= "bienvenido"> Bienvenido, ' . $_SESSION['username'] . '.</p>';

                echo '<img src="/Web/img/perfil/' . $foto_perfil . '" id="perfil-img">';
                ?>
                <div id="fotos-disponibles" style="display: none;">
                    <?php
                    $directorio_fotos = "/Web/img/perfil/";

                    $archivos = scandir($_SERVER['DOCUMENT_ROOT'] . $directorio_fotos);

                    foreach ($archivos as $archivo) {
                        if ($archivo != '.' && $archivo != '..') {
                            echo '<img src="' . $directorio_fotos . $archivo . '" class="miniatura" onclick="seleccionarFoto(\'' . $archivo . '\')"> ';
                        }
                    }
                    ?>
                </div>
            </div>
            <div id="perfil-desc">
                <p>Configuración del perfil</p>
                <span>Añade tus datos </span>
                <form action="/Web/php/añade_datos.php" method="post">
                    <span class ="span-desc-perfil" >Añade tu dirección</span>
                    <input type="text" placeholder="Dirección" name="direccion" id="direccion">
                    <input type="submit" class="botones-form" value="Agregar">  
                    <input type="reset" class="botones-form" value="Cancelar">

                </form><br><br>
                <span>Cambia tu nombre de usuario</span>
                <form action="/Web/php/cambia_nombre.php" method="post">
                    <span class ="span-desc-perfil">Introduce tu nuevo usuario:</span>
                    <input type="text" placeholder="Nuevo usuario" size="20" name="nuevo_usuario">
                    <input type="submit" class="botones-form" value="Cambiar"> 
                    <input type="reset" class="botones-form" value="Cancelar">
                </form><br><br><br><br><br>
                <form action="/Web/php/baja_usuario.php" method="post">
                <input type="submit" id="boton-baja" value="Darse de baja en MazaoGym"> 
                </form>
            </div>
        </div>

        <script>
            window.onload = function() {
                var perfilImg = document.getElementById("perfil-img");
                var fotosDisponibles = document.getElementById("fotos-disponibles");

                perfilImg.onclick = function() {
                    if (fotosDisponibles.style.display === "none") {
                        fotosDisponibles.style.display = "block";
                    } else {
                        fotosDisponibles.style.display = "none";
                    }
                };
            };

            function seleccionarFoto(nombreFoto) {
                var imagenPerfil = document.getElementById("perfil-img");
                imagenPerfil.src = "/Web/img/perfil/" + nombreFoto;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "/Web/php/actualizar_foto_perfil.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("foto=" + nombreFoto);
            }
        </script>
    </main>

</body>

</html>