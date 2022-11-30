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

        <h1>Indique un comercial y mostraremos sus ventas</h1>
        <form action="" method="post" class="consultar">
            <span>Comerciales:</span>
            <!--Creamos un despegable con todos los comerciales almacenados en la base de datos-->
            <select name="comerciales">
                <?php
                include "funciones/funciones.php";
                if (isset($_POST['comerciales'])){
                    $comerciales = $_POST['comerciales'];
                }
                // Rellenamos el desplegable con los datos de todos los productos
                $conexion=conectar_bd("ventas_comerciales");
                $sql="SELECT codigo,nombre FROM comerciales";
                $resultado = $conexion->query($sql);
                if ($resultado) {
                    $row = $resultado->fetch();
                    while ($row != null) {
                        echo "<option value='${row['codigo']}'";
                        // Si se recibió un código de producto lo seleccionamos
                        // en el desplegable usando selected='true'
                        if (isset($comerciales) && $comerciales == $row['codigo']){
                            echo " selected='true'";
                        }
                        echo ">${row['nombre']}</option>";
                        $row = $resultado->fetch();
                    }
                }
                ?>
            </select>
            <input type="submit" value="Mostrar ventas" name="enviar" />
        </form>

        <?php
            if(isset($_POST['enviar'])){
                mostrar_tabla_ventas($comerciales,"ventas_comerciales");
            }
            unset($conexion);
        ?>
    </div>

</body>

</html>