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

        <h1>Indique la venta que desea eliminar:</h1>
        <form action="" method="post" class="eliminar">
            <div class="centrar-horizont">
                <span>Ventas:</span>
                <!--Creamos un despegable con todas las ventas almacenadas en la base de datos-->
                <select name="ventas">
                    <?php
                    include "../funciones/funciones.php";

                    if (isset($_POST['ventas'])){
                        $ventas = $_POST['ventas'];
                    }
                    // Rellenamos el desplegable con los datos de todos los productos
                    $conexion=conectar_bd("ventas_comerciales");
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
                <input type="submit" value="Eliminar" name="enviar" />
            </div>

            <?php
                echo '<div class="centrar-horizont2">';
                if(isset($_POST['enviar'])){
                    echo "Se va a proceder a la eliminacion de la venta seleccionada.¿Está seguro?";
                    echo '<input type="submit" value="Eliminar Venta" name="eliminar" />';
                    echo '<input type="submit" value="Cancelar" name="cancelar" />';
                }
                echo '</div>';

                echo '<div class="centrar-horizont2">';
                if(isset($_POST['eliminar'])){
                    $clavesVentas=explode(",",$clavesVentas);
                    $codComercial=$clavesVentas[0];
                    $refProducto=$clavesVentas[1];
                    $fecha=$clavesVentas[2];
                    $sql="DELETE FROM ventas WHERE codComercial='$codComercial' AND refProducto='$refProducto' AND fecha='$fecha' ";
                    $operacion_correcta=realizar_operacion("ventas_comerciales",$sql);
                    if($operacion_correcta){
                        echo '<p class="correcto">Operacion realizada con exito</p>';
                        //Si la operacion es correcta mostramos el mensaje y actualizamos la pagina pasados 4 segundos para ver los datos actualizados
                        header("refresh:4;eliminarVent.php");
                    }else{
                        echo "<p class='error'>No ha sido posible realizar la operacion</p>";
                    }
                }
                echo '</div>';
                unset($conexion);
            ?>
        </form>
    </div>

</body>

</html>