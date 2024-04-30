<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro</title>
    <link rel="stylesheet" href="/Web/styles/estilos_general.css">
    <link rel="stylesheet" href="/Web/styles/estilos_index.css">
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

        <!-- Carrusel con las fotos de antes vs despues-->
        <!-- Body de la pagina y un boton que lleve a la pagina de inscripcion-->
        <!-- Añadir mas informacion sobre el centro-->
        <div id="carousel">
            <div class="carousel-slide">
                <img src="/Web/img/antes-despues1.png">
            </div>
            <div class="carousel-slide">
                <img src="/Web/img/antes-despues2.png">
            </div>
            <div class="carousel-slide">
                <img src="/Web/img/antes-despues3.png">
            </div>
            <div class="carousel-slide">
                <img src="/Web/img/antes-despues4.png">
            </div>
            <div class="carousel-slide">
                <img src="/Web/img/antes-despues5.png">
            </div>
            <div class="carousel-slide">
                <img src="/Web/img/antes-despues6.png">
            </div>
            <div class="puntos"></div>
            <div class="barra-progreso">
                <div class="progreso"></div>
            </div>

        </div>
        <div id="cuerpo">
            <p>En <b>MazaoGym</b>, nos dedicamos a ayudarte a alcanzar tus metas de fitness y bienestar de una manera divertida, motivadora y efectiva. Nuestra misión es ofrecerte un espacio donde puedas mejorar tu salud física y mental, independientemente
                de tu nivel de condición física o experiencia previa en el gimnasio.
            </p>
            <p>
                Ya sea que estés buscando perder peso, tonificar tus músculos, mejorar tu resistencia o simplemente mantenerte en forma, en MazaoGym encontrarás las herramientas y el apoyo necesario para lograrlo. Nuestro equipo de entrenadores altamente capacitados
                está aquí para brindarte asesoramiento personalizado y motivación en cada paso del camino.</p>
            <p>En MazaoGym, no solo nos preocupamos por tu cuerpo, sino también por tu mente y tu bienestar general. Por eso, ofrecemos una variedad de clases de yoga, meditación y bienestar emocional para ayudarte a encontrar el equilibrio perfecto entre
                cuerpo y mente.

            </p>
            <p><b> Únete a nuestra comunidad en MazaoGym y descubre una nueva forma de vivir más saludablemente.
                    ¡Estamos aquí para ayudarte a alcanzar tus objetivos y convertirte en la mejor versión de ti
                    mismo!</b></p>
        </div>
        <a href="/Web/inscripcion" id="inscribete">Inscríbete ahora</a>
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
            <span> <a href="https://altafitgymclub.com/aviso-legal/" target="_blank">Aviso legal</a> | <a href="https://altafitgymclub.com/politica-de-cookies/" target="_blank">Política de cookies</a>
            </span>

        </div>
        <div id="encuentra-footer-div">
            <p class="nombre-seccion">ENCUÉNTRANOS</p>
            <!-- iFrame del mapa con la localizacion-->
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d652.9965703877186!2d-6.9806870269362005!3d38.87383348440964!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1712772750511!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="localizacion"></iframe>
    </footer>


    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll('.carousel-slide');
        const barra_progreso = document.querySelector('.progreso');
        const puntos = document.querySelector('.puntos');

        for (let i = 0; i < slides.length; i++) {
            const punto = document.createElement('span');
            punto.classList.add('punto');
            puntos.appendChild(punto);
        }

        const puntosIndicadores = document.querySelectorAll('.punto');

        function showSlides() {
            slides.forEach(slide => slide.style.display = 'none');
            puntosIndicadores.forEach(punto => punto.classList.remove('active'));
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1;
            }
            slides[slideIndex - 1].style.display = 'block';
            puntosIndicadores[slideIndex - 1].classList.add('active'); 
            barra_progreso.style.width = '0';
            setTimeout(updateprogreso, 1);
            setTimeout(showSlides, 5010);
        }

        function updateprogreso() {
            let progresoWidth = 0;
            const interval = 100;
            const totalTime = 4800;
            const increment = interval / totalTime * 100;
            const updatebarra_progreso = setInterval(() => {
                progresoWidth += increment;
                barra_progreso.style.width = `${progresoWidth}%`;
                if (progresoWidth >= 100) {
                    clearInterval(updatebarra_progreso);
                }
            }, interval);
        }

        showSlides();
    </script>
</body>

</html>