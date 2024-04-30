<?php require_once("../lib/conex.php") ?>

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
            <th>ID_Empleado</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>DNI</th>  
            <th>Teléfono</th> 
            <th>Correo</th>
            <th>Ubicación</th> 
            <th>Pagos</th>
            <th>Horario</th> 

        </tr>

        <?php
        while ($dato = mysqli_fetch_assoc($r)) {
            echo "<tr>";
            echo "<td>".$dato["ID_Empleado"]."</td>";
            echo "<td>".$dato["Nombre"]."</td>";
            echo "<td>".$dato["Apellidos"]."</td>";
            echo "<td>".$dato["DNI"]."</td>";
            echo "<td>".$dato["Telefono"]."</td>";
            echo "<td>".$dato["Correo"]."</td>"; 
            echo "<td>".$dato["Direccion"]."</td>"; 
            echo "<td>".$dato["Sueldo"]."</td>";
            echo "<td>".$dato["Horario"]."</td>"; 
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>