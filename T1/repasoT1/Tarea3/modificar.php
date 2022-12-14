<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/estilo.css">
    <title>Tarea3</title>
</head>

<body>
    <div class="contenido">
        <ul>
            <li><a href="principal.php">Inicio</a></li>
            <li><a href="consultar.php">Consulta de datos</a></li>
            <li><a href="insertar.php">Inserción de datos</a></li>
            <li><a href="modificar.php">Modificación de datos</a></li>
            <li><a href="eliminar.php">Eliminación de datos</a></li>
        </ul>

        <h1>Elija la tabla en la que modificar datos:</h1><br>
        <div class="opciones">
            <a href="modificar/modificarCom.php">Modificar Comerciales</a>
            <a href="modificar/modificarPro.php">Modificar Productos</a>
            <a href="modificar/modificarVent.php">Modificar Ventas</a>
        </div>
    </div>

</body>

</html>