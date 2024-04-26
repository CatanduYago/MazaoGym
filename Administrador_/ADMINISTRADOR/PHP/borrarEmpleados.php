<?php require_once("../lib/conex.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Registro</title>
</head>
<body>
<?php
 $ID_Empleado = $_POST['ID_Empleado'];
 $Nombre = $_POST['Nombre'];
 $Apellidos = $_POST['Apellidos'];
 $DNI = $_POST['DNI'];
 $Telefono = $_POST['Telefono'];
 $Correo = $_POST['Correo'];
 $Direccion = $_POST['Direccion'];
 $Sueldo = $_POST['Sueldo'];
 $Horario = $_POST['Horario'];
   
   $sql = "DELETE FROM empleados WHERE Nombre = '$Nombre' AND DNI = '$DNI'";
 if ($conn->query($sql) === TRUE) {
        echo "Registro borrado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>   
</body>
</html>