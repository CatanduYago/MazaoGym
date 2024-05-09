<?php

include "conexion.php";

$dni = $_REQUEST['dni'];
$nombre = $_REQUEST['nombre'];
$nombre_usuario = generarNombreUsuario($nombre, $apellidos, $dni);
$contrasena = $_REQUEST['contrasena'];
$apellidos = $_REQUEST['apellidos'];
$telefono = $_REQUEST['telefono'];
$correo = $_REQUEST['correo'];
$direccion ;
$pagos;
$foto_perfil;

if (isset($_REQUEST['insertar'])) {
    insertar($conn, $dni, $nombre, $nombre_usuario, $contrasena, $apellidos, $telefono, $correo);
} elseif (isset($_REQUEST['actualizar'])) {
    actualizar($conn, $dni, $nombre, $nombre_usuario, $contrasena, $apellidos, $telefono, $correo, $direccion, $pagos, $foto_perfil);
} elseif (isset($_REQUEST['borrar'])) {
    borrar($conn, $dni);
} elseif (isset($_REQUEST['consultar'])) {
    consultar($conn, $dni);
} else {
    echo "caso no definido";
}
function generarNombreUsuario($nombre, $apellidos, $dni) {
    $ultimos_numeros_dni = substr($dni, -2);
    $letra_dni = substr($dni, -1);
    $apellidos_sin_espacios = strtolower(str_replace(" ", "", $apellidos));
    $primera_letra_nombre = substr($nombre, 0, 1);
    $nombre_usuario = $nombre.$apellidos_sin_espacios.$ultimos_numeros_dni.$letra_dni;
    return $nombre_usuario;
}
function insertar($conn, $dni, $nombre, $nombre_usuario, $contrasena, $apellidos, $telefono, $correo)
{
    $sql = "INSERT INTO clientes (dni, nombre, nombre_usuario, contrasenia, apellidos, telefono, correo, direccion, pagos, foto_perfil) 
            VALUES ('$dni', '$nombre', '$nombre_usuario', '$contrasena', '$apellidos', '$telefono', '$correo')";

    $r = mysqli_query($conn, $sql);

    if ($r) {
        header("Location: /Web/login.html");
    } else {
        echo "<p>Error al insertar registro: " . mysqli_error($conn) . "</p>";
    }
}

function actualizar($conn, $dni, $nombre, $nombre_usuario, $contrasena, $apellidos, $telefono, $correo, $direccion, $pagos, $foto_perfil)
{
    $sql = "UPDATE clientes SET nombre='$nombre', nombre_usuario='$nombre_usuario', contrasenia='$contrasena', 
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
        echo "<title>Documento</title>";
        echo "<style>";
        echo "body {";
        echo "    display: flex;";
        echo "    align-items: center;";
        echo "    justify-content: center;";
        echo "    height: 100vh;";
        echo "    background-color: #f0f0f0;";
        echo "}";
        echo "table {";
        echo "    border-collapse: collapse;";
        echo "    width: 90%;";
        echo "    margin: 20px;";
        echo "    background-color: #e6e6fa;"; 
        echo "}";
        echo "th, td {";
        echo "    border: 1px solid #cccccc;";
        echo "    padding: 8px;";
        echo "    text-align: center;";
        echo "}";
        echo "</style>";
        echo "</head>";
        echo "<body>";
        

        echo "<table border='1' >";
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
            echo "<td>" . $dato["dni"] . "</td>";
            echo "<td>" . $dato["nombre"] . "</td>";
            echo "<td>" . $dato["nombre_usuario"] . "</td>";
            echo "<td>" . $dato["contrasenia"] . "</td>";
            echo "<td>" . $dato["apellidos"] . "</td>";
            echo "<td>" . $dato["telefono"] . "</td>";
            echo "<td>" . $dato["correo"] . "</td>";
            echo "<td>" . $dato["direccion"] . "</td>";
            echo "<td>" . $dato["pagos"] . "</td>";
            echo "<td>" . $dato["foto_perfil"] . "</td>";
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
        
    } else {
        echo "<p>Error al consultar clases y entrenamientos del cliente: " . mysqli_error($conn) . "</p>";
    }
}

?>
