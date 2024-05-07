<?php require_once("conex.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Empleados</title>
</head>
<body>
    <h1>
        Empleados
    </h1>
    <?php
        $strSQL = "SELECT * FROM empleados"; 
        $r = mysqli_query($conn, $strSQL);
    ?>
    <table border='10'>
        <tr>
            <th>ID_EMPLEADO</th>
            <th>NOMBRE</th>
            <th>APELLIDOS</th>
            <th>DNI</th>  
            <th>TELEFONO</th> 
            <th>CORREO</th>
            <th>UBICACION</th> 
            <th>SUELDO</th>
            <th>HORARIO</th> 
            <th>CONTRASENIA</th> 
        </tr>

        <?php
        while ($dato = mysqli_fetch_assoc($r)) {
            echo "<tr>";
            echo "<td>".$dato["ID_EMPLEADO"]."</td>";
            echo "<td>".$dato["NOMBRE"]."</td>";
            echo "<td>".$dato["APELLIDOS"]."</td>";
            echo "<td>".$dato["DNI"]."</td>";
            echo "<td>".$dato["TELEFONO"]."</td>";
            echo "<td>".$dato["CORREO"]."</td>"; 
            echo "<td>".$dato["UBICACION"]."</td>"; 
            echo "<td>".$dato["SUELDO"]."</td>";
            echo "<td>".$dato["HORARIO"]."</td>"; 
            echo "<td>".$dato["CONTRASENIA"]."</td>"; 
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>