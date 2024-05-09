<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: /Web/login.php");
    exit();
}

include "conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscribete</title>
    <link rel="stylesheet" href="/Web/styles/estilos_general.css">
    <link rel="stylesheet" href="/Web/styles/estilos_inscripcion.css">
    <link rel="icon" href="/Web/img/logo2.png">
    <script>
        function enviarFormulario() {
            var formulario = document.getElementById("formulario_inscripcion");
            formulario.reset();

            alert("¡Inscripción realizada correctamente!");
        }
    </script>
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
    <table>
            <tr>
                <th colspan="2">Inscríbete en nuestros entrenamientos</th>
            </tr>
            <tr>
                <td>
                    <h4>Contáctanos</h4>
                    <p><img src="/Web/img/telefono.png"> +34 924 45 67 89</p>
                    <p><img src="/Web/img/correo.png"> mazaogym@gmail.com</p>
                </td>
                <td>
                    <form id="formulario_inscripcion" action="/Web/index.php"onsubmit="enviarFormulario()">
                        <label for="tipo">Seleccione:</label><br>
                        <select id="tipo" name="tipo" class="selectgroup">
                            <optgroup label="Clases">
                                <option value="spinning">Spinning</option>
                                <option value="aerobic">Aeróbic</option>
                                <option value="bodypump">Body Pump</option>
                                <option value="crossfit">CrossFit</option>
                                <option value="yoga">Yoga</option>
                                <option value="pilates">Pilates</option>
                            </optgroup>
                            <optgroup label="Entrenamientos">
                                <option value="funcional">Entrenamiento funcional</option>
                                <option value="hiit">Entrenamiento HIIT</option>
                                <option value="boxeo">Boxeo</option>
                            </optgroup>
                        </select><br><br>
                        <label for="dni">DNI:</label><br>
                        <input type="text" id="dni" name="dni" required placeholder="DNI"><br><br>
                        <label for="email">Correo electrónico:</label><br>
                        <input type="email" id="correo" name="correo" required placeholder="Correo electrónico"><br><br>
                        <input type="checkbox" id="terminos" name="terminos" required>
                        <label for="terminos">Acepto los términos y condiciones de privacidad.</label><br> <!-- Nueva casilla de aceptación de términos -->
                        <input type="submit" value="Enviar" class="botones-form">
                        <input type="reset" value="Cancelar" class="botones-form">
                    </form>
                </td>
            </tr>
        </table>
    </main>

</body>

</html>