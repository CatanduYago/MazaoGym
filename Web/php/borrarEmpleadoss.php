<?php
require_once("conex.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $DNI = $_POST['DNI'];

    $sql = "DELETE FROM empleados WHERE DNI = '$DNI'";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Registro de empleado con DNI: $DNI ha sido borrado exitosamente.</p>";
    } else {
        echo "<p>Error al borrar el registro: " . $conn->error . "</p>";
    }
}
