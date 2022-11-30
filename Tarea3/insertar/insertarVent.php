<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
    <link rel="stylesheet" href="../estilos/estilo.css">
    <title>Tarea3</title>
</head>

<body>
    <div class="contenido">
        <ul>
            <li><a href="../principal.php">Inicio</a></li>
            <li><a href="../consultar.php">Consulta de datos</a></li>
            <li><a href="../insertar.php">Inserción de datos</a></li>
            <li><a href="../modificar.php">Modificación de datos</a></li>
            <li><a href="../eliminar.php">Eliminación de datos</a></li>
        </ul>

        <h1>Introduzca los datos de la nueva venta:</h1>
        <div class="centrar-horizont2">
            <form action="" method="post">
                <label>codComercial</label>
                <!--Creamos un despegable con los codigos de los comerciales almacenados en la base de datos-->
                <select name="codComercial">
                <?php
                    include "../funciones/funciones.php";
                    if (isset($_POST['codComercial'])){
                        $codComercial = $_POST['codComercial'];
                    }
                    $conexion=conectar_bd("ventas_comerciales");
                    $sql="SELECT codigo FROM comerciales";
                    $resultado = $conexion->query($sql);
                    if ($resultado) {
                        $row = $resultado->fetch();
                        while ($row != null) {
                            echo "<option value='${row['codigo']}'";
                            // Si se recibió un código de producto lo seleccionamos
                            // en el desplegable usando selected='true'
                            if (isset($codComercial) && $codComercial == $row['codigo']){
                                echo " selected='true'";
                            }
                            echo ">${row['codigo']}</option>";
                            $row = $resultado->fetch();
                        }
                    }
                ?>
                </select>
                <br><br>

                <label>refProducto</label>
                <!--Creamos un despegable con los codigos de los productos almacenados en la base de datos-->
                <select name="refProducto">
                <?php
                    if (isset($_POST['refProducto'])){
                        $refProducto = $_POST['refProducto'];
                    }
                    $conexion=conectar_bd("ventas_comerciales");
                    $sql="SELECT referencia FROM productos";
                    $resultado = $conexion->query($sql);
                    if ($resultado) {
                        $row = $resultado->fetch();
                        while ($row != null) {
                            echo "<option value='${row['referencia']}'";
                            // Si se recibió un código de producto lo seleccionamos
                            // en el desplegable usando selected='true'
                            if (isset($refProducto) && $refProducto == $row['referencia']){
                                echo " selected='true'";
                            }
                            echo ">${row['referencia']}</option>";
                            $row = $resultado->fetch();
                        }
                    }
                ?>
                </select>
                <br><br>

                <label>Cantidad</label>
                <input type="number" name="cantidad" step="any"><br><br>
                <label>Fecha</label>
                <input type="date" name="fecha" required><br><br>
                <input type="submit" name="enviar" value="Insertar Venta">
            </form>
        </div>

        <?php
            if(isset($_POST['enviar'])){
                $cantidad=$_POST['cantidad'];
                $fecha=$_POST['fecha'];
                $sql="INSERT INTO ventas (codComercial,refProducto,cantidad,fecha) VALUES ('$codComercial', '$refProducto',$cantidad,'$fecha');";
                $operacion_correcta=realizar_operacion("ventas_comerciales",$sql);
                    if($operacion_correcta){
                        echo "<p class='correcto'>Operacion realizada con exito</p>";
                        //Si la operacion es correcta mostramos el mensaje y actualizamos la pagina pasdos 4 segundos para ver los datos actualizados
                        header("refresh:4;insertarVent.php");
                    }else{
                        echo "<p class='error'>No ha sido posible realizar la operacion</p>";
                    }
            }
            unset($conexion);
        ?>
    </div>
</body>

</html>