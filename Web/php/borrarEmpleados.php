<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Web/styles/estilos_general.css">
    <title>Borrar Registro</title>
</head>
<body>
    <h2>Seleccione el empleado que desea borrar:</h2>
    <form action="borrarEmpleadoss.php" method="post">
        <label for="dni">DNI del empleado:</label>
        <input type="text" id="dni" name="DNI" required>
        <input type="submit" value="Borrar">
    </form>
</body>
</html>
