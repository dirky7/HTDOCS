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

        <h1>Indica la venta que desea modificar:</h1>
        <div class="centrar-horizont">
        <form action="" method="post" class="eliminar">
            <span>Ventas:</span>
            <!--Creamos un despegable con las ventas almacenadas en la base de datos-->
            <select name="ventas">
                <?php
                include "../funciones/funciones.php";

                if (isset($_POST['ventas'])){
                    $ventas = $_POST['ventas'];
                }
                // Rellenamos el desplegable con los datos de todos los productos
                $conexion=conectar_bd("venta_comerciales");
                $sql="SELECT * FROM ventas";
                $resultado = $conexion->query($sql);
                if ($resultado) {
                    $row = $resultado->fetch();
                    while ($row != null) {
                        echo "<option value='${row['codComercial']},${row['refProducto']},${row['fecha']}'";
                        // Si se recibió un código de producto lo seleccionamos
                        // en el desplegable usando selected='true'
                        if (isset($ventas) && $ventas == ($row['codComercial'].",".$row['refProducto'].",".$row['fecha'])){
                            echo " selected='true'";
                            $clavesVentas=$row['codComercial'].",".$row['refProducto'].",".$row['fecha'];
                        }
                        echo ">${row['codComercial']}----${row['refProducto']}----${row['cantidad']}----${row['fecha']}</option>";
                        $row = $resultado->fetch();
                    }
                }
                ?>
            </select>
            <input type="submit" value="Modificar Venta" name="enviar" />

            <?php
                //Una vez seleccionamos una venta y le demos a enviar se muestra un formulario con los datos de la venta cargados
                if(isset($_POST['enviar'])){
                    $clavesVentas=explode(",",$clavesVentas);
                    $sql="SELECT * FROM ventas WHERE codComercial='$clavesVentas[0]' AND refProducto='$clavesVentas[1]' AND fecha='$clavesVentas[2]'";
                    $resultado = $conexion->query($sql);
                    if ($resultado) {
                        $row = $resultado->fetch();
                        while ($row != null) {
                            echo "<br><br><label>Codigo Comercial</label>";
                            echo "<input type='text' name='codComercial' value='${row['codComercial']}' disabled>";
                            echo "<br><br><label>Referencia Producto</label>";
                            echo "<input type='text' name='refProducto' value='${row['refProducto']}' disabled>";
                            echo "<br><br><label>Cantidad</label>";
                            echo "<input type='number' name='cantidad'step='any' value='${row['cantidad']}'>";
                            echo "<br><br><label>Fecha</label>";
                            echo "<input type='text' name='fecha' value='${row['fecha']}' disabled >";
                            echo "<br><br><input type='submit' value='Realizar Cambios' name='modificar'>";
                            $row = $resultado->fetch();
                        }
                    }
                }

                if(isset($_POST['modificar'])){
                    $clavesVentas=explode(",",$clavesVentas);
                    $codComercial=$clavesVentas[0];
                    $refProducto=$clavesVentas[1];
                    $fecha=$clavesVentas[2];
                    $cantidad=$_POST['cantidad'];
                    $sql="UPDATE ventas SET cantidad=$cantidad WHERE codComercial='$codComercial' AND refProducto='$refProducto' AND fecha='$fecha' ";
                    $operacion_correcta=realizar_operacion("venta_comerciales",$sql);
                    if($operacion_correcta){
                        echo "<p class='correcto'>Operacion realizada con exito</p>";
                        //Si la operacion es correcta mostramos el mensaje y actualizamos la pagina pasdos 4 segundos para ver los datos actualizados
                        header("refresh:4;modificarVent.php");
                    }else{
                        echo "<p class='error'>No ha sido posible realizar la operacion</p>";
                    }
                }
                unset($conexion);
            ?>
        </form>
        </div>
    </div>
</body>

</html>