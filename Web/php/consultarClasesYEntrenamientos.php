<?php require_once("../lib/conex.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Clases y Entrenamientos</title>
</head>
<body>
    <h1>
        Clases
    </h1>
    <?php
        $strSQL = "SELECT * FROM clases"; 
        $r = mysqli_query($conn, $strSQL);
    ?>
    <table border='10'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th> 
        </tr>

        <?php
        while ($dato = mysqli_fetch_assoc($r)) {
            echo "<tr>";
            echo "<td>".$dato["ID"]."</td>";
            echo "<td>".$dato["Nombre"]."</td>";
            echo "<td>".$dato["Descripcion"]."</td>"; 
            echo "</tr>";
        }
        ?>
    </table>
    <h1>
        Entrenamientos
    </h1>
    <?php
        $strSQL = "SELECT * FROM entrenamiento"; 
        $r = mysqli_query($conn, $strSQL);
    ?>
    <table border='10'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th> 
        </tr>

        <?php
        while ($dato = mysqli_fetch_assoc($r)) {
            echo "<tr>";
            echo "<td>".$dato["ID"]."</td>";
            echo "<td>".$dato["Nombre"]."</td>";
            echo "<td>".$dato["Descripcion"]."</td>"; 
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>