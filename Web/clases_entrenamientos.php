<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro</title>
    <link rel="stylesheet" href="/Web/styles/estilos_general.css">
    <link rel="stylesheet" href="/Web/styles/estilos_clases.css">
    <link rel="icon" href="/Web/img/logo2.png">

</head>

<body>
    <header id="nav-menu">
        <div id="logo-div">
            <img src="/Web/img/logo2.png" id="logo-pequeño">
        </div>

        <div id="pag-principales">
            <!-- Links de las dinstintas paginas -->
            <a href="/Web/index.php" class="menu-pag">Curso</a>
            <a href="/Web/clases_entrenamientos.php" class="menu-pag">Clases y entrenamientos</a>
            <a href="/Web/contacto.php" class="menu-pag">Contacto</a>
        </div>

        <div id="sesion-div">
            <!-- Boton de inicio de unirse y apuntarse-->
            <a href="/Web/inscripcion" class="menu-pag" id="apuntate">Apuntate</a>
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo '<div class="dropdown">';
                echo '<button class="dropbtn">' . $_SESSION['username'] . '</button>';
                echo '<div class="dropdown-content">';
                echo '<a href="/Web/configuracion.php">Configuración de Perfil</a>';
                echo '<a href="#">Ayuda</a>';
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
        <!-- -->

    </main>
    <footer>
        <!-- 3 divs en flex direction row-->
        <div id="links-footer-div">
            <!-- derechos de autor-->
            <img src="/Web/img/logo.png" id="logo-grande">
            <p></p>
            <p id="copyright">&#169; Derechos Reservados</p>

        </div>
        <div id="contacto-footer-div">
            <!-- Contacto y redes sociales-->
            <p class="nombre-seccion">CONTÁCTANOS</p>

            <a href="tel:+34 924456789" target="_blank"> <img src="/Web/img/telefono.png"> +34 924 45 67 89</a>
            <a href="mailto:mazaogym@gmail.com" target="_blank"><img src="/Web/img/correo.png"> mazaogym@gmail.com</a>
            <a href="https://www.instagram.com/mazaogym/" class="redsocial"><img src="/Web/img/instagram.png" class="logo-redsocial"></a>
            <a href="https://x.com/MazaoGym" class="redsocial"><img src="/Web/img/twitter.png" class="logo-redsocial"></a>
            <a href="https://www.facebook.com/profile.html?id=61558495199135" class="redsocial"><img src="/Web/img/facebook.png" class="logo-redsocial"></a>
            <span> <a href="https://altafitgymclub.com/aviso-legal/" target="_blank">Aviso legal</a> | <a
                    href="https://altafitgymclub.com/politica-de-cookies/" target="_blank">Política de cookies</a>
            </span>

        </div>
        <div id="encuentra-footer-div">
            <p class="nombre-seccion">ENCUÉNTRANOS</p>
            <!-- iFrame del mapa con la localizacion-->
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d652.9965703877186!2d-6.9806870269362005!3d38.87383348440964!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1712772750511!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="localizacion"></iframe>
    </footer>

</body>

</html>