<?php require_once("conexion.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Clases y Entrenamientos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Clases</h1>
    <?php
        $strSQL = "SELECT * FROM clases"; 
        $r = mysqli_query($conn, $strSQL);

        if (!$r) {
            echo "Error al consultar clases: " . mysqli_error($conn);
        } else {
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th></tr>";

            while ($dato = mysqli_fetch_assoc($r)) {
                echo "<tr>";
                echo "<td>".$dato["ID"]."</td>";
                echo "<td>".$dato["Nombre"]."</td>";
                echo "<td>".$dato["Descripcion"]."</td>"; 
                echo "</tr>";
            }

            echo "</table>";
        }

        mysqli_free_result($r); // Liberar el resultado
    ?>

    <h1>Entrenamientos</h1>
    <?php
        $strSQL = "SELECT * FROM entrenamiento"; 
        $r = mysqli_query($conn, $strSQL);

        if (!$r) {
            echo "Error al consultar entrenamientos: " . mysqli_error($conn);
        } else {
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th></tr>";

            while ($dato = mysqli_fetch_assoc($r)) {
                echo "<tr>";
                echo "<td>".$dato["ID"]."</td>";
                echo "<td>".$dato["Nombre"]."</td>";
                echo "<td>".$dato["Descripcion"]."</td>"; 
                echo "</tr>";
            }

            echo "</table>";
        }

        mysqli_free_result($r); // Liberar el resultado
        mysqli_close($conn); // Cerrar la conexión a la base de datos
    ?>
</body>
</html>
