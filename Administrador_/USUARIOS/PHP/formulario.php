<?php require_once("../lib/conex.php") ?>

<?php
$dni = $_REQUEST['dni'] ?? null;
$nombre = $_REQUEST['nombre']?? null;
$nombre_usuario = $_REQUEST['nombre_usuario']?? null;
$contrasenia = $_REQUEST['contrasenia']?? null;
$apellidos = $_REQUEST['apellidos']?? null;
$telefono = $_REQUEST['telefono']?? null;
$correo = $_REQUEST['correo']?? null;
$direccion = $_REQUEST['direccion']?? null;
$pagos = $_REQUEST['pagos']?? null;
$foto_perfil = $_REQUEST['foto_perfil']?? null;

if (isset($_REQUEST['insertar'])) {
    insertar($conn, $dni, $nombre, $nombre_usuario, $contrasenia, $apellidos, $telefono, $correo, $direccion, $pagos, $foto_perfil);
} elseif (isset($_REQUEST['actualizar'])) {
    actualizar($conn, $dni, $nombre, $nombre_usuario, $contrasenia, $apellidos, $telefono, $correo, $direccion, $pagos, $foto_perfil);
} elseif (isset($_REQUEST['borrar'])) {
    borrar($conn, $dni);
} elseif (isset($_REQUEST['consultar'])) {
    consultar($conn, $dni);
} elseif (isset($_REQUEST['consultar_clases'])) {
    consultar_clases($conn, $dni);
} elseif (isset($_REQUEST['consultar_entrenamiento'])) {
    consultar_entrenamiento($conn, $dni);
} elseif (isset($_REQUEST['consultar_clases_entrenamientos_cliente'])) {
    consultar_clases_entrenamientos_cliente($conn, $dni);
} else {
    echo "caso no definido";
}

function insertar($conn, $dni, $nombre, $nombre_usuario, $contrasenia, $apellidos, $telefono, $correo, $direccion, $pagos, $foto_perfil)
{
    $sql = "INSERT INTO clientes (dni, nombre, nombre_usuario, contrasenia, apellidos, telefono, correo, direccion, pagos, foto_perfil) 
            VALUES ('$dni', '$nombre', '$nombre_usuario', '$contrasenia', '$apellidos', '$telefono', '$correo', '$direccion', '$pagos', '$foto_perfil')";

    $r = mysqli_query($conn, $sql);

    if ($r) {
        echo "<p>Registro insertado correctamente</p>";
    } else {
        echo "<p>Error al insertar registro: " . mysqli_error($conn) . "</p>";
    }
}

function actualizar($conn, $dni, $nombre, $nombre_usuario, $contrasenia, $apellidos, $telefono, $correo, $direccion, $pagos, $foto_perfil)
{
    $sql = "UPDATE clientes SET nombre='$nombre', nombre_usuario='$nombre_usuario', contrasenia='$contrasenia', 
            apellidos='$apellidos', telefono='$telefono', correo='$correo', direccion='$direccion', pagos='$pagos', foto_perfil='$foto_perfil' WHERE dni='$dni'";

    $r = mysqli_query($conn, $sql);

    if ($r) {
        echo "<p>Registro actualizado correctamente</p>";
    } else {
        echo "<p>Error al actualizar registro: " . mysqli_error($conn) . "</p>";
    }
}

function borrar($conn, $dni)
{
    $sql = "DELETE FROM clientes WHERE dni='$dni'";
    $r = mysqli_query($conn, $sql);

    if ($r) {
        echo "<p>Registro borrado correctamente</p>";
    } else {
        echo "<p>Error al borrar registro: " . mysqli_error($conn) . "</p>";
    }
}

