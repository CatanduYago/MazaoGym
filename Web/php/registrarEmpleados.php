<?php
require_once("conex.php");

$Nombre = $_REQUEST['nombre'] ?? NULL;
$Apellidos = $_REQUEST['apellidos']?? NULL;
$DNI = $_REQUEST['dni']?? NULL;
$Telefono = $_REQUEST['Telefono']?? NULL;
$Correo = $_REQUEST['Correo']?? NULL;
$Ubicacion = $_REQUEST['Ubicacion']?? NULL;
$Sueldo = $_REQUEST['Sueldo']?? NULL;
$Horario = $_REQUEST['Horario']?? NULL;
$CONTRASENIA = $_REQUEST['Contraseña']?? NULL;

$sql = "INSERT INTO empleados (Nombre, Apellidos, DNI, Telefono, Correo, Ubicacion, Sueldo, Horario, CONTRASENIA) 
        VALUES ('$Nombre', '$Apellidos', '$DNI', '$Telefono', '$Correo', '$Ubicacion', '$Sueldo', '$Horario', '$CONTRASENIA')";

if ($conn->query($sql) === TRUE) {
    echo "Los datos se han insertado correctamente en la base de datos.";
} else {
    echo "Error al insertar los datos en la base de datos: " . $conn->error;
}
