<?php require_once("../lib/conex.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Empleados</title>
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

        
        
        $strSQL = "INSERT INTO empleados(ID_Empleado, Nombre, Apellidos, DNI, Telefono, Direccion, Sueldo, Horario)";
        $strSQL .= "VALUES ('$ID_Empleado', '$Nombre', '$Apellidos', '$DNI', $Telefono, $Direccion, '$Sueldo', $Horario)";
        
       
        $r = mysqli_query($conn, $strSQL);

        if ($r) {
            echo "Los datos se han insertado correctamente en la base de datos.";
        } else {
            echo "Error al insertar los datos en la base de datos: " . mysqli_error($conn);
        }
    ?>
</body>
</html>