function consultar($conn, $dni)
{
    $sql = "SELECT * FROM clientes WHERE dni='$dni'";
    $r = mysqli_query($conn, $sql);

    if ($r) {
        echo "<!DOCTYPE html>";
        echo "<html lang='es'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>Resultado de la Consulta</title>";
        echo "</head>";
        echo "<body>";

        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>DNI</th>";
        echo "<th>Nombre</th>";
        echo "<th>Nombre de Usuario</th>";
        echo "<th>Contraseña</th>";
        echo "<th>Apellidos</th>";
        echo "<th>Teléfono</th>";
        echo "<th>Correo</th>";
        echo "<th>Dirección</th>";
        echo "<th>Pagos</th>";
        echo "<th>Foto de Perfil</th>";
        echo "</tr>";

        while ($dato = mysqli_fetch_assoc($r)) {
            echo "<tr>";
            echo "<td>" . $dato["DNI"] . "</td>";
            echo "<td>" . $dato["NOMBRE"] . "</td>";
            echo "<td>" . $dato["NOMBRE_USUARIO"] . "</td>";
            echo "<td>" . $dato["CONTRASENIA"] . "</td>";
            echo "<td>" . $dato["APELLIDOS"] . "</td>";
            echo "<td>" . $dato["TELEFONO"] . "</td>";
            echo "<td>" . $dato["CORREO"] . "</td>";
            echo "<td>" . $dato["DIRECCION"] . "</td>";
            echo "<td>" . $dato["PAGOS"] . "</td>";
            echo "<td>" . $dato["FOTO_PERFIL"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<br><br>";
        echo "<a href='index.html'>Volver</a>";
        echo "</body>";
        echo "</html>";
    } else {
        echo "<p>Error al consultar registro: " . mysqli_error($conn) . "</p>";
    }
}

function consultar_clases($conn, $dni)
{
    $sql = "SELECT clases.* FROM clases
            INNER JOIN relacion_clientes_clases_entrenamiento ON clases.ID = relacion_clientes_clases_entrenamiento.ID_CLASES
            WHERE relacion_clientes_clases_entrenamiento.DNI_CLIENTE='$dni'";
    $r = mysqli_query($conn, $sql);

    if ($r) {
        echo "<!DOCTYPE html>";
        echo "<html lang='es'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>Resultado de la Consulta de Clases</title>";
        echo "</head>";
        echo "<body>";

        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre de la Clase</th>";
        echo "<th>Descripción</th>";
        echo "</tr>";

        while ($dato = mysqli_fetch_assoc($r)) {
            echo "<tr>";
            echo "<td>" . $dato["ID"] . "</td>";
            echo "<td>" . $dato["NOMBRE"] . "</td>";
            echo "<td>" . $dato["DESCRIPCION"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<br><br>";
        echo "<a href='index.html'>Volver</a>";
        echo "</body>";
        echo "</html>";
    } else {
        echo "<p>Error al consultar clases: " . mysqli_error($conn) . "</p>";
    }
}

function consultar_entrenamiento($conn, $dni)
{
    $sql = "SELECT entrenamiento.* FROM entrenamiento
            INNER JOIN relacion_clientes_clases_entrenamiento ON entrenamiento.ID = relacion_clientes_clases_entrenamiento.ID_ENTRENAMIENTO
            WHERE relacion_clientes_clases_entrenamiento.DNI_CLIENTE='$dni'";
    $r = mysqli_query($conn, $sql);

    if ($r) {
        echo "<!DOCTYPE html>";
        echo "<html lang='es'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>Resultado de la Consulta de Entrenamiento</title>";
        echo "</head>";
        echo "<body>";

        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre del Entrenamiento</th>";
        echo "<th>Descripción</th>";
        echo "</tr>";

        while ($dato = mysqli_fetch_assoc($r)) {
            echo "<tr>";
            echo "<td>" . $dato["ID"] . "</td>";
            echo "<td>" . $dato["NOMBRE"] . "</td>";
            echo "<td>" . $dato["DESCRIPCION"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<br><br>";
        echo "<a href='index.html'>Volver</a>";
        echo "</body>";
        echo "</html>";
    } else {
        echo "<p>Error al consultar entrenamientos: " . mysqli_error($conn) . "</p>";
    }
}

function consultar_clases_entrenamientos_cliente($conn, $dni)
{
    $sql = "SELECT clases.*, entrenamiento.* FROM clases
            INNER JOIN relacion_clientes_clases_entrenamiento AS rcc ON clases.ID = rcc.ID_CLASES
            INNER JOIN entrenamiento ON entrenamiento.ID = rcc.ID_ENTRENAMIENTO
            WHERE rcc.DNI_CLIENTE='$dni'";
    $r = mysqli_query($conn, $sql);

    if ($r) {
        echo "<!DOCTYPE html>";
        echo "<html lang='es'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>Resultado de la Consulta de Clases y Entrenamientos</title>";
        echo "</head>";
        echo "<body>";

        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID Clase</th>";
        echo "<th>Nombre de la Clase</th>";
        echo "<th>Descripción de la Clase</th>";
        echo "<th>ID Entrenamiento</th>";
        echo "<th>Nombre del Entrenamiento</th>";
        echo "<th>Descripción del Entrenamiento</th>";
        echo "</tr>";

        while ($dato = mysqli_fetch_assoc($r)) {
            echo "<tr>";
            echo "<td>" . $dato["ID"] . "</td>";
            echo "<td>" . $dato["NOMBRE"] . "</td>";
            echo "<td>" . $dato["DESCRIPCION"] . "</td>";
            echo "<td>" . $dato["ID_ENTRENAMIENTO"] . "</td>";
            echo "<td>" . $dato["NOMBRE"] . "</td>";
            echo "<td>" . $dato["DESCRIPCION"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<br><br>";
        echo "<a href='index.html'>Volver</a>";
        echo "</body>";
        echo "</html>";
    } else {
        echo "<p>Error al consultar clases y entrenamientos del cliente: " . mysqli_error($conn) . "</p>";
    }
}
?>

